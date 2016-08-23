
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Projectos</div>
        @foreach($projects as $project)
        {{$project->name}}<br>
        {{$project->details}}<br>
        @endforeach

				<div class="panel-body">
					Bienvenidos
				</div>
			</div>
		</div>
	</div>
</div>
