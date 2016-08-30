@extends('app')

@section('htmlheader_title')
    Registrar Salida
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


				<div class="panel-heading"><h3>Registrar Salida de tipo: {{$provider->category}}
           al proveedor {{$provider->name}}
         </h3></div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'admin.proveedores.store_expense','method'=>'POST'])!!}


                    @include('providers.expenses.partials.fields')

                    <button type="submit" class="btn btn-primary">
                    Registrar salida
                    </button>


    				</div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
