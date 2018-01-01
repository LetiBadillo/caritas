<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title> Cáritas Tampico</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
</head>
<body id="login_body"> 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <span> {{$error}} </span>
        <br>
        @endforeach
        </ul>
        </div>
    @endif
    <div class="container">
        <div class="login-container">
            <div id="output"></div>
                <div class="avatar" style="background: url(images/logo.png) center no-repeat;"> </div>
                <div class="form-box">
                    <form  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <input name="username" type="text" placeholder="Usuario" required="true">
                        <input name="password" type="password" placeholder="Clave de acceso" required="true">                             <button class="btn btn-block login" type="submit" name="sub" id="estilo_botones">Entrar</button>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>


