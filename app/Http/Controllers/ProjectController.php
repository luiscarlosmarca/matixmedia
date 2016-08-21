<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\Service;
use App\User;
use App\Payment;
use App\Tracing;
use App\Brief;
use \Input as Input;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\EditPaymentRequest;
use App\Http\Requests\CreateTracingRequest;
use App\Http\Requests\EditTracingRequest;
use App\Http\Requests\CreateBriefRequest;
use App\Http\Requests\EditBriefRequest;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)// Muestra todos los projectos only admin
    {
      $projects= Project::filter($request->get('name'));
      return view('projects/list', compact('projects'));
    }

    public function pdf($id)
    {
      /// falta insertar el componente pdf
       $project=Project::findOrFail($id);
       $pdf = PDF::loadView('projects.pdf',compact('project'));
       return $pdf->stream();
    }

    public function my_projects()//los projectos de cada usuario
    {//en la vista hacer un condicional para mostrar cierta informacion.
      $id=Auth::user()->id;
      $role=Auth::user()->role;
      if ($role=='developer')
      {
        $projects=Project::->where('developer_id', '$id');

      }elseif ($role=='agent')
       {
         $projects=Project::->where('iduser_create', '$id');

       }elseif ($role=='customer')
       {
         $projects=Project::->where('agent_id', '$id');

       }
       // Como hacer la relacion si, la tabla proect se relaciona varias veces con la misma tabla user.

       return view('projects/miProject', compact('projects'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents=User::orderBy('name','ASC')->where('role','agent')->lists('name','id');
        $customers=User::orderBy('name','ASC')->where('role', 'customer')->lists('name','id');
        $developers=User::orderBy('name','ASC')->where('role', 'developer')->lists('name','id');
        $services=Service::orderBy('name','ASC')->lists('name','id');
        return view('project/create',compact('agents', 'customers','developers'),'services');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request,$action)
    {
         $id=Auth::user()->id;

         if($request->file('contract'))
         {
             $contract = $request->file('contract');
             $name_contract = 'Appmm_'.time().'.'.$contract->getClientOriginalExtension();
             $path = public_path().'/upload/projects/contracts/';
             $contract->move($path,$name_contract);
         }
         if($request->file('file'))
         {
             $file = $request->file('file');
             $name_file = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
             $path = public_path().'/upload/projects/files/';
             $file->move($path,$name_file);
         }

         $projects = new Project($request->all());
         $projects->iduser_create->$id;
         $projects->file=$name_file;
         $projects->contract=$name_contract;
         $projects->save();

         if($action=='save_new')
         {
           return redirect()->route('projects.create');

         }
           else {
              return redirect()->back();
           }


         Session::flash('message',$projects->name.'  Fue creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=Project::findOrFail($id);
        return view('projects/edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request, $id)
    {
      $id_user=Auth::user()->id;
      $projects=Project::findOrFail($id);
      $contract_old=$projects->contract;
      $file_old=$projects->file;
      if($request->file('contract'))
      {
          $contract = $request->file('contract');
          $name_contract = 'Appmm_'.time().'.'.$contract->getClientOriginalExtension();
          $path = public_path().'/upload/projects/contracts/';
          $contract->move($path,$name_contract);

          Storage::delete($path . $contract_old);
      }
      if($request->file('file'))
      {
          $file = $request->file('file');
          $name_file = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
          $path = public_path().'/upload/projects/files/';
          $file->move($path,$name_file);
          Storage::delete($path . $file_old);
      }

      $projects->iduser_update->$id_user;
      $projects->file=$name_file;
      $projects->contract=$name_contract;
      $projects->fill($request->all());
      $projects->save();

      Session::flash('message',$projects->name.' Se actualizo');
      return redirect()->back();
    }

    /**
    // Payment  - Ingresos
     */
    public function create_payment($id)
      {
        $project=Project::findOrFail($id);

        return view('projects/payments/create',compact('project'));
      }

      public function store_payment(CreatePaymentRequest $request)
      {
        $id=Auth::user()->id;
        $payments = new Payment($request->all());
        $payments->iduser_create->$id;
        $payments->save();

        if($action=='save_new')
        {
          return redirect()->route('payment.create');

        }
          else {
             return redirect()->back();
          }


        Session::flash('message','El projecto: '.$payments->project->name.' realizo un ingreso');

      }

    public function edit_payment($id)
      {

        $payments=Payment::findOrFail($id);
        return view('projects/payments/edit',compact('payments'));

      }

    public function update_payment(EditPaymentRequest $request,$id)
      {
        $id_user=Auth::user()->id;
        $payments=Payment::findOrFail($id);
        $payments->iduser_update->$id_user;
        $payments->fill($request->all());
        $payments->save();

        Session::flash('message',$payments->project->name. ' Se actualizo exitosamente el Ingreso');
        return redirect()->back();
      }
      /**
      // Tracing  - seguimientos
       */

    public function create_tracing($id)
       {
         $proyect=Project::findOrFail($id);

         return view('projects/tracings/create',compact('project'));
       }

    public function store_tracing(CreateTracingRequest $request)
       {
         $id=Auth::user()->id;
         if($request->file('file'))
         {
             $file = $request->file('file');
             $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
             $path = public_path().'/upload/projects/tracing/';
             $file->move($path,$name);
         }
         $tracings = new Tracing($request->all());
         $tracings->iduser_create->$id;
         $tracing->file->$name;
         $tracings->save();

         if($action=='save_new')
           {
             return redirect()->route('tracing.create');

           }
             else {
                return redirect()->back();
             }


       Session::flash('message','Ha realizado un nuevo seguimiento del projecto: '.$tracings->project->name);

       }

     public function edit_tracing($id)
         {

           $tracings=Tracing::findOrFail($id);
           return view('projects/tracings/edit',compact('tracings'));

         }

     public function update_tracing(EditTracingRequest $request,$id)
         {
           $id_user=Auth::user()->id;
           $tracings=Tracing::findOrFail($id);
           $tracings->iduser_update->$id_user;
           $tracings->fill($request->all());
           $tracings->save();

           Session::flash('message',' Se actualizo exitosamente el seguimiento');
           return redirect()->back();
         }

         /**
         // Brief  - Requirimientos hoja de vida del proyecto
          */

      public function create_brief($id)
          {
            $proyect=Project::findOrFail($id);

            return view('projects/brief/create',compact('project'));
          }

       public function store_brief(CreateBriefRequest $request)
          {
            $id=Auth::user()->id;
            if($request->file('file'))
            {
                $file = $request->file('file');
                $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/upload/projects/brief/';
                $file->move($path,$name);
            }
            $briefs = new Brief($request->all());
            $briefs->file->$name;
            $briefs->iduser_create->$id;
            $briefs->save();

            return redirect()->back();

            Session::flash('message','Ha ingresado exitosamente el Brief del projecto: '.$briefs->project->name);

          }

        public function edit_brief($id)
            {

              $briefs=Brief::findOrFail($id);
              return view('projects/briefs/edit',compact('briefs'));

            }

        public function update_brief(EditBriefRequest $request,$id)
            {
              $id_user=Auth::user()->id;
              $briefs=Brief::findOrFail($id);
              $file_old=$briefs->file;
              if($request->file('file'))
              {
                  $file = $request->file('file');
                  $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
                  $path = public_path().'/upload/projects/brief/';
                  $file->move($path,$name);

                  Storage::delete($path . $file_old);
              }
              $briefs->iduser_update->$id_user;
              $briefs->file->$name;
              $briefs->fill($request->all());
              $briefs->save();

              Session::flash('message',' Se actualizo exitosamente el Brief');
              return redirect()->back();
            }
}
