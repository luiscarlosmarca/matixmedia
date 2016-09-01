<table class="table table-condensed">
        <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Servicio</th>
                          <th>Cliente</th>
                          @if(Auth::user()->agent())
                          <th>Developer</th>
                          @endif
                          @if(Auth::user()->developer())
                          <th>Agent</th>
                          @endif
                          <th>Fecha de inicio</th>
                          <th>Fecha de entrega</th>
                          <th>Acciones</th>
                      </tr>
        </thead>
        <tbody>
                    @foreach ($projects as $project)
                    <tr>

                        <td>{{$project->name}}</td>
                        <td>{{$project->service->name}}</td>
                        <td>{{$project->costumer->name}}</td>
                        @if(Auth::user()->agent())
                        <td>{{$project->developer->name}}</td>
                        @endif
                        @if(Auth::user()->developer())
                        <td>{{$project->agent->name}}</td>
                        @endif

                        <td>{{$project->dateStart}}</td>
                        <td>{{$project->dateFinish}}</td>
                        <td>
                          @if(Auth::user()->agent()||Auth::user()->developer())
                          <div class="btn-group">
                                  <button type="button" class="btn btn-danger">Accion</button>
                                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{route('projecto.edit',$project)}}">Actualizar</a></li>

                                    <li><a href="{{route('projecto.add_tracing',$project)}}">Seguimientos</a></li>
                                    @if(Auth::user()->agent())
                                    <li><a href="{{route('projecto.ingresos',$project)}}">Ingresos</a></li>
                                    @endif
                                    @if($project->brief=="")
                                    <li><a href="{{route('projecto.add_brief',$project)}}">Crear Brief</a></li>
                                    @else
                                    <li><a href="{{route('projecto.editar_brief',$project->brief->id)}}">Actualizar Brief</a></li>
                                    @endif
                                    <!-- <li><a href="{{route('admin.projecto.mi_pdf',$project)}}" target="_blank">Ver en pdf</a></li> -->

                                  </ul>
                                </div>
                          @endif
                          @if(Auth::user()->customer())
                          <a href="{{route('projecto.edit',$project)}}"class="btn btn-default" class="thumbnail" >
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Actualizar
                          </a>
                          @endif
                          </td>
                    </tr>


                    @endforeach



          </tbody>
</table>

        </div>
