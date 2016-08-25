
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
		                          <th>cedula</th>
		                          <th>Nombre</th>
		                          <th>Role</th>
		                          <th>Email</th>
															<th>Dirección</th>
															<th>Telefono</th>

		                      </tr>
		        </thead>
		        <tbody>
		                    @foreach ($projects as $project)
		                    <tr>
		                        <td>{{$project->cedula}}</td>
		                        <td>{{$project->name}}</td>
		                        <td>{{$project->role}}</td>
		                        <td>{{$project->email}}</td>
														<td>{{$project->address}}</td>
														<td>{{$project->cellphone}}</td>

		                    </tr>
		                    @endforeach


		          </tbody>
		</table>

		      </div>

</body>
			</div>
				</div>
					</div>
