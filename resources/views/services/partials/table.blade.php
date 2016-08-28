<table class="table">
        <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>Cliente</th>

                          <th>Proyecto</th>
                          <th>Agente</th>

                          <th>Archivos</th>
                          <th>Acciones</th>

                      </tr>
        </thead>
        <tbody>
                    @foreach ($briefs as $brief)
                    <tr>
                        <td>{{$brief->date}}</td>
                        <td>{{$brief->project->costumer->name}}</td>
                        <td>{{$brief->project->name}}</td>
                        <td>{{$brief->project->agent->name}}</td>

                        <td>
                          @if($brief->file!="")
                          <a href="/upload/projects/briefs/{{$brief->file}}"class="btn btn-default"  target="_blank" class="thumbnail" >
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>  Descargar Archivos
                          </a>
                          @endif

                        </a>
                        </td>
                        <td>
                          <a href="#"class="btn btn-default"  target="_blank" class="thumbnail" >
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Actualizar
                          </a>
                        </td>


                    </tr>
                    @endforeach

          </tbody>
</table>


{!!$briefs->render()!!}
        </div>
