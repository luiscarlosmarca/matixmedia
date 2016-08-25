
<nav class="navbar navbar-default">
	<div class="container-fluid">

		{!!Form::model(Request::all(),['route'=>'admin.usuarios.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}

						<div class="form-group">

						    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del usuario'])!!}
								{!!Form::text('cedula',null,['class'=>'form-control','placeholder'=>'Cedula del usuario'])!!}
								{!!Form::select('role',config('role.role'), null, ['class'=>'form-control']) !!}

		 			 	 </div>
						  <button type="submit" class="btn btn-default">Buscar!!</button>


		{!!Form::close()!!}

			</div><!-- /.container-fluid -->
		</nav>
