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

                    </tr>
                    @endforeach
                    <td><h3>Total:</h3></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td> <h3>${{ $d_payments}} </h3></td>
                    <td></td>


          </tbody>
</table>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <h3>	</h3>




  </div>

  </div>
</div>

{!!$payments->render()!!}
        </div>
