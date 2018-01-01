<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}} - Cáritas Tampico</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
    
</head>
<body>
    
      <!-- Navbar -->
      <nav class="navbar navbar-light bg-faded navbar-fixed-top navbar-findcond">
          <div class="container">
          <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" style="margin-top:0; margin-bottom: 5px;" data-toggle="collapse" data-target="#navbar" aria-expanded="false">          
        
        <span class="glyphicon glyphicon-align-justify"></span>
        <p class="navbar-text visible-xs-inline-block">Menú</p>
              </button>

          <div class="navbar-brand" href="#"><img src = "{{asset('images/logo.png')}}" class="img-responsive"></div>
          
          
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item welcome"> 
                <a class="nav-link" href="{{url('/')}}"><span class="glyphicon glyphicon-user"> </span> 
                {{Auth::user()->username}}</a></li>
                
                @if(Auth::user()->user_type == 1)
                <li class="nav item dropdown add_event">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-home"> </span> Eventos <span class="glyphicon glyphicon-option-vertical"></span></a>
                <ul class="dropdown-menu dropdown-menu-left">
                   

                  <li><a class="nav-link" href="{{url('events/create')}}"> <span class="glyphicon glyphicon-plus"> </span> Agregar evento</a></li>

                  <li><a class="nav-link" href="{{url('/events')}}"><span class="glyphicon glyphicon-edit"> </span> Catálogo</a></li>

                  <li class="nav-item"> <a class="nav-link" href="registros.php"><span class="glyphicon glyphicon-list-alt"> </span>  Reportes </a></li>
                  
                </ul>
              </li> 


                <li class="nav-item">
                <a class="nav-link" href="choferes.php"> <span class="glyphicon glyphicon-road"> </span> Choferes </a></li>

                <li class="nav-item">
                <a class="nav-link" href="preferencias.php"> <span class="glyphicon 
                glyphicon-wrench"> </span> Preferencias </a></li>
                @endif

                @if(Auth::user()->user_type == 2)
                <li class="nav-item"> <a class="nav-link" href="general.php"><span class="glyphicon glyphicon-pencil"></span> Registro de reparto </a> </li>

                
                <li class="nav-item"> <a class="nav-link" href="registros.php"><span class="glyphicon glyphicon-list-alt"> </span>  Reportes </a></li>
                @endif
                <li class="nav-item">                   
                <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"> </span> Salir   </a>  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
            </ul> </div>
      
          </div><!--/.nav-collapse -->
      </nav>
    
        @yield('content')

</body>
</html>
<script src="{{asset('js/jquery-3.1.1.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/scripts.js')}}"></script>
@yield('scripts')

