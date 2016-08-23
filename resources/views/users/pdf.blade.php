
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Usuarios</div>
        @foreach($users as $user)
        {{$user->name}}<br>
        {{$user->email}}<br>
        @endforeach

				<div class="panel-body">
					Bienvenidos
				</div>
			</div>
		</div>
	</div>
</div>
