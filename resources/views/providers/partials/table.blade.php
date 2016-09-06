<table class="table">
        <thead>
                      <tr>

                          <th>Nombre</th>

                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Categoria</th>
                          <th>Contacto</th>

                          <th>Acciones</th>

                      </tr>
        </thead>
        <tbody>
                    @foreach ($providers as $provider)
                    <tr>
                        <td>{{$provider->name}}</td>
                        <td>{{$provider->phone}}</td>
                        <td>{{$provider->email}}</td>
                        <td>{{$provider->category}}</td>
                        <td>{{$provider->contact}}</td>


                        <td>
                          <div class="btn-group">
                                    <button type="button" class="btn btn-danger">Accion</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="caret"></span>
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{route('admin.proveedores.edit',$provider)}}">Actualizar</a></li>
                                      <li><a href="{{route('admin.proveedores.add_expense',$provider)}}">Registrar Salida</a></li>


                                    </ul>
                                  </div>
                        </td>


                    </tr>
                    @endforeach

          </tbody>
</table>


{!!$providers->render()!!}
      
