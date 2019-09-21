<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrf_token: '{{ csrf_token() }}' }</script>
    <title>Luber</title>

    <link rel='shortcut icon' href='{{asset('img/logo/'.$favicon->image)}}' type='image/png' />
    <link rel='icon' href='{{asset('img/logo/'.$favicon->image)}}' type='image/png' />

   <!-- Scripts -->
    <link rel='shortcut icon' href='{!!asset('img/logo/'.$favicon->image)!!}' type='image/png' />
    <link rel='icon' href='{!!asset('img/logo/'.$favicon->image)!!}' type='image/png' />
    
   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Ubuntu:400,500,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,800,900" rel="stylesheet">

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Icons FontAwesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
   <link rel="stylesheet" href="{{ asset('icons/fontawesome/css/all.css') }}">
   <link rel="stylesheet" href="{!!asset('css/materialize/materialize.css')!!}">
   <link rel="stylesheet" href="{!!asset('css/style.css')!!}">
</head>
<body>
<header class="fondo-nav">
  <div class="row mb-0">
    <div class="col l8 m5 s2" style="border-top: 30px solid #2B2727; border-right: 30px solid #CC2128;"></div>
    <div class="col l4 m7 s10 blanco" style="background: #CC2128; height: 30px; display: flex; align-items: center; padding-left:0;">
        <span style="width: 20px;">&nbsp;</span>
          <a target="_blank" href="{{'https://wa.me/'.$whatsapp1->route}}" class="blanco" style="height: 30px; display: flex; align-items: center;">
          <span class="fs16" style="display: flex; justify-content: center; align-items: center;"><img src="{{asset('img/help/whatsapp1.png')}}"></span>
            <span class="ml-3 fs13" style="height: 30px; display: flex; align-items: center;">{!!$whatsapp1->text!!}</span>
          </a>
        <span class="ml-7 flex" style="margin-right: 2px;"><img src="{{asset('img/help/lupa.png')}}"></span>
        <span>
          <form class="no-class" action="{{route('buscador.query')}}">
            <input type="text" name="search" placeholder="Buscar producto..." autocomplete="off" value="{{isset($search)?$search:''}}">
            <button type="submit" class="hide"></button>
          </form>
        </span>
    </div>
  </div>
  <div class="container mb-0" style="width: 87%;">
    <div class="nav-wrapper" style="height: 78px;">
      <a data-target="mobile-demo" class="sidenav-trigger hide-on-large-only right blanco" style="margin-top: 25px;"><i class="material-icons">menu</i></a>
      <a href="{{route('home')}}" class="brand-logo" style="float: left;">
        <img class="responsive-img hide-on-small-only" src="{{asset('img/logo/'.$headband->image)}}" style="margin-top: -10px;">
        <img class="responsive-img hide-on-med-and-up" src="{{asset('img/logo/'.$headband->image)}}" style="margin-top: 5px;">
      </a>
      <div class="hide-on-med-and-down">
        <ul class="right blanco" style="width: 55%;display: flex; justify-content: space-around; align-items: center; margin-top:20px;">
          <li class="navBoton {{(\Request::is('empresa'))?"navOn":""}}"><a class="blanco" href="{{route('empresa')}}">Empresa</a></li>
          <li class="navBoton {{(\Request::is('productos*'))?"navOn":""}}"><a class="blanco" href="{{route('productos.fam')}}">Productos</a></li>
          <li class="navBoton {{(\Request::is('distribuidor*'))?"navOn":""}}"><a class="blanco" href="{{route('distribuidores')}}">Distribuidores</a></li>
          <li class="navBoton {{(\Request::is('novedad*'))?"navOn":""}}"><a class="blanco" href="{{route('novedades')}}">Novedades</a></li>
          <li class="navBoton {{(\Request::is('contacto'))?"navOn":""}}"><a class="blanco" href="{{route('contacto')}}">Contacto</a></li>
          <li></li>
        </ul>
      </div>
    </div> 
  </div>
  <ul class="sidenav" id="mobile-demo">
    <li><a class="blanco"  style="{{(\Request::is('/')) ? "font-weight: bold;":""}}" href="{{route('home')}}">Inicio</a></li>
    <li><a class="blanco"  style="{{(\Request::is('empresa')) ? "font-weight: bold;":""}}" href="{{route('empresa')}}">Empresa</a></li>
    <li><a class="blanco"  style="{{(\Request::is('producto*')) ? "font-weight: bold;":""}}" href="{{route('productos.fam')}}">Productos</a></li>
    <li><a class="blanco"  style="{{(\Request::is('distribuidor*')) ? "font-weight: bold;":""}}" href="{{route('distribuidores')}}">Distribuidores</a></li>
    <li><a class="blanco"  style="{{(\Request::is('novedad*')) ? "font-weight: bold;":""}}" href="{{route('novedades')}}">Novedades</a></li>
    <li><a class="blanco"  style="{{(\Request::is('contacto')) ? "font-weight: bold;":""}}" href="{{route('contacto')}}">Contacto</a></li>
  </ul>
</header>
<main>
  {{-- @yield('content') --}}
</main>
<footer>
</footer>
</body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/materialize/materialize.js')}}"></script>
  <script>
$(document).ready(function(){
  $('.sidenav').sidenav();
  $('.slider').slider();
  $('.collapsible').collapsible();
  $('.materialboxed').materialbox();
  $('.carousel').carousel({
    duration: 100,
    numVisible: 3,
    fullWidth: true,
    height: 333,
  });
  setInterval(function() {
    $('.carousel').carousel('next');
  }, 4000);
});
  </script>

    <script>
    @if(isset($success))
      M.toast({html: '{!!$success!!}', classes: 'rounded'});
    @endif

    @if(session('success'))
      M.toast({html: '{!!session('success')!!}', classes: 'rounded'});
    @endif

    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
      M.toast({html: '{!!$error!!}', classes: 'rounded'});
    @endforeach
    @endif
    </script>
</html>


{{-- 
<footer class="fondo-foot">
  <div class="row" style="height: 30px; margin-bottom: 10px;">
    <div class="col l9 m8 s6" style="border-top: 30px solid #58585A; border-right: 30px solid #CC2128;"></div>
    <div class="col l3 m4 s6 blanco" style="background: #CC2128; height: 30px; display: flex; align-items: center; padding-left:0;">
        <span style="width: 20px;">&nbsp;</span>
          <span style="margin-top: 5px;"><img class="responsive-img" src="{{asset('img/help/whatsapp.png')}}"></span>
          <a target="_blank" href="{{'https://wa.me/'.$whatsapp2->route}}" class="blanco" style="height: 30px; display: flex; align-items: center;">
            <span class="ml-3 fs13" style="height: 30px; display: flex; align-items: center;">{!!$whatsapp2->text!!}</span>
          </a>

    </div>
  </div>
  <div class="container" style="width: 100%;">
    <div class="row mb-0" style="width: 100%;">
      <div class="col m3 center s12">
        <a href="{{route('home')}}"><img class="responsive-img" src="{{asset('img/logo/'.$footband->image)}}"></a>
        <div class="row center">
        @foreach($redes as $rs)
          <a href="{{$rs->route}}"><img class="responsive-img" src="{{asset('img/redsocial/'.$rs->image)}}"></a>
        @endforeach
        </div>
      </div>
      <div class="col m4 offset-s1 s11" style="margin-bottom: 15px;">
        <div class="col m12 s12">
          <a class="blanco fw6">SITEMAP</a>
        </div>
        <div class="col m6 s6">
          <a class="navFoot {{(\Request::is('empresa'))?"navFootOn":""}}" href="{{route('empresa')}}">Empresa</a><br>
          <a class="navFoot {{(\Request::is('producto*'))?"navFootOn":""}}" href="{{route('productos.fam')}}">Productos</a><br>
          <a class="navFoot {{(\Request::is('distribuidor*'))?"navFootOn":""}}" href="{{route('distribuidores')}}">Distribuidores</a><br>
        </div>
        <div class="col m6 s6">
          <a class="navFoot {{(\Request::is('novedad*'))?"navFootOn":""}}" href="{{route('novedades')}}">Novedades</a><br>
          <a class="navFoot {{(\Request::is('contacto*'))?"navFootOn":""}}" href="{{route('contacto')}}">Contacto</a><br>
        </div>
      </div>
      <div class="col m5 offset-s1 s11" style="margin-bottom: 15px;">
        <div class="col m12 s12">
          <a class="blanco fw6">CERRADURAS DE SEGURIDAD LUBER</a>
        </div>
        <div class="col s12 blanco">
          <div class="row mb-0">
            <div class="col s1">
              <i class="material-icons" style="float: left;">location_on</i>
            </div>
            <div class="col s11">
              <div class="editorRico"><a target="_blank" class="footNav" href="https://www.google.com.ar/maps/search/{!!$location->route!!}">{!!$location->text!!}</a></div>
            </div>
          </div>
          <div class="row mb-0">
            <div class="col s1">
              <i class="material-icons" style="float: left;">phone_in_talk</i>
            </div>
            <div class="col s11">
              <div class="editorRico"><a target="_blank" class="footNav" href="tel:{!!$phone->route!!}">{!!$phone->text!!}</a></div>
            </div>
          </div>
          <div class="row mb-0">
            <div class="col s1">
              <i class="material-icons" style="float: left;">mail_outline</i>
            </div>
            <div class="col s11">
              <div class="editorRico"><a target="_blank" class="footNav" href="mailto:{!!$email->route!!}">{!!$email->text!!}</a></div>
            </div>
          </div>
          <div class="row mb-0"><span class="right" style="color: #58585a; font-size: 4px;">Website:{{env('APP_DEVELOPED').'(freelance)'}}</span></div>
        </div>
      </div>
    </div>
  </div>   
  <div style="background-image: url(img/help/barra.jpg); background-repeat: repeat-x; height: 38px; margin-bottom: 0; padding-bottom: 0;"></div>
</footer>

--}}

