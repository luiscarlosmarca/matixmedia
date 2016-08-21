<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Payment;
use App\Expense;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     { //view for admin, only read: agent and developer,
       $payments= Payment::filter($request->get('date'));
       return view('payments/list', compact('payments'));
     }

     public function pdf(Request $request)
     {
       /// only admin
        $payments=Payment::filter($request->get('date'));
        $pdf = PDF::loadView('payments.pdf',compact('$payments'));
        return $pdf->stream();
     }


     public function my_payments()//los Tracing | seguimientos de cada usuario
     {//
       $id=Auth::user()->id;
       $user=User::findOrFail($id);
       return view('payments/miPayments', compact('user'));
       //envio el usuario a la vista, en la vista realizo un ciclo para recoger todos los briefs que tiene este usuario


     }
}
