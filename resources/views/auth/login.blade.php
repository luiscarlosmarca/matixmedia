<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Matixtiando 1.0</title>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/login.css">

    
    
    <style> 
            @import url(http://fonts.googleapis.com/css?family=Montserrat:400,700|Handlee);
            body {
                background: url(/images/bg.jpg) no-repeat center top;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
            }
            
    </style>
  </head>

  <body>

    <div class="login">
  <header class="header">
    <span class="text">LOGIN</span>
    <span class="loader"></span>

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              Por favor corrige los siguientes errores:<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

  </header>
  <form class="form-horizontal" role="form" method="POST" action="{{route('login') }}">

   <input type="text" name="email" class="input" placeholder="Digite su email">
    <input type="password" name="password" class="input" placeholder="ingrese la contraseeña">
    
    <button class="btn" type="submit"></button>
  </form>

</div>


<button class ="resetbtn" type= "reset">Reset it
</button>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
