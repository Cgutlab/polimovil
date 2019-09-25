@extends('layouts.app')

@section('title', 'Solicitar Presupuesto')
@section('content')
<div class="header">
	<div class=" d-flex align-items-end container" style="min-height: 80px">
		<h1 class="mb-0 font-weight-bold">Solicitud de Presupuesto</h1>
	</div>	
</div>
<div class="w-100 linear-solicitar-propuesta"></div>

<div class="wrapper">

<form action="solicitarPresupuesto" method="post" class="form-presupuesto pt-5 pb-5">

@csrf
			<section id="content-form-i" class="mt-5 mb-5">

				<div class="row justify-content-center">

					<div class="col-sm-12 col-md-10">

						<img class="d-block mx-auto mb-5 img-fluid" src="{{asset('img/presupuesto/pp1.png')}}" alt="">

						<div class="row justify-content-center  mb-2">

							<div class="col-md-5 form-group">

								<input type="text" name="nombre" required="" placeholder="Nombre" class="form-control">

							</div>

							<div class="col-md-5 form-group">

								<input type="text" name="localidad" required="" placeholder="localidad" class="form-control">

							</div>

						</div>

						<div class="row justify-content-center mb-2">

							<div class="col-md-5 form-group">

								<input type="email" name="email" required="" placeholder="E-Mail" class="form-control">

							</div>

							<div class="col-md-5 form-group">

								<input type="text" name="telefono" required="" placeholder="Teléfono" class="form-control">

							</div>

						</div>

						<div class="row justify-content-center">

							<div class="col-md-10 text-right">

								<span id="siguiente" class="btn btn-primary pl-3 pr-3">SIGUIENTE</span>

							</div>

						</div>

					</div>

				</div>

			</section>

			<section id="content-form-ii" class="mt-5 d-none">

				<div class="row justify-content-center">

					<div class="col-sm-12 col-md-10 form-group">

						<img class="img-fluid d-block mx-auto mb-5" src="{{asset('img/presupuesto/pp1.png')}}" alt="">

					</div>

					<div class="col-md-5">

						<textarea class="form-control w-100 mb-3" placeholder="Mensaje" style="min-height: 100px; max-height: 100px;" name="" id="" cols="30" rows="10"></textarea>

					</div>

					<div class="col-md-5">

						<div class="row justify-content-between">

							<div class="col-sm-12 form-group mb-3 position-relative">

								<input type="text" placeholder="Archivo" class="form-control">
								<span class="position-absolute" style="color: #0006; right: 20px; top: 0px;font-size: 1.3rem; letter-spacing: 3px;">...</span>
							</div>

							<div class="col-sm-12 mb-5 mt-5">
								<div class="g-recaptcha" data-sitekey="6Ldco1gUAAAAAKKt7QO7vSn4tkahcQuMBXAHTeRj"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ldco1gUAAAAAKKt7QO7vSn4tkahcQuMBXAHTeRj&amp;co=aHR0cDovL3d3dy5ndWlmZXIuY29tLmFyOjgw&amp;hl=es&amp;v=v1566858990656&amp;size=normal&amp;cb=somcuyp80mww" role="presentation" name="a-z9hex7sll11l" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" width="304" height="78" frameborder="0"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>
                        <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/v1566858990656/recaptcha__es.js"></script><script src="https://www.google.com/recaptcha/api.js?hl=es"></script>
							</div>
							<div class="col-sm-12 col-md-5 mb-sm-3">

								<span id="anterior" class="btn btn-outline-primary pl-5 pr-5 w-100 mb-3" style="">Anterior</span>

							</div>

							<div class="col-sm-12 col-md-5 mb-sm-3">

								<button type="submit" class="btn btn-primary pl-5 pr-5 w-100 mb-3">Enviar</button>

							</div>
								
						</div>

					</div>

				</div>

			</section>

		</form>

</div>

@endsection