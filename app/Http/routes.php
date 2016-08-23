<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',[
  'uses'		=>	'Auth\AuthController@getLogin',
  'as'		=>	'login'
  ]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Authentication routes...
 Route::get('login', [
 	'uses'		=>	'Auth\AuthController@getLogin',
	'as'		=>	'login'

 ]);

Route::post('login','Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

/**
//Rutas para el modulo administrativo primer filtro. login
 */

Route::group(['middleware'=>'auth'], function(){

      /**
      //Segundo filtro. role-> admin
       */
    Route::group(['prefix'=>'admin','middleware'=>'role:admin'], function()
    {
      Route::resource('usuarios','UserController');

        Route::get('/admin/usuarios/pdf/',[
        'uses'	=>'UserController@pdf',
        'as'	=>'admin.usuarios.pdf'
        ]);
        Route::get('/admin/usuarios/perfil/',[
        'uses'	=>'UserController@create_profile',
        'as'	=>'admin.usuarios.perfil'
        ]);

      Route::resource('projectos','ProjectController');

        Route::get('/admin/projectos/pdf/',[//listado de los proyectos mas recientes
        'uses'	=>'ProjectController@pdf',
        'as'	=>'admin.projectos.pdf'
        ]);
        Route::get('/admin/projecto/pdf/{id}',[//listado de los proyectos mas recientes
        'uses'	=>'ProjectController@mi_pdf',
        'as'	=>'admin.projecto.pdf'
        ]);


      Route::resource('seguimientos','TracingController');
      Route::resource('briefs','BriefController');
      Route::resource('ingresos','PaymentController');
      Route::resource('salidas','ExpenseController');
      Route::resource('proveedores','ProviderController');
      Route::resource('servicios','ServiceController');




    });




});
