<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/upload/users/{{ Auth::user()->photo }}" class="img-circle" alt="User Image" />
            </div>



            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

                <li class="header">Menu</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <!--     <li><a href="#"><i class='fa fa-link'></i> <span>Another Link</span></a></li>-->
              @if(Auth::user()->admin())
                  <!-- /.Usuarios -->
                <li class="treeview">
                    <a href="#"><i class='fa fa-user'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.usuarios.create')}}">Crear</a></li>
                        <li><a href="{{route('admin.usuarios.index')}}">Listado</a></li>
                        <li><a href="{{route('admin.usuarios.pdf')}}" target="_blank">Generar informe</a></li>

                    </ul>
                </li>
              @endif
                    <!-- /.Projectos -->
                @if(Auth::user()->agent()||Auth::user()->admin())
                  <li class="treeview">
                      <a href="#"><i class='fa fa-fire'></i> <span>Projectos</span> <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        @if(Auth::user()->admin())

                          <li><a href="{{route('admin.projectos.index')}}">Listado</a></li>
                          <li><a href="{{route('admin.projectos.pdf')}}"target="_blank">Generar informes</a></li>
                        @endif


                          <li><a href="{{route('admin.projectos.create')}}">Crear un nuevo proyecto</a></li>


                      </ul>
                  </li>
                @endif
                @if(Auth::user()->developer()|| Auth::user()->customer()||Auth::user()->agent()||Auth::user()->admin())
                  <li class="treeview">
                      <a href="{{route('admin.projectos.index')}}">
                        <i class='fa fa-fire'></i> <span>Mis Proyectos</span> <i class="fa fa-angle-left pull-right"></i></a>

                  </li>
                @endif
              @if(Auth::user()->admin())
                  <!-- /.Seguimientos -->
              <li class="treeview">
                  <a href="#"><i class='fa fa-wrench'></i> <span>Seguimientos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">

                        <li><a href="{{route('admin.seguimientos.index')}}">Listado</a></li>
                        <li><a href="{{route('admin.seguimientos.pdf')}}"target="_blank">Generar informes</a></li>



                 </ul>
              </li>
              @endif
              @if(Auth::user()->developer()|| Auth::user()->customer()||Auth::user()->agent())
              <li class="treeview">
                <a href="{{route('admin.seguimientos.index')}}">
                <i class='fa fa-wrench'></i> <span>Mis Segumientos</span> <i class="fa fa-angle-left pull-right"></i></a>

              </li>
              @endif
                  <!-- /.Brief -->
              @if(Auth::user()->admin())
              <li class="treeview">
                  <a href="#"><i class='fa fa-list-alt'></i> <span>Brief</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">

                        <li><a href="{{route('admin.briefs.index')}}">Listado</a></li>



                  </ul>
              </li>
              @endif

              @if(Auth::user()->developer()|| Auth::user()->customer()||Auth::user()->agent())
              <li class="treeview">
                  <a href="#"><i class='fa fa-list-alt'></i> <span>Mis Brief</span> <i class="fa fa-angle-left pull-right"></i></a>

              </li>
              @endif

            @if(Auth::user()->admin())
              <!-- /.Pagos  | ingresos-->
              <li class="treeview">
                  <a href="#"><i class='fa fa-usd'></i> <span>Ingresos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">

                      <li><a href="{{route('admin.ingresos.index')}}">Listado</a></li>
                      <li><a href="{{route('admin.ingresos.pdf')}}"target="_blank">Generar informes</a></li>

                  </ul>
              </li>
            @endif

              @if(Auth::user()->agent())
              <li class="treeview">
                  <a href="{{route('admin.ingresos.index')}}">
                    <i class='fa fa-list-alt'></i> <span>Ingresos Reportados</span> <i class="fa fa-angle-left pull-right"></i></a>

              </li>
              @endif

                  <!-- /.Salidas gastos -->
              @if(Auth::user()->admin())
              <li class="treeview">
                  <a href="#"><i class='fa fa-gbp'></i> <span>Salidas</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">

                      <li><a href="{{route('admin.salidas.index')}}">Listado</a></li>
                      <li><a href="{{route('admin.salidas.pdf')}}"target="_blank">Generar informes</a></li>

                  </ul>
              </li>
              @endif


              <!-- /.Proveedores -->
              @if(Auth::user()->admin())
              <li class="treeview">
                  <a href="#"><i class='fa fa-cog'></i> <span>Proevedores</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">

                      <li><a href="{{route('admin.proveedores.index')}}">Listado</a></li>
                      <li><a href="{{route('admin.proveedores.create')}}">Crear </a></li>
                    <!--  <li><a href="{{route('admin.proveedores.pdf')}}"target="_blank">Generar informes</a></li>
                -->
                    </ul>
              </li>
              @endif

              @if(Auth::user()->developer()||Auth::user()->agent()||Auth::user()->admin())
                <!-- /.Servicios -->
                <li class="treeview">
                    <a href="#"><i class='fa fa-th-large'></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                      @if(Auth::user()->admin())

                        <li><a href="{{route('admin.servicios.create')}}">Crear </a></li>
                      @endif

                          <li><a href="{{route('admin.servicios.index')}}">Listado</a></li>
                          <li><a href="{{route('admin.servicios.index')}}">Generar Portafolio</a></li>

                    </ul>
                </li>
              @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
