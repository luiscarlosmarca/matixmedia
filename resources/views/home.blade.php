@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
  @if (Session::has('message'))

    <p class="alert alert-warning"> {{Session::get('message') }}</p>

    @endif
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
					Bienvenidos
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
