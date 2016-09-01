<!DOCTYPE html>
<html>
<title>Informe de Proyectos - App Matix Web </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-red.css">

<body>




<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>
  <div class="w3-center">
  <h5> App Matix Web 1.0</h5>
  <h1 class="w3-xxxlarge w3-animate-bottom">Informe Proyectos</h1>



  </div>
</header>

<!-- Modal -->
<hr>
@foreach ($projects as $project)
<div class="w3-half">
<div class="w3-card white">
  <div class="w3-container w3-indigo">
    <h3>Nombre:{{$project->name}}</h3>
     <small><i class="fa fa-clock-o"></i> Fecha de Incio: {{$project->dateStart}} | Fecha de entrega: {{$project->dateFinish}}</small>
  </div>
  <div class="w3-container">
  <h3 class="w3-text-indigo">Servicio:{{$project->service->name}}</h3>
  </div>
  <ul class="w3-ul w3-border-top">
    <li>
      <h3>Detalles</h3>
      <p>{!!$project->details!!}</p>
    </li>
    <li>
      <h3>Precio</h3>
      <p>{{$project->price}}</p>
      <p>{{$project->formPay}}</p>
    </li>
    <li>

    <li>
      <h3>Desarrollador</h3>
      <p>{{$project->developer->name}}</p>
    </li>
    <li>
      <h3>Agente</h3>
      <p>{{$project->agent->name}}</p>
    </li>
    <li>
      <h3>Nota</h3>
      <p>{!!$project->note!!}</p>
    </li>
  </ul>
  <div class="w3-container w3-indigo w3-large"><span class="w3-right">
  </span>Cliente:{{$project->costumer->name}} | {{$project->costumer->email}}</div>
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
