<div class="form-group">


					{!! Form::label('name','Nombre')!!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Escriba el nombre del usuario'])!!}

          {!! Form::label('cedula','Cedula')!!}
          {!! Form::text('cedula',null,['class'=>'form-control','placeholder'=>'Escriba  la cedula'])!!}

        
          {!!Form::label('role', 'Rol del usuario') !!}
          {!!Form::select('role',config('role.role'), null, ['class'=>'form-control']) !!}

					{!! Form::label('cellphone','Telefono')!!}
					{!! Form::text('cellphone',null,['class'=>'form-control','placeholder'=>'Escriba el telefono de contacto'])!!}


					{!! Form::label('address','Dirección')!!}
					{!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Escriba  la dirección'])!!}

					{!! Form::label('email','Correo Electronico')!!}
					{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Escriba  el correo electronico'])!!}





        	{!! Form::label('Contraseña','Contraseña')!!}

          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Escriba su contraseña" name="password"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Repita la contraseña" name="password_confirmation"/>
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>

          {!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}


				</div>
