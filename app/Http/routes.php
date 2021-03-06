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
Route::post('send', ['as' => 'send', 'uses' => 'MailController@send'] );
Route::get('contact', ['as' => 'contact', 'uses' => 'MailController@index'] );

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



/**
//Rutas para el modulo administrativo primer filtro. login
 */

Route::group(['middleware'=>'auth'], function(){

    Route::get('/perfil/{id}',[
    'uses'	=>'UserController@edit_profile',
    'as'	=>'perfil.edit'
    ]);


    Route::patch('/perfil/{id}',[
      'uses'=>'UserController@update_profile',
      'as'  =>'perfil.update'
    ]);

    /**
    //Segundo filtro. role-> costumer
     */
     Route::group(['middleware'=>'role:customer'], function()
     {

       Route::get('agent/projectos/',[//listado de los proyectos de los develper
       'uses'	=>'ProjectController@index',
       'as'	  =>'projectos.index'
       ]);

       Route::get('/agent/projecto/editar/{id}',[
       'uses'	=>'ProjectController@edit',
       'as'  	=>'projecto.edit'
       ]);

       Route::patch('/admin/projecto/editar/{id}',[
       'uses'	=>'ProjectController@update',
       'as'	=>'projecto.update'
       ]);


     });
        /**
          //Segundo filtro. role-> developer, todo lo que haga el developer lo hace el agente
       */
    Route::group(['middleware'=>'role:developer'], function()
    {

      Route::get('agent/projecto/seguimientos/',[/// seguimientos
      'uses'	=>'TracingController@my_tracings',
      'as'  	=>'seguimientos.index'

      ]);




        Route::get('/agent/projecto/registrar_seguimiento/{id}',[
        'uses'	=>'ProjectController@create_tracing',
        'as'	  =>'projecto.add_tracing'
        ]);

        Route::post('/admin/projecto/registrar_seguimiento/',[
          'uses'=>'ProjectController@store_tracing',
          'as'  =>'projecto.store_tracing'
        ]);

        Route::get('/admin/projecto/editar_seguimiento/{id}',[//falta desarrollar
        'uses'	=>'ProjectController@edit_tracing',
        'as'	  =>'projecto.edit_tracing'
        ]);

        Route::patch('/admin/projecto/editar_seguimiento/{id}',[//falta desarrollar
        'uses'	=>'ProjectController@update_tracing',
        'as'	=>'projecto.update_tracing'
        ]);

        Route::get('/agent/projecto/registrar_brief/{id}',[//brief
        'uses'	=>'ProjectController@create_brief',
        'as'  	=>'projecto.add_brief'
        ]);

        Route::post('/agent/projecto/registrar_brief/',[
          'uses'=>'ProjectController@store_brief',
          'as'  =>'projecto.store_brief'
        ]);

        Route::get('/agent/projecto/editar_brief/{id}',[
        'uses'	=>'ProjectController@edit_brief',
        'as'	  =>'projecto.editar_brief'
        ]);

        Route::patch('/agent/projecto/editar_brief/{id}',[
        'uses'	=>'ProjectController@update_brief',
        'as'	=>'projecto.update_brief'
        ]);

        Route::get('agent/servicios/',[//listado de los servicios
        'uses'	=>'ServiceController@index',
        'as'	  =>'servicios.index'
        ]);

        Route::get('agent/servicios/pdf',[//generar portafolio
        'uses'	=>'ServiceController@pdf',
        'as'	  =>'servicios.pdf'
        ]);


    });
    /**
    //Segundo filtro. role-> agent
     */
    Route::group(['middleware'=>'role:agent'], function()//solo lo hace el agent y el admin.
          {

          Route::get('agent/projectos/crear',[ //proyectos..
            'uses'	=>'ProjectController@create',
            'as'  	=>'projectos.create'
          ]);

          Route::post('agent/projectos/crear',[
            'uses'	=>'ProjectController@store',
            'as'  	=>'projectos.store'
          ]);
          Route::get('agent/projecto/ingresos/{id}',[/// ingresoso
          'uses'	=>'ProjectController@list_payments',
          'as'  	=>'projecto.ingresos'
          ]);

          Route::get('agent/projecto/registrar_ingreso/{id}',[
          'uses'	=>'ProjectController@create_payment',
          'as'	  =>'projecto.add_ingresos'
          ]);

          Route::post('/agent/projecto/registrar_ingreso/',[
            'uses'=>'ProjectController@store_payment',
            'as'  =>'projecto.store_ingresos'
          ]);

          Route::get('/agent/projecto/editar_ingreso/{id}',[//falta desarrollar
          'uses'	=>'ProjectController@edit_payment',
          'as'  	=>'projecto.edit_ingresos'
          ]);

          Route::patch('/agent/projecto/editar_ingreso/{id}',[//falta desarrollar
          'uses'	=>'ProjectController@update_payment',
          'as'	=>'projecto.update_ingresos'
          ]);
      });

      /**
      //Segundo filtro. role-> admin
       */
    Route::group(['prefix'=>'admin','middleware'=>'role:admin'], function()
    {
      // Registration routes...
      Route::get('register', 'Auth\AuthController@getRegister');
      Route::post('register', 'Auth\AuthController@postRegister');


      Route::resource('usuarios','UserController');



        Route::get('/admin/usuarios/pdf/',[
        'uses'	=>'UserController@pdf',
        'as'	=>'admin.usuarios.pdf'
        ]);

        Route::resource('projectos','ProjectController');

        Route::get('/admin/projectos/pdf/',[//listado de los proyectos mas recientes
        'uses'	=>'ProjectController@pdf',
        'as'	=>'admin.projectos.pdf'
        ]);
        Route::get('admin/projecto/mi_pdf/{id}',[//ver pdf de cada projecto
        'uses'	=>'ProjectController@mi_pdf',
        'as'	=>'admin.projecto.mi_pdf'
        ]);

        Route::get('/admin/projecto/ingresos/{id}',[/// ingresoso
        'uses'	=>'ProjectController@list_payments',
        'as'  	=>'admin.projecto.ingresos'
        ]);

        Route::get('admin/projecto/registrar_ingreso/{id}',[
        'uses'	=>'ProjectController@create_payment',
        'as'	  =>'admin.projecto.add_ingresos'
        ]);

        Route::post('admin/admin/projecto/registrar_ingreso/',[
          'uses'=>'ProjectController@store_payment',
          'as'  =>'admin.projecto.store_ingresos'
        ]);

        Route::get('/admin/projecto/editar_ingreso/{id}',[
        'uses'	=>'ProjectController@edit_payment',
        'as'  	=>'admin.projecto.edit_ingresos'
        ]);

        Route::patch('/admin/projecto/editar_ingreso/{id}',[
        'uses'	=>'ProjectController@update_payment',
        'as'	=>'admin.projecto.update_ingresos'
        ]);

        Route::get('/admin/projecto/seguimientos/{id}',[/// seguimientos
        'uses'	=>'ProjectController@list_tracings',
        'as'  	=>'admin.projecto.seguimientos'
        ]);
        Route::get('/admin/projecto/registrar_seguimiento/{id}',[
        'uses'	=>'ProjectController@create_tracing',
        'as'	  =>'admin.projecto.add_tracing'
        ]);

        Route::post('/admin/projecto/registrar_seguimiento/',[
          'uses'=>'ProjectController@store_tracing',
          'as'  =>'admin.projecto.store_tracing'
        ]);

        Route::get('/admin/projecto/editar_seguimiento/{id}',[
        'uses'	=>'ProjectController@edit_tracing',
        'as'	  =>'admin.projecto.edit_tracing'
        ]);

        Route::patch('/admin/projecto/editar_seguimiento/{id}',[
        'uses'	=>'ProjectController@update_tracing',
        'as'	=>'admin.projecto.update_tracing'
        ]);

        Route::get('/admin/projecto/registrar_brief/{id}',[//brief
        'uses'	=>'ProjectController@create_brief',
        'as'  	=>'admin.projecto.add_brief'
        ]);

        Route::post('/admin/projecto/registrar_brief/',[
          'uses'=>'ProjectController@store_brief',
          'as'  =>'admin.projecto.store_brief'
        ]);

        Route::get('/admin/projecto/editar_brief/{id}',[
        'uses'	=>'ProjectController@edit_brief',
        'as'	  =>'admin.projecto.editar_brief'
        ]);

        Route::patch('/admin/projecto/editar_brief/{id}',[
        'uses'	=>'ProjectController@update_brief',
        'as'	=>'admin.projecto.update_brief'
        ]);




      Route::resource('seguimientos','TracingController');/// Segumientos pero de parte netamente el admin
        Route::get('/admin/seguimientos/pdf/',[
        'uses'	=>'TracingController@pdf',
        'as'	=>'admin.seguimientos.pdf'
        ]);
      Route::resource('briefs','BriefController');

        Route::get('/admin/brief/pdf/{id}',[
        'uses'	=>'BriefController@mi_pdf',
        'as'	=>'admin.brief.pdf'
        ]);

      Route::resource('ingresos','PaymentController');
        Route::get('/admin/ingresos/pdf/',[
        'uses'	=>'PaymentController@pdf',
        'as'	=>'admin.ingresos.pdf'
        ]);
      Route::resource('salidas','ExpenseController');
        Route::get('/admin/salidas/pdf/',[
        'uses'	=>'ExpenseController@pdf',
        'as'	=>'admin.salidas.pdf'
        ]);
      Route::resource('proveedores','ProviderController');
        Route::get('/admin/proveedores/pdf/',[
        'uses'	=>'ProviderController@pdf',
        'as'	=>'admin.proveedores.pdf'
        ]);
        Route::get('proveedores/registrar_salidas/{id}',[//crear gastos o salidas
        'uses'	=>'ProviderController@create_expense',
        'as'  	=>'admin.proveedores.add_expense'
        ]);

        Route::post('/proveedores/registrar_salidas/',[
          'uses'=>'ProviderController@store_expense',
          'as'  =>'admin.proveedores.store_expense'
        ]);

      Route::resource('servicios','ServiceController');
        Route::get('/admin/servicios/pdf/',[
        'uses'	=>'ServiceController@pdf',
        'as'	=>'admin.servicios.pdf'
        ]);


    });





});
