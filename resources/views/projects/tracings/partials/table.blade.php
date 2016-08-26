<table class="table">
        <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Detalles</th>

                          <th>Estado</th>
                          <th>Fase</th>
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
                        <a href="/upload/projects/tracings/{{$tracing->file}}" target="_blank" class="thumbnail">
                          Descargar
                        </a>


                    </tr>
                    @endforeach

          </tbody>
</table>

        </div>
