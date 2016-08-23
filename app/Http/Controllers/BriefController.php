<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brief;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Auth;

class BriefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //view for admin, only read: agent and developer,
        $briefs= Brief::orderBy('date','ASC')->get();
        return view('briefs/list', compact('briefs'));
      //blog view
    }

    public function pdf($id)
    {
      /// only admin
       $brief=Brief::findOrFail($id);
       $pdf = PDF::loadView('briefs.pdf',compact('briefs'));
       return $pdf->stream();
    }

    public function my_briefs()//los briefs | seguimientos de cada usuario
    {//
      $id=Auth::user()->id;
      $user=User::findOrFail($id);
      return view('briefs/miBriefs', compact('user'));
      //envio el usuario a la vista, en la vista realizo un ciclo para recoger todos los briefs que tiene este usuario

    }
}
