<!DOCTYPE html>
<html>
<title>Informe de Usuarios - App Matix Web </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-red.css">

<body>




<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>
  <div class="w3-center">
  <h5> App Matix Web 1.0</h5>
  <h1 class="w3-xxxlarge w3-animate-bottom">Informe de Usuarios</h1>



  </div>
</header>

<!-- Modal -->
<hr>
@foreach ($users as $user)
<div class="w3-half">
<div class="w3-card white">

    <h3>
      <center>
      <img src="./upload/users/{{$user->photo}}" height="120" width="120" align="right">
     <hr>{{$user->name}}
      </center>
     </h3>
    <center>
     <small><i class="fa fa-clock-o"></i> Cedula: {{$user->cedula}} | Rol: {{$user->role}}</small>
   </center>

  <div class="w3-container">
  <h3 class="w3-text-indigo">Datos personales</h3>

  <hr>

            <div class="w3-responsive w3-card-4">
            <table class="w3-table w3-striped w3-bordered">
            <thead>
                  <tr class="w3-theme">
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Redes</th>
                    <th>Ciudad</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{$user->address}} </td>
                    <td>{{$user->cellphone}} </td>
                    <td>{{$user->email}} </td>
                    <td>{{$user->profile->social}} </td>
                    <td>{{$user->profile->city}} </td>
                  </tr>

            </tbody>
            </table>
            </div>

  </div>

        <div class="w3-container">
        @if($user->customer())
        <h3 class="w3-text-indigo">Datos de la empresa</h3>


                    <div class="w3-responsive w3-card-4">
                    <table class="w3-table w3-striped w3-bordered">
                    <thead>
                          <tr class="w3-theme">
                            <th>Nombre</th>
                            <th>Teléfono </th>
                            <th>Dirección </th>
                            <th>Email</th>

                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td><center>{{$user->profile->name_company}} </td>
                            <td><center>{{$user->profile->phone_company}} </td>
                            <td><center>{{$user->profile->address_company}} </td>
                            <td><center>{{$user->profile->email_company}} </td>
                          </tr>

                    </tbody>
                    </table>
                    </div>
                    @if($user->profile->reference!="")
                    <small><i class="fa fa-clock-o"></i> Referencia: {{$user->profile->reference}}</small>
                    @endif
        @endif

        @if($user->agent()||$user->developer())
        <h3 class="w3-text-indigo">Datos laborales</h3>


                    <div class="w3-responsive w3-card-4">
                    <table class="w3-table w3-striped w3-bordered">
                    <thead>
                          <tr class="w3-theme">
                            <th>Posicion</th>
                            <th>Eficiencia </th>
                            <th>Salario </th>
                            <th>Edad</th>

                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td><center>{{$user->profile->position}} </td>
                            <td><center>{{$user->profile->efficiency}} </td>
                            <td><center>{{$user->profile->salary}} </td>
                            <td><center>{{$user->profile->age}} </td>
                          </tr>

                    </tbody>
                    </table>
                    </div>
        @endif



        </div>
      @if($user->note!="")
        <div class="w3-padding w3-white">
          <span onclick="this.parentElement.style.display='none'" class="w3-closebtn"><i class="fa fa-remove"></i></span>
          <h2>Nota</h2>
          <p>{!!$user->note!!}</p>
        </div>
      @endif
  </div>
  </div>
  <hr>
@endforeach
<hr>
<footer class="w3-container w3-blue-grey">
  <h5>Informe generado en:</h5>
  <p class="w3-opacity">appweb.matixmedia.com.co</p>
</footer>


</body>
</html>
