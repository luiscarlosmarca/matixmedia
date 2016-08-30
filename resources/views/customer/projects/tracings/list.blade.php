@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')

<div class="container">
	<div class="row">
    @if (Session::has('message'))

      <p class="alert alert-warning"> {{Session::get('message') }}</p>

      @endif
      <div class="row">
        <div class="col-md-10 col-md-offset-1" >
      	<div class="panel panel-primary">

            <div class="panel-heading">
                    <h3>Listado de seguimientos del proyecto: {{$project->name}}</h3>

              </div>
                    <div class="panel-body">

                      <p>
                    @include('projects/tracings/partials/accion')
                      </p>

                        <div class="table-responsive">

                                    @include('projects.tracings.partials.table')

                        </div>
                                <!-- /.panel-body -->

		</div>
  </div>
</div>
	</div>
</div>
@endsection
