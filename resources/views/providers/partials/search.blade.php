
<nav class="navbar navbar-default">
	<div class="container-fluid">

		{!!Form::model(Request::all(),['route'=>'admin.proveedores.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}


						    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de la entidad'])!!}

								{!! Form::select('category',config('category.category'), null, ['class'=>'form-control']) !!}
								{!!Form::text('contact',null,['class'=>'form-control','placeholder'=>'Contacto del proveedor'])!!}
  <button type="submit" class="btn btn-default">Buscar!!</button>

		 			 	 </div>



		{!!Form::close()!!}

			</div><!-- /.container-fluid -->
		</nav>
