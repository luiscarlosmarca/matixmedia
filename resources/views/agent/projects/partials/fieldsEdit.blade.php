<div class="form-group">

					{!! Form::label('name','Nombre')!!}
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Escriba el nombre del projecto'])!!}

					{!! Form::label('cellphone','Precio')!!}
					{!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Escriba el precio total del prouyecto, especifique detalles en notas.'])!!}

					{!! Form::label('formPay','Forma de pago')!!}
					{!! Form::select('formPay',config('formPay.formPay'), null, ['class'=>'form-control']) !!}

          {!! Form::label('detalles','Detalles')!!}
          {!! Form::textarea('details',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba  la cedula'])!!}

					@if(Auth::user()->agent())

					{!!Form::label('service', 'Servicios') !!}
					{!!Form::select('service_id',$services, null, ['class'=>'form-control','placeholder'=>'Selecciones una opcion','required']) !!}

					{!!Form::label('developer', 'Desarrollador') !!}
					{!!Form::select('developer_id',$developers, null, ['class'=>'form-control','placeholder'=>'Selecciones una opcion','required']) !!}

					@endif

					{!! Form::label('dateStart','Fecha de inicio')!!}
					{!! Form::date('dateStart',null,['class'=>'form-control','placeholder'=>'Escriba  la fecha de inicio'])!!}

					{!! Form::label('dateFinish','Fecha de entrega')!!}
					{!! Form::date('dateFinish',null,['class'=>'form-control','placeholder'=>'Escriba  la fecha de entrega aproximada'])!!}


          {!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}


				</div>
