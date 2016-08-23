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
       $expenses= Expense::whereBetween('created_at',array($request->get('from'),$request->get('to')))->get();
       $payments= Payment::whereBetween('created_at',array($request->get('from'),$request->get('to')))->get();
             //este filtro de fecha seria bueno transladarlo al modelo.
       $t_payments=$payments->sum('value');
       $t_expenses=$expenses->sum('value');
       $total=$t_payments-$t_expenses;
       return view('payments/list', compact('payments','t_payments','t_expenses','total'));
     }

     public function pdf(Request $request)
     {
       /// only admin
        $payments=Payment::filter($request->get('date'));
        $pdf = PDF::loadView('payments.pdf',compact('$payments'));
        return $pdf->stream();
     }


     public function my_payments()//los payments | pagos de cada agent o admin
     {//
       $id=Auth::user()->id;
       $user=User::findOrFail($id);
       return view('payments/miPayments', compact('user'));
       //envio el usuario a la vista, en la vista realizo un ciclo para recoger todos los pagos que tiene este usuario


     }
}
