@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">perfil de {{$user->name}}</div>

				<div class="panel-body">
					Bienvenidos
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
