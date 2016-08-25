@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container-fluid">

	<div class="row">
    @if (Session::has('message'))

      <p class="alert alert-warning"> {{Session::get('message') }}</p>

      @endif



      	<div class="panel panel-primary">

            <div class="panel-heading">
                    Listado de usuarios

              </div>


                    <div class="panel-body">

                      <p>
                    @include('users/partials/search')
                      </p>

                        <div class="table-responsive">

                                    @include('users.partials.table')

                        </div>
                                <!-- /.panel-body -->

		</div>
	</div>
</div>
@endsection
