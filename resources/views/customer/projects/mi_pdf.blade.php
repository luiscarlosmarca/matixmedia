
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



		          </tbody>
		</table>

<h1> Ingresos</h1>
		<table class="table table-condensed" border="1">
						<thead>
													<tr>
															<th>Fecha</th>
															<th>Valor</th>
															<th>Nota</th>


													</tr>
						</thead>
						<tbody>
								  @foreach ($project->payments as $payment)
												<tr>
														<td>{{$payment->date}}</td>
														<td>{{$payment->value}}</td>
														<td>{{$payment->note}}</td>


												</tr>
								  @endforeach

							</tbody>
		</table>



		<h1> seguimientos</h1>
				<table class="table table-condensed" border="1">
								<thead>
															<tr>
																	<th>Fecha</th>
																	<th>Valor</th>
																	<th>Nota</th>


															</tr>
								</thead>
								<tbody>

										@foreach ($project->tracings as $tracing)
														<tr>
																<td>{{$tracing->details}}</td>
																<td>{{$tracing->date}}</td>
																<td>{{$tracing->note}}</td>


														</tr>


									</tbody>
				</table>


				<h1> Brief</h1>
						<table class="table table-condensed" border="1">
										<thead>
																	<tr>
																			<th>Fecha</th>
																			<th>Valor</th>
																			<th>Nota</th>

																	</tr>
										</thead>
										<tbody>
																<tr>
																		<td>{{$project->brief->details}}</td>
																		<td>{{$project->brief->fields}}</td>
																		<td>{{$project->tender}}</td>


																</tr>

											</tbody>
						</table>

		      </div>

</body>
			</div>
				</div>
					</div>
