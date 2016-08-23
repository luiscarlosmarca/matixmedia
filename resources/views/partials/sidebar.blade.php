<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
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

                  <!-- /.Usuarios -->
                <li class="treeview">
                    <a href="#"><i class='fa fa-user'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.usuarios.index')}}">Listado de usuarios</a></li>
                        <li><a href="{{route('admin.usuarios.create')}}">Crear usuario</a></li>
                        <li><a href="{{route('admin.usuarios.pdf',Auth::user()->id)}}" target="_blank">Generar informe</a></li>

                    </ul>
                </li>
                    <!-- /.Projectos -->
                <li class="treeview">
                    <a href="#"><i class='fa fa-fire'></i> <span>Projectos</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.projectos.create')}}">Crear Projecto</a></li>
                        <li><a href="{{route('admin.projectos.index')}}">Listado de projectos</a></li>
                        <li><a href="{{route('admin.projectos.pdf')}}"target="_blank">Generar informes</a></li>

                    </ul>
                </li>

                  <!-- /.Seguimientos -->
              <li class="treeview">
                  <a href="#"><i class='fa fa-wrench'></i> <span>Seguimientos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="#">Link in level 2</a></li>
                      <li><a href="#">Link in level 2</a></li>
                  </ul>
              </li>


                  <!-- /.Brief -->
              <li class="treeview">
                  <a href="#"><i class='fa fa-list-alt'></i> <span>Brief</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="#">Link in level 2</a></li>
                      <li><a href="#">Link in level 2</a></li>
                  </ul>
              </li>


                  <!-- /.Pagos  | ingresos-->
              <li class="treeview">
                  <a href="#"><i class='fa fa-usd'></i> <span>Ingresos</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="#">Link in level 2</a></li>
                      <li><a href="#">Link in level 2</a></li>
                  </ul>
              </li>


                  <!-- /.Salidas gastos -->
              <li class="treeview">
                  <a href="#"><i class='fa fa-tasks'></i> <span>Salidas</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="#">Link in level 2</a></li>
                      <li><a href="#">Link in level 2</a></li>
                  </ul>
              </li>


              <!-- /.Proveedores -->
              <li class="treeview">
                  <a href="#"><i class='fa fa-cog'></i> <span>Proevedores</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="#">Link in level 2</a></li>
                      <li><a href="#">Link in level 2</a></li>
                  </ul>
              </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
