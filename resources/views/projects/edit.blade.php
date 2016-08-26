@extends('app')

@section('htmlheader_title')
    Editar  Usuario {{$project->name}}
@endsection


@section('main-content')

<div class="container" >
  @include('error')
	<div class="row">
		<div class="col-md-10 col-md-offset-1" >
			<div class="panel panel-success">


				<div class="panel-heading"><h2>El Proyecto  {{$project->name}} esta a cargo del desarrollador</h2>
           <span class="label label-danger">{{$project->developer->name}} </span>
        </div>


    				<div class="panel-body">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-xs-6 col-md-4">
                      <h3>Cliente <small><span class="label label-danger">{{$project->costumer->name}} </span></small></h3>
                    </div>
                  <div class="col-xs-6 col-md-4">
                     <h3>Servicio <small><span class="label label-danger">{{$project->service->name}} </span></small></h3>
                  </div>

                  <div class="col-xs-6 col-md-4">
                          <h3>Agente <small><span class="label label-danger">{{$project->agent->name}} </span></small></h3>

                  </div>
                </div>

                </div>
              </div>


                  <div class="row">
                  <div class="col-xs-6 col-md-4">
                      <center>
                      <a href="/upload/projects/contracts/{{$project->contract}}" target="_blank" class="thumbnail">
                       <img src="/upload/images/contrato.png" alt="Ver contrato " class="img-resposive"><br>
                       Ver Contrato
                       </a>
                     </center>


                    </div>

                  <div class="col-xs-6 col-md-4">
                      <center>
                      <a href="/upload/projects/files/{{$project->file}}" target="_blank" class="thumbnail">
                       <img src="/upload/images/file.png" alt="Ver archivos" class="img-resposive"><br>
                       Descargar archivos del proyecto
                           </a>
                       </center>
                  </div>

                       <div class="col-xs-6 col-md-4">
                           <center>
                           <a href="/upload/projects/contracts/{{$project->brief}}" target="_blank" class="thumbnail">
                            <img src="/upload/images/brief.png" alt="Descargar archivos del brief " class="img-resposive"><br>
                            Descargar archivos del brief
                            </a>
                          </center>

                         </div>

                    </div>
                      {!!Form::model($project,['route'=>['admin.projectos.update',$project],'method'=>'PUT'])!!}

                      @include('projects.partials.fieldsEdit')

                    <button type="submit" class="btn btn-primary">
                      Actualizar Projecto
                    </button>


    				</div>
                {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
