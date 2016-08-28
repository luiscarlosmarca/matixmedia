@extends('app')

@section('htmlheader_title')
    Editar  Brief del proyecto {{$brief->name}}
@endsection


@section('main-content')

<div class="container" >
  @include('error')
	<div class="row">
		<div class="col-md-10 col-md-offset-1" >
			<div class="panel panel-success">


				<div class="panel-heading"><h2>Actulizando el brief del Proyecto  {{$brief->project->name}}</h2>

        </div>


    				<div class="panel-body">



                  {!!Form::model($brief,['route'=>['admin.projecto.update_brief',$brief],'method'=>'PATCH','enctype'=>'multipart/form-data'])!!}

                      @include('projects.briefs.partials.fields')

                    <button type="submit" class="btn btn-primary">
                      Actualizar Projecto
                    </button>
                    @if($brief->file!="")
                    <a href="/upload/projects/briefs/{{$brief->file}}"class="btn btn-default"  target="_blank" class="thumbnail" >
                      <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>  Descargar Archivos
                    </a>
                    @endif


    				</div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
