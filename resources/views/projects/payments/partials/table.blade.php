<table class="table">
        <thead>
                      <tr>
                          <th>Valor</th>
                          <th>Forma de pago</th>
                          <th>Agente que registro el pago</th>
                          <th>Fecha de registro</th>
                          <th>Nota</th>

                      </tr>
        </thead>
        <tbody>
                    @foreach ($project->payments as $payment)
                    <tr>
                        <td>{{$payment->value}}</td>
                        <td>{{$payment->type}}</td>
                        <td>{{$payment->user->name}}</td>
                        <td>{{$payment->created_at}}</td>
                        <td>{!!$payment->note!!}</td>

                    </tr>
                    @endforeach

          </tbody>
</table>

        </div>
