<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tracing;
class TracingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { //view for admin, only read: agent and developer,
      $tracings= Tracing::filter($request->get('date'),$request->get('state'));
      return view('tracings/list', compact('tracings'));
    }

    public function pdf(Request $request)
    {
      /// only admin
       $tracings=Tracing::filter($request->get('date'),($request->get('state')));
       $pdf = PDF::loadView('tracings.pdf',compact('$tracings'));
       return $pdf->stream();
    }


    public function my_tracings()//los Tracing | seguimientos de cada usuario
    {//
      $id=Auth::user()->id;
      $user=User::findOrFail($id);
      return view('tracings/miTracings', compact('user'));
      //envio el usuario a la vista, en la vista realizo un ciclo para recoger todos los briefs que tiene este usuario


    }


}
