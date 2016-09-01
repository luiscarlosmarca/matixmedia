<!DOCTYPE html>
<html>
<title>Portafolio de servicios - App Matix Web </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-red.css">

<body>




<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-opennav"></i>
  <div class="w3-center">
  <h5> App Matix Web 1.0</h5>
  <h1 class="w3-xxxlarge w3-animate-bottom">Portafolio de servicios</h1>



  </div>
</header>
<hr>
@foreach ($services as $service)

<div class="w3-center">
  <h2>{{$service->name}}</h2>
  <p class="w3-large">${{$service->price}}</p>
</div>
<br>

<div class="w3-row w3-border">
  <div class="w3-half w3-container w3-black   w3-border">
    <h5>Detalles del servicio</h5>
    <p>{!!$service->details!!}</p>
  </div>
  @if($service->note!="")
  <div class="w3-half w3-container">
    <h5><strong>Nota:</strong> <br> {!!$service->note!!}</h5>
  </div>
</div>
  @endif
<br>
<hr>
@endforeach
<hr>

<footer class="w3-container w3-blue-grey">
  <h5>Informe generado en:</h5>
  <p class="w3-opacity">appweb.matixmedia.com.co</p>
</footer>


</body>
</html>
