@extends('app')

@section('htmlheader_title')
Registrar Ingreso
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


				<div class="panel-heading"><h3>Registrando ingreso al proyecto: {{$project->name}} </h3></div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'projecto.store_ingresos','method'=>'POST'])!!}


                    @include('agent.projects.payments.partials.fields')

                    <button type="submit" class="btn btn-primary">
                    Registrar ingreso
                    </button>


    				</div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
