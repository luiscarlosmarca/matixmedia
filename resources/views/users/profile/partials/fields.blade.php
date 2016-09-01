<div class="form-group">

					{!! Form::label('cellphone','Telefono')!!}
					{!! Form::text('cellphone',Auth::user()->cellphone,['class'=>'form-control','placeholder'=>'Escriba el telefono de contacto'])!!}


					{!! Form::label('address','Dirección')!!}
					{!! Form::text('address',Auth::user()->address,['class'=>'form-control','placeholder'=>'Escriba  la dirección'])!!}

					{!! Form::label('email','Correo Electronico')!!}
					{!! Form::email('email',Auth::user()->email,['class'=>'form-control','placeholder'=>'Escriba  el correo electronico'])!!}

        	{!! Form::label('Contraseña','Cambiar la Contraseña')!!}

          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Escriba su contraseña" name="password"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Repita la contraseña" name="password_confirmation"/>
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
				@if(Auth::user()->customer()|| Auth::user()->admin())

							{!! Form::label('name_company','Nombre de la Empresa')!!}
							{!! Form::text('name_company',null,['class'=>'form-control','placeholder'=>'escriba el nombre de su empresa'])!!}

							{!! Form::label('phone_company','Teléfono  de la Empresa')!!}
							{!! Form::text('phone_company',null,['class'=>'form-control','placeholder'=>'escriba el telefono de su empresa'])!!}

		          {!! Form::label('email_company','Email de la Empresa')!!}
		          {!! Form::text('email_company',null,['class'=>'form-control','placeholder'=>'escriba el email de su empresa'])!!}

							{!! Form::label('direccion_company','Dirección de la Empresa')!!}
							{!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'escriba el dirección de su empresa'])!!}
		@endif
		@if(Auth::user()->developer()|| Auth::user()->admin()||Auth::user()->agent())
							{!! Form::label('city','Ciudad')!!}
							{!! Form::text('city',Auth::user()->profile->city,['class'=>'form-control','placeholder'=>'escriba la ciudad de residencia'])!!}

							{!! Form::label('social','social')!!}
							{!! Form::text('social',Auth::user()->profile->social,['class'=>'form-control','placeholder'=>'escriba su red social'])!!}
			@if(Auth::user()->profile->curriculum =="")
							{!! Form::label('curriculum','Curriculum')!!}
							{!! Form::file('curriculum',null,['class'=>'form-control','placeholder'=>'ad de residencia'])!!}
			@endif
						{!! Form::label('feNa','Fecha de nacimiento')!!}
						{!! Form::date('feNa',Auth::user()->profile->feNa,['class'=>'form-control','placeholder'=>'escriba la fecha de nacimiento.'])!!}
			@endif

			@if(Auth::user()->admin())

									{!!Form::label('reference', 'Referencia') !!}
									{!!Form::select('reference',config('reference.reference'), null, ['class'=>'form-control']) !!}

									{!!Form::label('position', 'Position') !!}
									{!!Form::select('position',config('position.position'), null, ['class'=>'form-control']) !!}

									{!!Form::label('efficiency', 'efficiency') !!}
									{!!Form::select('efficiency',config('efficiency.efficiency'), null, ['class'=>'form-control']) !!}


									{!! Form::label('salary','salary')!!}
									{!! Form::text('salary',null,['class'=>'form-control','placeholder'=>'escriba el salario'])!!}


									{!! Form::label('note','Nota')!!}
									{!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'escriba la nota'])!!}

					@endif

				</div>
