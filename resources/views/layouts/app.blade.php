<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>window.Laravel = { csrf_token: '{{ csrf_token() }}' }</script>
	<title>@yield('title')</title>
	<link rel='shortcut icon' href="{{asset('img/logo/'.$favicon->image)}}" type='image/png' />
	<link rel='icon' href="{{asset('img/logo/'.$favicon->image)}}" type='image/png' />
	<!-- Scripts -->
	<link rel='shortcut icon' href="{!!asset('img/logo/'.$favicon->image)!!}" type='image/png' />
	<link rel='icon' href="{!!asset('img/logo/'.$favicon->image)!!}" type='image/png' />
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	<!-- Icons FontAwesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('icons/fontawesome/css/all.css') }}">
	<link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap-grid.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/animated.css')}}">
	<link rel="stylesheet" href="{{asset('css/rstyles.css')}}">
</head>
<body>
	<div class="pre-nav azul-principal" style="border-bottom: 1px solid #4dadd7;">
		<div class="container d-flex  justify-content-between align-items-center">
			<div class="">			
				<a href="https://wa.me/{{$whatsapp2->route}}" class="color-white font-weight-bold">
					<img src="{{asset('img/help/whatsapp1.png')}}" style="background-color: #00618a;" class="p-2"> 011 2188 1903
				</a>
			</div>
			<div class="d-flex align-items-center">
				<form action="{{route('buscador.query')}}" method="get" style="max-width: 220px;">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<img src="{{asset('img/help/iconBuscador.png')}}" alt="">
							</span>
						</div>
						<input type="text" class="form-control" placeholder="Estoy buscando..." aria-label="Username" name="search" aria-describedby="basic-addon1">
					</div>
				</form>
				<a href="{{route('solicitar-presupuesto')}}" class="ml-2 color-white p-2 pl-4 pr-4" style="background-color: #00618a; font-weight: 600;">SOLICITAR PRESUPUESTO</a>
			</div>
		</div>
	</div>
	<div class="content-nav azul-principal color-white">
		<nav class="navbar navbar-expand-lg navbar-light justify-content-between container">
			<a class="navbar-brand" href="{{route('home')}}"><img class="responsive-img hide-on-small-only" src="{{asset('img/logo/'.$headband->image)}}" style=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav mr-0 ml-auto">
					<li class="nav-item active">
						<a class="nav-link color-white @if(\Request::is('empresa')) ractive @endif" style="font-weight: 500;" href="{{route('empresa')}}">EMPRESA</a>
					</li>
					<li class="nav-item">
						<a class="nav-link color-white @if(\Request::is('productos/*')) ractive @endif" style="font-weight: 500;" href="{{route('productos.fam')}}">PRODUCTOS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link color-white @if(\Request::is('uso-y-aplicaciones/*') || \Request::is('uso-y-aplicaciones')) ractive @endif" style="font-weight: 500;" href="{{route('uso-y-aplicaciones')}}">USOS Y APLICACIONES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link color-white @if(\Request::is('novedades/*')) ractive @endif" style="font-weight: 500;" href="{{route('novedades')}}">NOVEDADES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link color-white @if(\Request::is('descargas')) ractive @endif" style="font-weight: 500;" href="{{route('rdescargas')}}">DESCARGAS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link color-white @if(\Request::is('contacto')) ractive @endif" style="font-weight: 500;" href="{{route('contacto')}}">CONTACTO</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	@yield('content')
	<footer class="pt-5 pb-2" style="background-color: #333333;">
		<div class="container" style="border-bottom: 1px solid #6a6a6a;">
			<div class="row justify-content-between row-footer mb-3">
				<div class="col-sm-12 col-lg-3 mt-4">
					<a href="{{route('home')}}" class="d-block mx-auto">
						<img src='{{asset("img/logo/$footband->image")}}' class="img-fluid imgLogoFooter " alt="">
					</a>
				</div>
				<div class="col-sm-12 col-lg-4">
					<h6 class="color-white">SECCIONES</h6>
					<ul class="d-flex justify-content-between">
						<li>
							<ul>
								<li><a href="{{route('home')}}">Inicio</a></li>
								<li><a href="{{route('empresa')}}">Empresa</a></li>
								<li><a href="{{route('productos.fam')}}">productos</a></li>
								<li><a href="{{route('uso-y-aplicaciones')}}">Usos y Aplicaciones</a></li>								
							</ul>
						</li>
						<li>
							<ul>
								<li><a href="{{route('novedades')}}">Novedades</a></li>
								<li><a href="{{route('rdescargas')}}">Descargas</a></li>
								<li><a href="{{route('solicitar-presupuesto')}}">Solicitar Presupuesto</a></li>
								<li><a href="{{route('contacto')}}">Contacto</a></li>
							</ul>
						</li>

					</ul>
				</div>
				<div class="col-sm-12 col-lg-2">
					<h6 class="color-white">ESCRIBENOS A</h6>
					<div class="row">
						<div class="col pr-0 d-flex align-items-center">
							<img src="{{asset('img/help/whatsappFooter.png')}}" class="img-fluid" alt="">
							<div class="ml-3">
								<span class="d-block" style="color: #bbbbbb; font-weight: 500;">Whats App</span>
								<a href="https://wa.me/{{$whatsapp2->route}}" class="color-white font-weight-bold" style="font-size: 1.1rem;">{!! $whatsapp2->text !!}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-lg-3 footerColumnDatos">
					<div class="row">
						<div class="col-sm-12">
							<h6 class="color-white">POLIMOVIL RUEDAS</h6>
						</div>
						<div class="col-sm-12 mt-2 ">
							<div class="row">
								<div class="col-sm-1">
									<img src="{{asset('img/help/addressFooter.png')}}" class="" alt="">
								</div>
								<address class="col-sm-10" style="margin-bottom:0; padding-bottom:0;">
									<a href="" target="_blank" style="color: #d1d1d1 !important; display: block;">
										{!! $location->text !!}
									</a>
								</address>
							</div>
						</div>
						<div class="col-sm-12 mt-2">
							<div class="row">
								<div class="col-sm-1">
									<img src="{{asset('img/help/phoneFooter.png')}}" class="" alt="">
								</div>
								<div class="col-sm-10">
									<a href="tel:{{$telefono1->route}}" target="_blank" style="color: #d1d1d1!important;">{!! $telefono1->text !!}</a>
									<a href="tel:{{$telefono2->route}}" target="_blank" style="color: #d1d1d1!important;">{!! $telefono2->text !!}</a>
									<a href="tel:{{$whatsapp1->route}}" target="_blank" style="color: #d1d1d1!important;">{!! $whatsapp1->text !!}</a>

								</div>
							</div>
						</div>
						<div class="col-sm-12 mt-2">
							<div class="row">
								<div class="col-sm-1">
									<img src="{{asset('img/help/mailFooter.png')}}" class="" alt="">
								</div>
								<div class="col-sm-10">
									<a href="mailto:{{$email->route}}" class="color-gray">{!! $email->text !!}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container pt-2 text-right">
			<a href="" class="" style="font-weight: bold; font-size: 12px;">BY OSOLE</a>
		</div>
	</footer>
	<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap/popper.js')}}"></script>
	<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
	<script src="{{asset('js/mostrarSeccionesForm.js')}}"></script>
	<script>
		function initMenu() {
		   $('#menu ul').hide();
		   $('#menu ul').children('.current').parent().show();
		   $('#menu li a').click(
		      function() {
		         var checkElement = $(this).next();
		         if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
		            return false;
		         }
		         if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
		            $('#menu ul:visible').slideUp('normal');
		            checkElement.slideDown('normal');
		            return false;
		         }
		      }
		   );
		}
		$(document).ready(function() {
		   initMenu();
		});
		$('.principal').click(function(){
			$('.nav-stacked li a').removeClass('rCollapseActive')
			$('.nav-stacked li a').find('i').addClass('fa-angle-right').removeClass('fa-angle-down')
			$(this).addClass('rCollapseActive')
			$(this).find('i').removeClass('fa-angle-right').addClass('fa-angle-down')
		})
	</script>
	<a class="position-fixed whatsappFlotante rounded-circle d-flex shadow justify-content-center align-items-center text-white" target="_blank" href="https://wa.me/{{$whatsapp2->route}}" style="">
		<i class="fab fa-whatsapp"></i>
	</a>
	
</body>
</html>


