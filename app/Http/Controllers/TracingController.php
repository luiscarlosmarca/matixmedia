<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tracing;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use Illuminate\Support\Facades\Auth;
class TracingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { //view for admin, only read: agent and developer,
     $tracings= Tracing::filter($request->get('date'),$request->get('state'),$request->get('phase'));

      return view('tracings/list', compact('tracings'));
    }

    public function pdf()
    {
      /// only admin
      // faltaria para usar de otra forma (Request $request)
      // $tracings=Tracing::filter($request->get('date'),($request->get('state')));
       // para usuar luego con campos de textdomain
      $tracings=Tracing::orderBy('date', 'desc')->get();
      $pdf = PDF::loadView('tracings.pdf',compact('$tracings'));
      return $pdf->stream();
    }


    public function my_tracings()//los Tracing | seguimientos de cada usuario
    {//
      $id=Auth::user()->id;
      $user=User::findOrFail($id);
      $role=Auth::user()->role;

      if ($role=='developer'|| $role=='agent')
      {
        return view('agent/tracings/list', compact('user'));

      }elseif ($role=='admin')
       {
      return view('tracings/list', compact('user'));
       }



      //envio el usuario a la vista, en la vista realizo un ciclo para recoger todos los briefs que tiene este usuario


    }


}
