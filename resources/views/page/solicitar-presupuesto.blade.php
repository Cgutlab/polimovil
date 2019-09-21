@extends('layouts.app')

@section('title')

	Solicitar Presupuesto

@endsection

@section('content')

<div class="w-100 linear-solicitar-propuesta"></div>

<div class="wrapper">

	<form action="solicitarPresupuesto" method="post" class="mt-5 form-presupuesto">
@csrf
		<section id="content-form-i" class="mt-5 mb-5">

			<div class="row justify-content-center">

				<div class="col-md-9">

					<img class="d-block mx-auto mb-5 img-fluid" src="{{asset('img/presupuesto/pp1.jpg')}}" alt="">

					<div class="row justify-content-center  mb-2">

						<div class="col-md-5 form-group">

							<input type="text" name="nombre" required placeholder="Nombre *" class="form-control">	

						</div>

						<div class="col-md-5 form-group">

							<input type="text" name="email" required placeholder="Email *" class="form-control">

						</div>

					</div>

					<div class="row justify-content-center mb-2">

						<div class="col-md-5 form-group">

							<input type="text" name="telefono " required placeholder="Teléfono" class="form-control">	

						</div>

						<div class="col-md-5 form-group">

							<input type="text" name="empresa" required placeholder="Empresa *" class="form-control">

						</div>

					</div>

					<div class="row justify-content-center mb-2">

						<div class="col-md-5 form-group">

							<input type="text" name="actividad" required="" placeholder="Actividad *" class="form-control">	

						</div>

						<div class="col-md-5 form-group">

							<input type="text" name="ciudad" required="" placeholder="Ciudad *" class="form-control">

						</div>

					</div>

					<div class="row justify-content-center">

						<div class="col-md-10 text-right">

							<span id="siguiente" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;Siguiente&nbsp;&nbsp;&nbsp;&nbsp;</span>

						</div>

					</div>

				</div>

			</div>

		</section>

		<section id="content-form-ii" class="mt-5 d-none">

			<div class="row justify-content-center">

				<div class="col-md-5 form-group">

					<img class="img-fluid d-block mx-auto mb-5" src="{{asset('img/presupuesto/pp2.jpg')}}" alt="">

					<textarea class="form-control" placeholder="Describa lo que necesita..." style="min-height: 100px; max-height: 100px;" name="mensaje" id="" cols="30" rows="10">@if(isset($solicitarEste)) {!!'Artículo '.$solicitarEste->id!!}, {!!$solicitarEste->title_es!!} @endif</textarea>

					<label for="" class="d-block text-center mt-4 mb-5" style="color: #808080b3;"><input class="mr-3" type="checkbox" name="aceptar">Acepto los términos y condiciones de privacidad</label>

				</div>

			</div>

			<div class="row justify-content-center mb-5">

				<div class="col-md-5">

					<div class="row justify-content-between">

						<div class="col-xs-6">

							<span id="anterior" class="btn pl-5 pr-5" style="background-color: white; border: 1px solid #007bff; color: #007bff;">Anterior</span>

						</div>

						<div class="col-xs-6 text-right">

							<button type="submit" class="btn btn-primary pl-5 pr-5">Enviar</button>

						</div>

					</div>

				</div>

			</div>

		</section>

	</form>

</div>

@endsection