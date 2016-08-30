<div class="form-group">

					{!! Form::label('name','Nombre')!!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la entidad'])!!}

					{!! Form::label('details','Detalles')!!}
					{!! Form::textarea('details',null,['class'=>'form-control textarea-content','placeholder'=>'Detalles del servicio, especificar periodos y porcentajes para vendedores'])!!}

					{!! Form::label('price','Precio')!!}
					{!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Ingrese el valor del servicio'])!!}

				

        	{!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}


				</div>
