<div class="form-group">

					{!! Form::label('value','Valor')!!}
					<div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon">$</div>

								{!! Form::text('value',null,['class'=>'form-control','placeholder'=>'Escriba el precio total del prouyecto, especifique detalles en notas.'])!!}

					    </div>
					  </div>


					{!! Form::label('formPay','Forma de pago')!!}
					{!! Form::select('type',config('formPay.formPay'), null, ['class'=>'form-control']) !!}

        	{!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}

					{!! Form::hidden('project_id',$project->id)!!}

				</div>
