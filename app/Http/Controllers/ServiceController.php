<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\EditServiceRequest;
use Illuminate\Support\Facades\Session;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     { //view for admin, agent and developer
       $services= Service::filter($request->get('name'));
       return view('services/list', compact('services'));
     }

     public function pdf(Request $request)
     {
       //view for admin, agent and developer
        $services=Service::filter($request->get('name'));
        $pdf = PDF::loadView('services.pdf',compact('services'));
        return $pdf->stream();
     }

     public function create()
     {
       $id=Auth::user()->id;
       return view('services/create',compact('id'));
       //envio del id del usuario por el controllador, para colcoar en el hidden.
     }

     public function store(CreateServiceRequest $request)
     {
       $id=Auth::user()->id;
       $services = new Service($request->all());
       $services->iduser_create->$id;
       $services->save();

       if($action=='save_new')
       {
         return redirect()->route('service.create');

       }
         else {
            return redirect()->back();
         }


       Session::flash('message','El servicio: '.$services->name.' se creo exitosamente');

     }

     public function edit($id)
     {

        $services=Service::findOrFail($id);
        return view('services/edit',compact('services'));

     }

     public function update(EditServiceRequest $request,$id)
     {
       $id_user=Auth::user()->id;
       $services=Service::findOrFail($id);
       $services->iduser_update->$id_user;
       $services->fill($request->all());
       $services->save();

       Session::flash('message',$services->name.' Se actualizo exitosamente');
       return redirect()->back();
     }


}
