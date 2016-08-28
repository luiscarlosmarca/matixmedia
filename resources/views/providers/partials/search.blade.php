
<nav class="navbar navbar-default">
	<div class="container-fluid">

		{!!Form::model(Request::all(),['route'=>'admin.briefs.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}


						<div class="form-group">

						    {!!Form::date('date',null,['class'=>'form-control','placeholder'=>'Fecha del seguimiento'])!!}


								
		 			 	 </div>
						  <button type="submit" class="btn btn-default">Buscar!!</button>


		{!!Form::close()!!}

			</div><!-- /.container-fluid -->
		</nav>
