


		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-6 col-md-4">
						<h3>	Total de ingresos <small><span class="label label-danger">  {{$t_payments}} </span></small></h3>
					</div>
				<div class="col-xs-6 col-md-4">
					<h3>	Caja actual <small><span class="label label-danger"> {{$total}} </span></small></h3>
				</div>

				<div class="col-xs-6 col-md-4">
					{!!Form::date('date',null,['class'=>'form-control','placeholder'=>'Fecha del seguimiento'])!!}
	<button type="submit" class="btn btn-default">Buscar!!</button>
				</div>
			</div>

			</div>
		</div>


				</div>



		{!!Form::close()!!}
