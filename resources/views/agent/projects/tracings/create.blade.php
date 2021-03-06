@extends('app')

@section('htmlheader_title')
    Registrar seguimiento
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


				<div class="panel-heading"><h3>Registrando seguimiento al proyecto: {{$project->name}} </h3></div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'projecto.store_tracing','method'=>'POST','enctype'=>'multipart/form-data'])!!}


                    @include('projects.tracings.partials.fields')
                  	{!! Form::hidden('project_id',$project->id)!!}

                    <button type="submit" class="btn btn-primary">
                    Registrar seguimiento
                    </button>


    				</div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
