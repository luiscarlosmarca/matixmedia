<table class="table">
        <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Precio</th>

                          <th>Detalles</th>
                          <th>Nota</th>


                          <th>Acciones</th>

                      </tr>
        </thead>
        <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>{{$service->name}}</td>
                        <td>{{$service->price}}</td>
                        <td>{{$service->details}}</td>
                        <td>{{$service->note}}</td>

                        @if(Auth::user()->admin())
                        <td>
                          <a href="#"class="btn btn-default"  target="_blank" class="thumbnail" >
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Actualizar
                          </a>
                        </td>
                        @endif

                        <td>
                          <a href="#"class="btn btn-default"  target="_blank" class="thumbnail" >
                            <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>  Ver detalles
                          </a>
                        </td>
                    


                    </tr>
                    @endforeach

          </tbody>
</table>


{!!$services->render()!!}
        </div>
