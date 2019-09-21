@extends('layouts.app')

@section('title')

Contacto

@endsection

@section('content')

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.0422722015414!2d-58.66364778519246!3d-34.67888256898518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc0c73f6470f7%3A0x15a9dcbc29fe0e8b!2sCerraduras+Luber!5e0!3m2!1ses-419!2sar!4v1565147001501!5m2!1ses-419!2sar" width="100%" height="524px" frameborder="0" style="border:0" allowfullscreen></iframe>
<div style="background-color: #CC2128; margin-top: -5px; padding-top: 50px;">
<div class="container" style="width: 87%;">
<div class="row mb-0 center-align blanco fs18 fw5">
	Para mayor información, por favor comuníquese con nosotros: 
</div>
<div class="row mb-0 mt-35" style="background-color: #CC2128">
	<div class="col l4 s12 center-align">
		<div><i class="material-icons fs34 blanco">location_on</i></div>
		<div><a class="hoverLetras editorRico" href="https://www.google.com.ar/maps/search/{!!$location->route!!}">{!!$location->text!!}</a></div>
	</div>
	<div class="col l4 s12 center-align">
		<div><i class="material-icons fs34 blanco">mail_outline</i></div>
		<div><a class="hoverLetras editorRico" href="mailto:{!!$email->route!!}">{!!$email->text!!}</a></div>
	</div>
	<div class="col l4 s12 center-align">
		<div><i class="material-icons fs34 blanco">phone</i></div>
		<div><a class="hoverLetras editorRico" href="tel:{!!$phone->route!!}">{!!$phone->text!!}</a></div>
	</div>
</div>
<div id="noFormat" class=" row mb-0 mt-35"> 
	<form action="{{route('contacto.send')}}" method="post">
	{{ csrf_field() }}
	<div class="row">
		<div id="noFormat" class="file-field input-field col l3 offset-l3 s12" style="margin-top:0;margin-bottom:0;">
			<div class="blanco fw5">Nombre:</div>
			<input type="text" name="nombre" >
		</div>
		<div id="noFormat" class="file-field input-field col l3 s12" style="margin-top:0;margin-bottom:0;">
			<div class="blanco fw5">Email:</div>
			<input type="text" name="email" >
		</div>
		<div id="noFormat" class="file-field input-field col l3 offset-l3 s12" style="margin-top:0;margin-bottom:0;">
			<div class="blanco fw5">Teléfono:</div>
			<input type="text" name="telefono" >
		</div>
		<div id="noFormat" class="file-field input-field col l3 s12" style="margin-top:0;margin-bottom:0;">
			<div class="blanco fw5">Empresa:</div>
			<input type="text" name="empresa" >
		</div>
		<div id="noFormat" class="file-field input-field col l6 offset-l3 s12" style="margin-top:0;margin-bottom:0;">
			<div class="blanco fw5">Mensaje:</div>
			<textarea rows="50" cols="50" name="mensaje" style="min-height: 105px;min-width: 100%; background-color: white;"></textarea>
		</div>
		<div class="col l4 offset-l3 s12 mt-35">
			<div class="g-recaptcha" data-sitekey="6Le5SJ8UAAAAAIsPUfRC7puDqHQMVGNSNuVaS-6O"></div>
		</div>
		<div id="noFormat" class="file-field input-field col l2 s12">
		    <p>
		      <label>
		        <input type="checkbox" class="filled-in" checked="checked" />
		        <span class="blanco fw5">Acepto los términos y condiciones de privacidad</span>
		      </label>
		    </p>
		</div>
		<div class="col s12 center-align">
			<input class="boton" type="submit" value="Enviar" style="border:0;">
		</div>
	</div>
	</form>
</div>
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

