
<html>
<head>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<title> Informe del listado de projectos </title>
	<body>

		<div class="col-md-10 col-md-offset-1">
      	<div class="panel panel-primary">
            <div class="panel-heading">
                    Listado de Projectos
              </div>
		<table class="table table-condensed" border="1">
		        <thead>
		                      <tr>
		                          <th>Nombre</th>
															<th>Cliente</th>
															<th>Email</th>
															<th>Telefono</th>
		                          <th>Servicio</th>

															<th>Agente</th>
															<th>developer</th>
															<th>fecha de entrega</th>


		                      </tr>
		        </thead>
		        <tbody>
		                    @foreach ($projects as $project)
		                    <tr>
		                        <td>{{$project->name}}</td>
														<td>{{$project->costumer->name}}</td>
														<td>{{$project->costumer->email}}</td>
		                        <td>{{$project->costumer->cellphone}}</td>
		                        <td>{{$project->service->name}}</td>
														<td>{{$project->agent->name}}</td>
														<td>{{$project->developer->name}}</td>
														<td>{{$project->dateFinish}}</td>

		                    </tr>
		                    @endforeach


		          </tbody>
		</table>

		      </div>

</body>
			</div>
				</div>
					</div>
