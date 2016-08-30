<div class="form-group">

					{!! Form::label('date','Fecha')!!}
					{!! Form::date('date',null,['class'=>'form-control','placeholder'=>'Fecha de la salida'])!!}

					{!! Form::label('value','Valor')!!}
					<div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon">$</div>

								{!! Form::text('value',null,['class'=>'form-control','placeholder'=>'Escriba el precio total del prouyecto, especifique detalles en notas.'])!!}

					    </div>
					  </div>


					{!! Form::label('details','Detalles')!!}
					{!! Form::text('details',null,['class'=>'form-control textarea-content','placeholder'=>'Detalles de la salida'])!!}

        	{!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}

					{!! Form::hidden('provider_id',$provider->id)!!}

				</div>
