<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Payment;
use App\Http\Requests\EditExpenseRequest;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // en este controlador solo mostramos y editamos, la creacion de los gastos se realizan
     // desde el controlador de provider | entidades.
    public function index(Request $request)
    {
      //mostrar el total de la caja y el total de gastos
      // $expenses= Expense::whereBetween('created_at',array($request->get('from'),$request->get('to')))->get();
      // $payments= Payment::whereBetween('created_at',array($request->get('from'),$request->get('to')))->get();       //este filtro de fecha seria bueno transladarlo al modelo.

      $expenses_= Expense::orderBy('created_at','DESC');// total de todos los gastos
      $payments= Payment::orderBy('created_at','DESC');// total de todos los ingresos

      $expenses=Expense::filter($request->get('date'));

      $d_expenses=$expenses->sum('value');// el total de rango

      $t_payments=$payments->sum('value');
      $t_expenses=$expenses_->sum('value');
      $total=$t_payments-$t_expenses;// total de caja
      return view('expenses/list', compact('expenses','t_payments','t_expenses','total','d_expenses'));
    }

    public function pdf(Request $request)
    {
      /// only admin
       $expenses=Expense::filter($request->get('date'));
       $pdf = PDF::loadView('expenses.pdf',compact('$expenses'));
       return $pdf->stream();
    }


    public function edit($id)
    {
      $expenses=Expense::findOrFail($id);
      return view('expenses/edit',compact('expenses'));
    }


    public function update(EditExpenseRequest $request, $id)
    {
      $id_user=Auth::user()->id;
      $expenses=Expense::findOrFail($id);
      $expenses->iduser_update->$id_user;
      $expenses->fill($request->all());
      $expenses->save();

      Session::flash('message',' Se actualizo exitosamente');
      return redirect()->back();
    }


}
