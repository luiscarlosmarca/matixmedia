<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Provider;
use App\Http\Requests\CreateProviderRequest;
use App\Http\Requests\EditProviderRequest;
use App\Http\Requests\CreateExpenseRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $providers= Provider::filter($request->get('name'),$request->get('contact'),$request->get('category'));
      return view('providers/list', compact('providers'));
    }

    public function pdf(Request $request)
    {
      //view for admin, agent and developer
       $providers=Provider::filter($request->get('name'),$request->get('contact'),$request->get('category'));
       $pdf = PDF::loadView('providers.pdf',compact('providers'));
       return $pdf->stream();
    }
    public function create()
    {
      return view('providers/create');

    }
    public function store(CreateProviderRequest $request)
    {
      $id=Auth::user()->id;
      $providers = new Provider($request->all());
      $providers->iduser_create=$id;
      $providers->save();
      Session::flash('message','El proveedor: '.$providers->name.' se creo exitosamente');
      //
      // if($action=='save_new')
      // {
        return redirect()->route('admin.proveedores.index');

      // }
      //   else {
      //      return redirect()->back();
      //   }

    }

    public function edit($id)
    {

       $providers=Provider::findOrFail($id);
       return view('providers/edit',compact('providers'));

    }

    public function update(EditProviderRequest $request,$id)
    {
      $id_user=Auth::user()->id;
      $providers=Provider::findOrFail($id);
      $providers->iduser_update->$id_user;
      $providers->fill($request->all());
      $providers->save();

      Session::flash('message',$providers->name.' Se actualizo exitosamente');
      return redirect()->back();
    }

    /**
    // Expenses - salidas
     */
    public function create_expense($id)
      {

        $provider=Provider::findOrFail($id);

        return view('providers/expenses/create',compact('provider'));
      }

      public function store_expense(CreateExpenseRequest $request)
      {
        $id=Auth::user()->id;
        $expenses = new Expense($request->all());
        $expenses->user_id=$id;
        $expenses->save();

        // if($action=='save_new')
        // {
          return redirect()->route('admin.salidas.index');

        // }
        //   else {
        //      return redirect()->back();
        //   }


        Session::flash('message','El proveedor: '.$expenses->provider->name.' realizo una salidad $$');

      }
}
