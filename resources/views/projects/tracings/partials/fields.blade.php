<div class="form-group">

					{!! Form::label('date','Fecha')!!}

					{!! Form::date('date',null,['class'=>'form-control','placeholder'=>'Ingrese la fecha del seguimiento.'])!!}

					{!! Form::label('details','Detalle')!!}
					{!! Form::textarea('details',null,['class'=>'form-control textarea-content','placeholder'=>'Detalles del avance del proyecto'])!!}

					{!! Form::label('state','Estado')!!}
					{!! Form::select('state',config('state.state'), null, ['class'=>'form-control']) !!}

					{!! Form::label('phase','Fase')!!}
					{!! Form::select('phase',config('phase.phase'), null, ['class'=>'form-control']) !!}


					{!! Form::label('file','Archivos del seguimiento')!!}
					{!! Form::file('file',null,['class'=>'form-control'])!!}
	


        	{!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}

					{!! Form::hidden('project_id',$project->id)!!}

				</div>
