<table class="table">
        <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Detalles</th>

                          <th>Estado</th>
                          <th>Fase</th>

                          <th>Registrado por:</th>
                          <th>Nota</th>
                          <th>Archivos</th>

                      </tr>
        </thead>
        <tbody>
                    @foreach ($project->tracings as $tracing)
                    <tr>
                        <td>{{$tracing->date}}</td>
                        <td>{!!$tracing->details!!}</td>
                        <td>{{$tracing->state}}</td>
                        <td>{{$tracing->phase}}</td>
                        <td>{{$tracing->user->name}}</td>
                        <td>{!!$tracing->note!!}</td>
                        <td>
                          @if($tracing->file!="")
                          <a href="/upload/projects/tracings/{{$tracing->file}}"class="btn btn-default"  target="_blank" class="thumbnail" >
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>  Descargar Archivos
                          </a>
                          @endif

                        </a>
                        </td>


                    </tr>
                    @endforeach

          </tbody>
</table>

        </div>
