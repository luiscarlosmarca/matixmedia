@extends('app')

@section('htmlheader_title')
    Registrar Brief
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


				<div class="panel-heading"><h3>Registrando el Brief del proyecto: {{$project->name}} </h3></div>


    				<div class="panel-body">
              {!!Form::open(['route'=>'projecto.store_brief','method'=>'POST','enctype'=>'multipart/form-data'])!!}
              {!! Form::hidden('project_id',$project->id)!!}

                    @include('projects.briefs.partials.fields')

          					{!! Form::label('file','Archivos del projecto')!!}
          					{!! Form::file('file',null,['class'=>'form-control'])!!}
          					<p class="help-block">Maximo 500Mb .rar y .zip.</p>


                    <button type="submit" class="btn btn-primary">
                    Registrar Brief
                    </button>



              {!! Form::close() !!}
            </div>
			</div>
		</div>
	</div>
</div>
@endsection
