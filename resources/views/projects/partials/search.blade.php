
<nav class="navbar navbar-default">
	<div class="container-fluid">

		{!!Form::model(Request::all(),['route'=>'admin.projectos.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}

					<div class="form-group">
						<a href="{{route('admin.projectos.create')}}"class="btn btn-danger btn-lg" >
							<span class="glyphicon glyphicon-fire" aria-hidden="true"></span> Crear Projecto
						</a>
 					</div>
						<div class="form-group">

						    {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del proyecto'])!!}

		 			 	 </div>
						  <button type="submit" class="btn btn-default">Buscar!!</button>


		{!!Form::close()!!}

			</div><!-- /.container-fluid -->
		</nav>
