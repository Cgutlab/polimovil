@extends('layouts.app')

@section('title')

Distribuidores

@endsection

@section('content')

<style type="text/css">
#map{
    height: 650px;
    width: 100%;
}

.container-distribuidor{
    background-color: #CC2128;
    color: white;
    height: 7rem;
    width: 100%;
    position: absolute;
    background-color: #CC2128;
    z-index: 3;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 15px 5px 15px;
}

.no-margin{
    margin: 0;
}

.boton{
    height: 36px;
    width: auto;
    font-size: 13px;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #5A462E;
    border: 1px solid #5A462E;
    display: inline-block;
    line-height: 36px;
    padding: 0 40px;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 15px;
    background-color: #fff;
    float: right;
}

.boton:hover{
    background-color: #5A462E;
    color: #FDF9EB;
    transition: 0.3s;
}

.container-distribuidor i {
    float: right;
    line-height: 34px;
    margin-top: 45px;
    color: #604B33;
    border: 1px solid #604B33;
    border-right: none;
    padding: 0 10px;
}

.titulos_input_direccion{

    font-size: 18px!important;
    
    color: white!important;
        left: 19px!important;
}

.titulos_input_radio{
    font-size: 18px!important;
    
    color: white!important;
    left: 74px!important;
}

.direccion_mapa{
    background: white;
    height: 31px!important;
    width: 317px!important;
    position: relative;
    top: 11px;
    left: 8px;
}

.radio_mapa{
    background: white;
    height: 31px!important;
    width: 317px!important;
    position: relative;
    top: 11px;
        right: -63px;
}

.boton_mapa{
    height: 42px!important;
    width: 133px;
    top: 5px;
    right: 221px;
    background-color: #CC2128;
    top: 23px;
    right: -138px;
    font-size: 18px;
}

.boton_mapa:hover{
    height: 42px!important;
    width: 133px;
    top: 5px;
    right: 221px;
    background-color: #CC2128;
    top: 23px;
    right: -138px;
    font-size: 18px;
}

.ver_mapa a img{
        position: relative;
    left: 89%;
}

.ver_listado a img{
        position: relative;
    left: 41%;
}

.fs17{
    font-size: 17px;
}
.celda_nombre{
        font-size: 16px;
    color: #7F0045;
    font-weight: bold;
}

.celda_resto{
        font-size: 16px;
    color: #595959;
    font-weight: bold;
}



@media only screen and (max-width: 1050px){
  .container-distribuidor {
    width: 100%!important;
    height: 25%;
    min-width: 0;
    position: absolute;
    background-color: #CC2128;
    z-index: 3;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 15px 5px 15px;


}

.direccion_mapa {
    width: 100%!important;
}

.radio_mapa {
    width: 100%!important;
        right: 5%;
}

.boton_mapa {

    top: 0%;
    right: 8%;
        margin-top: 14%;

}

.ver_mapa a img {
    left: 65%;
}

.ver_listado a img {
    position: relative;
    left: 26%;
}

}

@media only screen and (max-width: 770px){
  .container-distribuidor {
    width: 100%!important;
    height: 25%;
    min-width: 0;
    position: absolute;
    background-color: #CC2128;
    z-index: 3;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 15px 5px 15px;


}

@media only screen and (max-width: 700px){
  .container-distribuidor {
    width: 100%!important;
    height: 75%
    min-width: 0;
    position: absolute;
    background-color: #CC2128;
    z-index: 3;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 15px 5px 15px;


}

@media only screen and (max-width: 450px){
  .container-distribuidor {
    width: 100%!important;
    height: 75%;
    min-width: 0;
    position: absolute;
    background-color: #CC2128;
    z-index: 3;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px 15px 5px 15px;


}

}
.gris{
    color: #595959;
}
</style>

<!DOCTYPE doctype html>
<html lang="es">
    <body>
        <!-- CUERPO -->
        <?php $cont_mapa = 0; ?>
        @foreach($mapas as $mapa)
        <input id="p1_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->lat }}">
            <input id="p2_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->lng }}">
                <?php $cont_mapa++; ?>
                @endforeach
                <input type="hidden" id="cantidad" name="" value="{{ $cont_mapa }}">
                    <link href="{{ asset('css/pages/donde.css') }}" rel="stylesheet">
                        <main>
                            <div class="container-distribuidor">
                                {!!Form::open(['route'=>'distribuidores.list', 'method'=>'GET'])!!}
                                <div class="row container" style="width: 87%;">
                                    <div class="col s12 l4"><h5>Lista de distribuidores</h5></div>
                                    {{-- <div class="input-field col s5 l3 offset-l1">
                                        <input autocomplete="off" background="white" class="direccion_mapa" id="direccion" name="direccion" placeholder="Ingresa una ubicación" style="background-color: white" type="text"/>
                                        <label class="titulos_input_direccion" for="direccion" style="width: 100%;">
                                            Provincia, localidad, barrio o dirección
                                        </label>
                                    </div> --}}
                                    {{-- <div class="input-field col s5 l3 offset-s1">
                                        <input autocomplete="off" background="white" class="radio_mapa" id="radio" name="radio" placeholder="Radio en km" style="background-color: white" type="number"/>
                                        <label class="titulos_input_radio right" for="radio" style="width: 100%;">
                                            Radio de búsqueda
                                        </label>
                                    </div> --}}
                                    <input type="submit" name="" class="hide">
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </main>
                    </link>
                    <div class="container" style="width: 87%">
                    <div class="row">
            <div class="col s12">
                <table class="highlight bordered tabla_mapa mt-35" style="margin-top: 15%;
     margin-bottom: 3%; width: 100%;">
                    <thead style="background-color: #CC2128;" class="fs17 blanco">
                        {{--
                        <td class="center">
                            Local
                        </td>
                        --}}
                        <td class="center">
                            Dirección
                        </td>
                        <td class="center">
                            Local
                        </td>
                        <td class="center">
                            Telefono
                        </td>
                    </thead>
                    <tbody>
                        @foreach($mapas as $mapa)
                        <tr>
                            {{-- 
                            <td class="celda_nombre center">
                                {!!$mapa->name!!} {!!$mapa->apellido!!}
                            </td>
                             --}}
                            <td class="fs16 gris center" style="color: #595959;">
                                {!!$mapa->direction!!}
                            </td>
                            <td class="fs16 gris center" style="color: #595959;">
								{!!$mapa->local!!}
                            </td>
                            <td class="fs16 gris center" style="color: #595959;">
								{!!$mapa->phone!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
<style>
    .marcadorMap{
        position: fixed;
        z-index: 99999999999999999999;
        color: white;
        top: 35%;
        right: 0%;
    }
    .marcadorMap>a{
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        background-color: #2B2727;
        padding: 5px 10px;
    }
    .marcadorMap>a:hover{
        color: white;
        background-color: #CC2128;
    }
</style>

<div class="marcadorMap">
    <a style="{{\Request::is('distribuidores/ma*')?"background-color: #CC2128":""}}"  href="{{route('distribuidores')}}"><i class="material-icons">location_on</i><span>Mapa</span></a>
    <div style="height: 10px;"></div>
    <a style="{{\Request::is('distribuidores/list*')?"background-color: #CC2128":""}}"  href="{{route('distribuidores.list')}}"><i class="material-icons">menu</i><span>Lista</span></a>
</div>
    </body>
</html>

<script type="text/javascript">
    var map;

	jQuery(function($) {

	    var script = document.createElement('script');
	    script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyAZUlidy4Exa3bvZLRh4qgqx4lwlLy6khw&libraries=geometry,places";
	    document.body.appendChild(script);
	});

		
	function initialize() 
	{ 
	    var mapOptions = {
	    	center: new google.maps.LatLng('-34.5582798', '-58.4838633'),
	    	zoom: 12,
	    	scrollwheel: true,
	    	disableDefaultUI: false,
	    	mapTypeId: google.maps.MapTypeId.ROADMAP
	 	};

	 	var codificador = new google.maps.Geocoder();


	 	var direccion = '<?php if(isset($_GET['direccion'])){echo $_GET['direccion'];}else{echo '';} ?>';
	 	var kilometros = '<?php if(isset($_GET['radio'])){echo $_GET['radio'];}else{echo '';} ?>';

	 	if(kilometros == ''){
	 		kilometros = 1000000;
	 	}

	 	var position;

	 	codificador.geocode({ 'address': direccion }, function(results, status){

	 		if (status == 'OK') {

		 		position = {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()
		 		};

			  	map = new google.maps.Map(document.getElementById("map"),mapOptions);
			  
			  	var cantidad = $("#cantidad").val();
			  	var p1, p2;
			  	var ubicacion1, ubicacion2;
			  	var distancia;
			  	ubicacion2 = new google.maps.LatLng(position.lat, position.lng);
			  	map.setCenter(position);

			  	for(var i = 0; i < cantidad; i++) {
			  		p1 = $("#p1_"+i).val();
			  		p2 = $("#p2_"+i).val();

			  		ubicacion1 = new google.maps.LatLng(p1, p2);
	 				distancia = google.maps.geometry.spherical.computeDistanceBetween(ubicacion1, ubicacion2);
	 				if(distancia/1000 < kilometros){
			    		addMarker(p1, p2);
	 				}
			  	}

	 		}else{
	 			map = new google.maps.Map(document.getElementById("map"),mapOptions);
			  
			  	var cantidad = $("#cantidad").val();
			  
			  	for(var i = 0; i < cantidad; i++) {
			    	addMarker($("#p1_"+i).val(), $("#p2_"+i).val());
			  	}
	 		}
	 	});

	  	googleAutocompleteInstance = new google.maps.places.Autocomplete($('#direccion')[0], {
			types: ['geocode'],
			componentRestrictions: {
			country: 'AR'
			}
		});
	 }

	 function addMarker(c1, c2){
	     marker = new google.maps.Marker({
	        position: new google.maps.LatLng(c1, c2),
	        map: map,
	    });
	}
</script>
<script type="text/javascript">
    $('.logo').click(() => {
            window.location.href = "/parpen";
        });
</script>
@endsection
