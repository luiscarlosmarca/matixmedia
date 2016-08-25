<table class="table table-condensed">
        <thead>
                      <tr>
                          <th>Foto</th>
                          <th>Nombre</th>
                          <th>Role</th>
                          <th>Email</th>
                          <th>Acciones</th>
                      </tr>
        </thead>
        <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><img src="/upload/users/{{$user->photo}}" height="120" width="120"></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->email}}</td>
                        <td><div class="btn-group">
                                  <button type="button" class="btn btn-danger">Accion</button>
                                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{route('admin.usuarios.edit',$user)}}">Actualizar</a></li>
                                    <li><a href="{{route('admin.usuarios.pdf',$user)}}">Ver en pdf</a></li>
                                    <li><a href="{{route('admin.usuarios.pdf',$user)}}">Ver perfil</a></li>

                                  </ul>
                                </div>
                          </td>
                    </tr>
                    @endforeach


          </tbody>
</table>
{!!$users->render()!!}
      </div>
