@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
    @include('error')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">Detalles del perfil de  {{ Auth::user()->name }}</div>

        {!!Form::model($profile,['route'=>['perfil.update',$profile],'method'=>'PATCH','enctype'=>'multipart/form-data'])!!}

  				<div class="panel-body">
  				@include('users/profile/partials/fields')
          <button type="submit" class="btn btn-primary">
            Actualizar
          </button>


          </div>
      {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
