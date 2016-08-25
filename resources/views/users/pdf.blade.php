
<html>
<head>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<title> Informe del listado de usuarios </title>
	<body>

		<div class="col-md-10 col-md-offset-1">
      	<div class="panel panel-primary">
            <div class="panel-heading">
                    Listado de usuarios
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
		                    @foreach ($users as $user)
		                    <tr>
		                        <td>{{$user->cedula}}</td>
		                        <td>{{$user->name}}</td>
		                        <td>{{$user->role}}</td>
		                        <td>{{$user->email}}</td>
														<td>{{$user->address}}</td>
														<td>{{$user->phone}}</td>

		                    </tr>
		                    @endforeach


		          </tbody>
		</table>

		      </div>

</body>
			</div>
				</div>
					</div>
