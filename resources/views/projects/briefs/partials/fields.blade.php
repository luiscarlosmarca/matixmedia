<div class="form-group">

					{!! Form::label('date','date')!!}
					{!! Form::date('date',null,['class'=>'form-control','placeholder'=>'Escriba el nombre del projecto'])!!}

					{!! Form::label('tender','Propuesta')!!}
					{!! Form::textarea('tender',null,['class'=>'form-control textarea-content','placeholder'=>'Detalle la propuesta presentada al cliente.'])!!}

					{!! Form::label('fields','Entidades')!!}
					{!! Form::textarea('tenfieldsder',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba los grupos o la tablas que el cliente maneja.'])!!}

					{!! Form::label('functional','Requerimientos Funcionales')!!}
					{!! Form::textarea('functional',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba los requerimientos funcinales.'])!!}

					{!! Form::label('nofunctional','Requerimientos Funcionales')!!}
					{!! Form::textarea('functional',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba los requerimientos funcinales.'])!!}

					{!! Form::label('website','Sitio web')!!}
					{!! Form::text('website',null,['class'=>'form-control','placeholder'=>'Escriba  el sitio web'])!!}

					{!! Form::label('detail','Detalles generales')!!}
					{!! Form::textarea('detail',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba los detalles generales, como los correos y otros acuerdos.'])!!}

					{!! Form::label('goles','Objetivos especificos de la Campaña')!!}
					{!! Form::textarea('goles',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba los dObjetivos especificos de la Campaña en Google'])!!}

					{!! Form::label('type','Redes publicitarias')!!}
					{!! Form::text('type',null,['class'=>'form-control','placeholder'=>'Escriba  el tipo de publicidad (Diplay, search, youtube...)'])!!}

					{!! Form::label('geography','Orientación geografica')!!}
					{!! Form::text('geography',null,['class'=>'form-control','placeholder'=>'Escriba  la ciuudad, region que va orientar la campaña'])!!}

					{!! Form::label('budget','Presupuesto')!!}
					{!! Form::text('budget',null,['class'=>'form-control','placeholder'=>'Presupuesta para la campaña'])!!}

					{!! Form::label('promotion','Promociones u ofertas')!!}
					{!! Form::text('promotion',null,['class'=>'form-control','placeholder'=>'Escriba ofertas como valor agregado para la campaña'])!!}

					{!! Form::label('adverts','Anuncios de texto')!!}
					{!! Form::textarea('adverts',null,['class'=>'form-control textarea-content','placeholder'=>'Escriba los textos que le gustaria que aparecieran en los anuncios'])!!}

					{!! Form::label('keywords','Palabras claves')!!}
					{!! Form::textarea('adverts',null,['class'=>'form-control textarea-content','placeholder'=>'ideas para las palabras claves y las palabras negativas'])!!}


					{!! Form::label('file','Archivos del projecto')!!}
					{!! Form::file('file',null,['class'=>'form-control'])!!}
					<p class="help-block">Maximo 500Mb .rar y .zip.</p>

				  {!! Form::label('note','Nota')!!}
          {!! Form::textarea('note',null,['class'=>'form-control textarea-content','placeholder'=>'Nota'])!!}
					{!! Form::hidden('project_id',$project->id)!!}

				</div>
