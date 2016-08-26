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


				<div class="panel-heading"><h3>Crear usuarios</h3> </div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'admin.usuarios.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
                    {!! Form::label('file','Foto')!!}
                    {!! Form::file('photo',null,['class'=>'form-control'])!!}
                    <p class="help-block">Imagenes 100kb .jpg y .png. Tamaños Altura 480 px  X Ancho 480 px</p>

                    @include('users.partials.fields')

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
