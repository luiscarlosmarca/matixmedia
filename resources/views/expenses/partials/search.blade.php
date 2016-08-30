

				<div class="panel panel-default">
					<div class="panel-body">
							<div class="row">
					<div class="col-md-4"><h3>	Total de Salidas <small><span class="label label-danger">  ${{$t_expenses}} </span></small></h3>
</div>
					<div class="col-md-4"><h3>	Caja actual <small><span class="label label-danger"> ${{$total}} </span></small></h3>
</div>
				  <div class="col-md-4">
						{!!Form::model(Request::all(),['route'=>'admin.salidas.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
						{!!Form::date('date',null,['class'=>'form-control','placeholder'=>'Fecha del seguimiento'])!!}
						<button type="submit" class="btn btn-default">Buscar!!</button>
					</div>



				</div>

					{!!Form::close()!!}

		</div>
				</div>	</div>
