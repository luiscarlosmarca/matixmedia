@extends('app')

@section('htmlheader_title')
    Crear Usuario
@endsection


@section('main-content')

<div class="container" >
  @include('error')
	<div class="row">
		<div class="col-md-10 col-md-offset-1" >
			<div class="panel panel-primary">


				<div class="panel-heading">Crear Projecto </div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'admin.projectos.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}


                    @include('projects.partials.fields')

                    <button type="submit" class="btn btn-primary">
                      Guardar projecto
                    </button>


    				</div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
