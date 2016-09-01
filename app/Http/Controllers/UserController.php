<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use \Input as Input;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //only admin

      $users= User::filter($request->get('name'),$request->get('role'),$request->get('cedula'));

      return view('users/list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(CreateUserRequest $request)
       {

           $id=Auth::user()->id;

           if($request->file('photo'))
           {

               $file = $request->file('photo');
               $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
              // $path = public_path().'/upload/users/';

              // $file->move($path,$name);
               Storage::disk('users')->put($name,  \File::get($file));

           }
           $users = new User($request->all());
           $users->iduser_create=$id;

           $users->photo=$name;
           $users->save();

           $profiles = new Profile();

           $profiles->user_id=$users->id;
           $profiles->save();

           Session::flash('message','El usuario '.$users->name.'  Fue creado exitosamente');

           //guarda el valor de los campos enviados desde el form en un array
          $data = $request->all();

          //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
          \Mail::send('emails.message', $data, function($message) use ($request)
          {
              //remitente
              $message->from($request->email, $request->name);

              //asunto
              $message->subject($request->name);

              //receptor
              $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));

          });
           return redirect()->route('admin.usuarios.index');


       }

    public function edit($id)
      {
        // editr usuario desde la lista, solo para la vista disponible para el role admin para todos los campos
         $user=User::findOrFail($id);
         return view('users/edit',compact('user'));
        //editor solo mis datos el perfil se hace desde otro metodo
      }

    public function update(EditUserRequest $request,$id)

      {
              $id_user=Auth::user()->id;
              $users=User::findOrFail($id);

            //  if($request->file('photo'))
              //{

                              // $file = $request->file('photo');
                              // $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
                              // $path = public_path().'/upload/users/';

                              // $file->move($path,$name);
                               //Storage::disk('users')->put($name,  \File::get($file));

              //}


          //    $users->photo=$name;

              $users->iduser_update=$id_user;

              $users->fill($request->all());

              $users->save();

              Session::flash('message',$users->name.' Se actualizo');
              return redirect()->route('admin.usuarios.index');

      }

    public function pdf()
    {
        /// falta insertar el componente pdf
      //  $id=Auth::user()->id;
      $users= User::orderBy('name', 'desc')->get();
      $pdf = PDF::loadView('users/pdf',compact('users'));
      return $pdf->stream();


    }
      //******  perfil**********************************###################
      //###########################################################
      //#########################################################


    public function edit_profile($id)
    {


      $profile=Profile::findOrFail($id);
      return view('users/profile/edit',compact('profile'));//envia el usuario para agregar el usuario
      //con este usario ya se puede hacer condicional en la vista.
    }



    public function edit_profiles()
      {
         $id=Auth::user()->id;//desde el admin
         $profile=Profile::findOrFail($id);
         return view('users/profile/create',compact('profile'));
         //en la vista hacer el condicional para mostrar el perfil correcto y solo permitir editar algunos campos.
         //algunos campos en la vista que no podra editar como el cargo, del personal o el rendimiento
      }


    public function update_profile(EditProfileRequest $request,$id)

    {
      $profiles=Profile::findOrFail($id);

      $name="";
      if($request->file('curriculum'))
      {

          $file = $request->file('curriculum');
          $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();

          Storage::disk('profiles')->put($name,  \File::get($file));


      }

      $profiles->fill($request->all());
      $profiles->curriculum=$name;
      $profiles->save();

      $id_user=Auth::user()->id;

      $users=User::findOrFail($id_user);
      $users->iduser_update=$id_user;

      $users->save();

      Session::flash('message','El usuario '.$profiles->user->name.' Actualizo su perfil exitosamente');
      return redirect()->route('home');







    }


}
