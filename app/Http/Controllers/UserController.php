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
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Session;

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
      $user= User::filter($request->get('name'),$request->get('role'),$request->get('cedula'));
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
               $path = public_path().'/upload/users/';

               $file->resize(120,120)->move($path,$name);

           }
           $users = new User($request->all());
           //$users->iduser_create->$id;

           $users->photo=$name;
           $users->save();
           Session::flash('message',$users->name.'  Fue creado');
           return redirect()->route('users');


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
              $user=User::findOrFail($id);
              //$users->iduser_update->$id;
              $users->fill($request->all());
              $users->save();

              Session::flash('message',$users->name.' Se actualizo');
              return redirect()->route('users');

      }

    public function pdf(Request $request,$id)
    {
      /// falta insertar el componente pdf
       $user=User::findOrFail($id);
       $pdf = PDF::loadView('users.pdf',compact('user'));
       return $pdf->stream();
    }
      //******  perfil**********************************###################
      //###########################################################
      //#########################################################


    public function create_profile()
    {
      $id=Auth::user()->id;//toma el id del usuario que esta conectado
      $user=user::findOrFail($id);
      return view('users/profile/create',compact('user'));//envia el usuario para agregar el usuario
      //con este usario ya se puede hacer condicional en la vista.
    }
    public function edit_profile()
      {
         $id=Auth::user()->id;//toma el id del usuario que esta conectado
         $profile=Profile::findOrFail($id);
         return view('users/profile/edit',compact('profile'));
         //en la vista hacer el condicional para mostrar el perfil correcto y solo permitir editar algunos campos.
         //algunos campos en la vista que no podra editar como el cargo, del personal o el rendimiento
      }


    public function store_profile(Request $request)

    {
      if($request->file('curriculum'))
      {

          $file = $request->file('curriculum');
          $name = 'Appmm_'.time().'.'.$file->getClientOriginalExtension();
          $path = public_path().'/upload/users/profiles';
          $file->move($path,$name);

      }
      $profiles = new Profile($request->all());
      $profiles->curriculum=$name;
      $profiles->save();
      Session::flash('message',$profiles->user->name.'  Ha actaualizdo su perfil');
      return redirect()->route('profiles');

    }


}
