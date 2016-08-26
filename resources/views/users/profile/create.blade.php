@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">  <h3>Detalles del perfil de {{$user->name}}  </h3></div>

        {!!Form::open(['route'=>'usuarios.update_profile','method'=>'POST','enctype'=>'multipart/form-data'])!!}

  				<div class="panel-body">
  				@include('users/profile/partials/fields')
          <button type="submit" class="btn btn-primary">
            Guardar
          </button>


          </div>
      {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
