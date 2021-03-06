@extends('app')

@section('htmlheader_title')
    Editar  Usuario {{$user->name}}
@endsection


@section('main-content')

<div class="container" >
  @include('error')
	<div class="row">
		<div class="col-md-10 col-md-offset-1" >
			<div class="panel panel-success">


				<div class="panel-heading">  <h3>Editar usuario  {{$user->name}}  </h3>  </div>


    				<div class="panel-body">
              {!!Form::model($user,['route'=>['admin.usuarios.update',$user],'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
                    <img src="/upload/users/{{$user->photo}}" height="120" width="120">
                    @include('users.partials.fields')

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
