<table class="table">
        <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Cliente</th>

                          <th>Proyecto</th>
                          <th>Agente</th>
                          <th>valor </th>
                          <th>Forma de pago </th>



                      </tr>
        </thead>
        <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{$payment->created_at}}</td>
                        <td>{{$payment->project->costumer->name}}</td>
                        <td>{{$payment->project->name}}</td>
                        <td>{{$payment->project->agent->name}}</td>
                        <td>{{$payment->value}}</td>
                        <td>{{$payment->type}}</td>

                        <td>


                        </a>
                        </td>



                    </tr>
                    @endforeach

          </tbody>
</table>


{!!$payments->render()!!}
        </div>
