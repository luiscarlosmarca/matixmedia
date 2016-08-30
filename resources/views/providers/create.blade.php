@extends('app')

@section('htmlheader_title')
    Crear Proveedor o entidad
@endsection


@section('main-content')

<div class="container" >
  @include('error')
  @if (Session::has('message'))

  <p class="alert alert-info"> {{Session::get('message') }}</p>

  @endif

	<div class="row">
		<div class="col-md-10 col-md-offset-1" >
			<div class="panel panel-primary">


				<div class="panel-heading"><h3>Crear Proveedor o entidad
         </h3></div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'admin.proveedores.store','method'=>'POST'])!!}


                    @include('providers.partials.fields')

                    <button type="submit" class="btn btn-primary">
                    Crear proveedor
                    </button>


    				</div>

            {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
