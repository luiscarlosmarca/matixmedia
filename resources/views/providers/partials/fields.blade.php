<div class="form-group">

					{!! Form::label('name','Nombre')!!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la entidad'])!!}

					{!! Form::label('phone','Telefono')!!}
					{!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Ingrese el numero telefonico'])!!}

					{!! Form::label('contact','Contacto')!!}
					{!! Form::text('contact',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del contacto directo en la entidad'])!!}

					{!! Form::label('category','Categoria')!!}
					{!! Form::select('category',config('category.category'), null, ['class'=>'form-control']) !!}


					{!! Form::label('email','Email')!!}
					{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese el email de la entidad'])!!}

        	{!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}


				</div>
