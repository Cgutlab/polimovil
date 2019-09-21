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
    font-family: 'Lato';
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
    font-family: 'Lato';
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

.tabla_mapa thead{
	font-family: 'Asap';
    font-size: 22px;
    color: #FF5E89;
}

.celda_nombre{
	    font-size: 16px;
    color: #7F0045;
    font-family: 'Lato';
    font-weight: bold;
}

.celda_resto{
	    font-size: 16px;
    color: #595959;
    font-family: 'Lato';
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
</style>

        <!-- CUERPO -->
        <?php $cont_mapa = 0; ?>
        @foreach($mapas as $mapa)
			<input id="p1_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->altitude }}">
			<input id="p2_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->length }}">
			<input id="p2_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->length }}">
			<input id="direccion_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->direction }}">
			<input id="telefono_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->phone }}">
			<input id="social_{{ $cont_mapa }}" name="" type="hidden" value="{{ $mapa->local }}">
			<?php $cont_mapa++; ?>
        @endforeach
				<input type="hidden" id="cantidad" name="" value="{{ $cont_mapa }}">
                    <link href="{{ asset('css/pages/donde.css') }}" rel="stylesheet">
                        <main>
                            <div class="container-distribuidor">
                                {!!Form::open(['route'=>'distribuidores', 'method'=>'GET'])!!}
                                <div class="row">
                                	<div class="col s12 l4"><h5>Encontrá tu distribuidor más cercano</h5></div>
                                    <div class="input-field col s5 l3 offset-l1">
                                        <input autocomplete="off" background="white" class="direccion_mapa" id="direccion" name="direccion" placeholder="Ingresa una ubicación" style="background-color: white" type="text"/>
                                        <label class="titulos_input_direccion" for="direccion" style="width: 100%;">
                                            Provincia, localidad, barrio o dirección
                                        </label>
                                    </div>
                                    <div class="input-field col s5 l3 offset-s1">
                                        <input autocomplete="off" background="white" class="radio_mapa" id="radio" name="radio" placeholder="Radio en km" style="background-color: white" type="number"/>
                                        <label class="titulos_input_radio right" for="radio" style="width: 100%;">
                                            Radio de búsqueda
                                        </label>
                                    </div>
                                    <input type="submit" name="" class="hide">
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </main>
                    </link>
<div id="map">
    
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

    var map;

	jQuery(function($) {

	    var script = document.createElement('script');
	    script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyAZUlidy4Exa3bvZLRh4qgqx4lwlLy6khw&libraries=geometry,places";
	    document.body.appendChild(script);
	    //document.getElementById('map').appendChild(script);
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
			  	var ubicacion1, ubicacion2, ubicacion3, ubicacion4;
			  	var distancia;
			  	ubicacion2 = new google.maps.LatLng(position.lat, position.lng);
			  	map.setCenter(position);

			  	for(var i = 0; i < cantidad; i++) {
			  		p1 = $("#p1_"+i).val();
			  		p2 = $("#p2_"+i).val();
		  			info = {
						direccion: $("#direccion_"+i).val(),
						telefono: $("#telefono_"+i).val(),
						social: $("#social_"+i).val()
					};
			  		ubicacion1 = new google.maps.LatLng(p1, p2);
	 				distancia = google.maps.geometry.spherical.computeDistanceBetween(ubicacion1, ubicacion2);
	 				if(distancia/1000 < kilometros){
			    		addMarker(p1, p2, info);
	 				}
			  	}

	 		}else{
	 			map = new google.maps.Map(document.getElementById("map"),mapOptions);
			  
			  	var cantidad = $("#cantidad").val();
			  
			  	for(var i = 0; i < cantidad; i++) {
			    	addMarker(
			    		$("#p1_"+i).val(),
			    		$("#p2_"+i).val(),
			    		{
							direccion: $("#direccion_"+i).val(),
							telefono: $("#telefono_"+i).val(),
							social: $("#social_"+i).val()
			    		}
			    	);
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

	 function addMarker(c1, c2, info){
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<strong>'+info.social+'</strong>'+
            '<div id="bodyContent">'+
            '<p>'+info.direccion+'</p>'+
            '<p>'+info.telefono+'</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

	    var marker = new google.maps.Marker({
	        position: new google.maps.LatLng(c1, c2),
	        title: info.social,
	        map: map,
	    });
        marker.addListener('click', function() {
			infowindow.open(map, marker);
        });
	}
</script>
<script type="text/javascript">
    $('.logo').click(() => {
            window.location.href = "/parpen";
        });
</script>
@endsection
