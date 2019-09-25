@extends('layouts.app')
@section('title', 'contacto')
@section('content')
<section class="row">
	<div class="col-md-12">
		{!! $map->text !!}
	</div>
</section>
<div class="container page-contacto">
	<section class="row pt-5">
		<div class="col-md-12 mx-auto">
			<div class="row justify-content-center">
				<div class="col-md-4 mb-2">
					<img src="http://www.crisys.com.ar/img/contacto/icon1.jpg" alt="" class="d-block mx-auto">
					<div class="text-center pt-3 d-block mx-auto" style="max-width: 280px; margin: auto;">
						{!! $location->text !!}
					</div>
				</div>
				<div class="col-md-4 mb-2">
					<img src="http://www.crisys.com.ar/img/contacto/icon2.jpg" alt="" class="d-block mx-auto">
					<div class="text-center pt-3 d-block mx-auto">
						<a href="tel:{{$telefono1->route}}" class="ap0">{!! $telefono1->text !!}</a>
						<a href="tel:{{$telefono2->route}}" class="ap0">{!! $telefono2->text !!}</a>
						<a href="https://wa.me/{{$whatsapp1->route}}">{!! $whatsapp1->text !!}</a>
					</div>
				</div>
				<div class="col-md-4 mb-2">
					<img src="http://www.crisys.com.ar/img/contacto/icon3.jpg" alt="" class="d-block mx-auto">
					<div class="text-center pt-3 d-block mx-auto">
						<a href="mailto:{{$email->route}}">
							{!! $email->text !!}
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="row pt-5 pb-5">
		<form method="post" action="{{route('contacto.send')}}" class="col-md-7 mx-auto form-contacto">
			@csrf
			<div class="row mb-3 justify-content-center">
				<div class="col-md-5 form-group">
					<input type="text" name="nombre" placeholder="Nombre *" required="required" class="form-control"></div>
					<div class="col-md-5 form-group">
						<input type="email" name="email" placeholder="Email *" required="required" class="form-control">
					</div>
				</div>
				<div class="row mb-3 justify-content-center">
					<div class="col-md-5 form-group">
						<input type="text" name="telefono" placeholder="Teléfono" class="form-control">
					</div>
					<div class="col-md-5 form-group">
						<input type="text" name="empresa" placeholder="Empresa" class="form-control">
					</div>
				</div>
				<div class="row mb-3 justify-content-center">
					<div class="col-md-10 form-group">
						<textarea name="mensaje" placeholder="Mensaje" class="w-100 form-control" style="min-height: 100px; max-height: 100px;"></textarea>
						<label for="" class="d-block mx-auto mt-4 text-center">
							<input type="checkbox"> Acepto los términos y condiciones de privacidad
						</label>
						<div class="text-center mt-3">
							<button type="submit" class="btn btn-primary pl-5 pr-5">Enviar</button>
						</div>
					</div>
				</div>
			</form>
		</section>
	</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

