<table class="table">
        <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Proveedor</th>

                          <th>Categoria</th>
                          <th>Agente</th>
                          <th>valor</th>
                          <th>detalles</th>
                          <th>Acciones</th>

                      </tr>
        </thead>
        <tbody>
                    @foreach ($expenses as $expense)
                    <tr>
                        <td>{{$expense->date}}</td>
                        <td>{{$expense->provider->name}}</td>
                        <td>{{$expense->provider->category}}</td>
                        <td>{{$expense->user->name}}</td>
                        <td>{{$expense->value}}</td>
                        <td>{{$expense->details}}</td>


                        <td>
                          <a href="#"class="btn btn-default"  target="_blank" class="thumbnail" >
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Actualizar
                          </a>
                        </td>


                    </tr>
                    @endforeach
                    <td><h3>Total:</h3></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <h3>${{ $d_expenses}} </h3></td>
                    <td></td>

          </tbody>
</table>


{!!$expenses->render()!!}
        </div>
