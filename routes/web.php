<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('presupuesto/sende', ['uses' => 'Page\FrontendController@sendMailPresupuesto'])->name('presupuesto.sende');	
Route::post('contacto/sende', ['uses' => 'Page\FrontendController@sendMailContacto'])->name('contacto.sende');	

Route::group(['namespace' => 'Page'], function(){
	Route::get('/', ['uses' => 'FrontendController@home'])->name('home');
	Route::match(['get', 'post'] ,'buscador', ['uses' => 'FrontendController@index'])->name('buscador');
	Route::match(['get', 'post'] ,'maquina/buscador', ['uses' => 'FrontendController@index'])->name('buscador');

	Route::get('buscador/query', 'FrontendController@buscador')->name('buscador.query');

	Route::get('empresa', 'FrontendController@empresa')->name('empresa');
	Route::get('productos/familias', 'FrontendController@productos_fam')->name('productos.fam');
	Route::get('productos/categorias/{id}', 'FrontendController@productos_sub')->name('productos.cat');
	Route::get('productos/subfamilias/{id}', 'FrontendController@productos_sub')->name('productos.sub');
	Route::get('productos/detalle/{id}', 'FrontendController@productos_art')->name('productos.art');
	Route::get('distribuidores/map', 'FrontendController@distribuidoresmap')->name('distribuidores');
	Route::get('distribuidores/listado', 'FrontendController@distribuidoreslist')->name('distribuidores.list');
	Route::get('novedades/categorias', 'FrontendController@novedades')->name('novedades');
	Route::get('novedades/categoria/{id}', 'FrontendController@novedade')->name('novedades.cat');
	Route::get('novedades/detalle/{id}', 'FrontendController@novedad')->name('novedades.art');
	Route::get('contacto', 'FrontendController@contacto')->name('contacto');
	Route::get('uso-y-aplicaciones', 'FrontendController@usoYAplicaciones')->name('uso-y-aplicaciones');
	Route::get('uso-y-aplicaciones/{id}', 'FrontendController@ObtenerusoYAplicacion')->name('uso-y-aplicaciones-detalle');
	Route::get('descargas', 'FrontendController@descargas')->name('rdescargas');
	Route::get('solucitar-presupuesto', 'FrontendController@solicitarPresupuesto')->name('solicitar-presupuesto');
});

Auth::routes();

Route::prefix('adm')->group(function(){
	Route::group(['namespace' => 'Admin'], function(){
		Route::get('/', 'LoginController@login')->name('adm.auth.login');
		Route::post('login', 'LoginController@auth')->name('adm.auth.auth');
		Route::get('dashboard', 'AdminController@index')->name('adm.dashboard');
		Route::post('logout', 'LoginController@logout')->name('adm.auth.logout');

		Route::get('articulonovedad/create/{id}', ['uses' => 'ArticulonovedadController@create', 'as' => 'articulonovedad.create']);
		Route::resource('categorianovedad', 'CategoriaNovedadController');
		Route::resource('articulonovedad', 'ArticuloNovedadController')->except('create');
		Route::get('articulonovedad/duplicate/{id}', ['uses' => 'ArticulonovedadController@duplicate', 'as' => 'articulonovedad.duplicate']);
		

		Route::resource('uso_aplicacion', 'UsoappController');
		
		Route::resource('uso_imagen', 'UsoimagenController')->except('create');
		Route::get('uso_imagen/duplicate/{id}', ['uses' => 'UsoimagenController@duplicate', 'as' => 'uso_imagen.duplicate']);
		Route::get('uso_imagen/create/{id}', ['uses' => 'UsoimagenController@create', 'as' => 'uso_imagen.create']);
		

		Route::resource('distribuidor', 'DistribuidorController');

		Route::resource('item_producto_familia', 'ProductoFamiliaController');
		Route::get('item_producto_familia/duplicate/{id}', ['uses' => 'ProductoFamiliaController@duplicate', 'as' => 'item_producto_familia.duplicate']);

		Route::resource('item_producto', 'ProductoController');
		Route::get('item_producto/duplicate/{id}', ['uses' => 'ProductoController@duplicate', 'as' => 'item_producto.duplicate']);
		Route::get('item_producto/create/{id}', ['uses' => 'ProductoController@create', 'as' => 'item_producto.create']);

		Route::resource('item_producto_color', 'ProductoColorController')->except('create');
		Route::get('item_producto_color/duplicate/{id}', ['uses' => 'ProductoColorController@duplicate', 'as' => 'item_producto_color.duplicate']);
		Route::get('item_producto_color/create/{id}', ['uses' => 'ProductoColorController@create', 'as' => 'item_producto_color.create']);
		
		Route::resource('item_producto_plano', 'ProductoPlanoController')->except('create');
		Route::get('item_producto_plano/duplicate/{id}', ['uses' => 'ProductoPlanoController@duplicate', 'as' => 'item_producto_plano.duplicate']);
		Route::get('item_producto_plano/create/{id}', ['uses' => 'ProductoPlanoController@create', 'as' => 'item_producto_plano.create']);

		Route::resource('item_producto_imagen', 'ProductoImagenController')->except('create');
		Route::get('item_producto_imagen/duplicate/{id}', ['uses' => 'ProductoImagenController@duplicate', 'as' => 'item_producto_imagen.duplicate']);
		Route::get('item_producto_imagen/create/{id}', ['uses' => 'ProductoImagenController@create', 'as' => 'item_producto_imagen.create']);
		
		Route::resource('admin', 'AdminController');
		Route::resource('data', 'DataController');
		Route::resource('metadata', 'MetadataController');
		Route::resource('redsocial', 'RedSocialController');
		Route::resource('destacado', 'DestacadoController');
		Route::resource('empresaimg', 'EmpresaImgController');
		Route::resource('maquina_product', 'MaquinaController');
		Route::resource('maquina_esquema', 'EsquemaController');
		Route::resource('maquina_prestacion', 'PrestacionController');
		Route::resource('video', 'VideoController');
		Route::resource('casoexito', 'CasoexitoController');
		Route::resource('representada', 'RepresentadaController');
		Route::resource('servicio', 'ServicioController');
		Route::resource('solucion', 'SolucionController');
		Route::resource('descarga', 'DescargaController');
		Route::get('solucionimg/duplicate/{id}', ['uses' => 'SolucionImgController@duplicate', 'as' => 'solucionimg.duplicate']);
		Route::get('solucionimg/create/{id}', ['uses' => 'SolucionImgController@create', 'as' => 'solucionimg.create']);
		Route::resource('solucionimg', 'SolucionImgController')->except('create');
		Route::get('admin.all', ['uses' => 'AdminController@show', 'as' => 'admin.all']);

		Route::get('maq_galeria/duplicate/{id}', ['uses' => 'MaqGaleriaController@duplicate', 'as' => 'maq_galeria.duplicate']);
		Route::get('maq_galeria/create/{id}', ['uses' => 'MaqGaleriaController@create', 'as' => 'maq_galeria.create']);
		Route::resource('maq_galeria', 'MaqGaleriaController')->except('create');
		Route::get('maq_esquema/duplicate/{id}', ['uses' => 'MaqEsquemaController@duplicate', 'as' => 'maq_esquema.duplicate']);
		Route::get('maq_esquema/create/{id}', ['uses' => 'MaqEsquemaController@create', 'as' => 'maq_esquema.create']);
		Route::resource('maq_esquema', 'MaqEsquemaController')->except('create');
		Route::get('maq_prestacion/duplicate/{id}', ['uses' => 'MaqPrestacionController@duplicate', 'as' => 'maq_prestacion.duplicate']);
		Route::get('maq_prestacion/create/{id}', ['uses' => 'MaqPrestacionController@create', 'as' => 'maq_prestacion.create']);
		Route::resource('maq_prestacion', 'MaqPrestacionController')->except('create');
		Route::get('maq_video/duplicate/{id}', ['uses' => 'MaqVideoController@duplicate', 'as' => 'maq_video.duplicate']);
		Route::get('maq_video/create/{id}', ['uses' => 'MaqVideoController@create', 'as' => 'maq_video.create']);
		Route::resource('maq_video', 'MaqVideoController')->except('create');
		Route::get('maq_relacion/duplicate/{id}', ['uses' => 'MaqRelacionController@duplicate', 'as' => 'maq_relacion.duplicate']);
		Route::get('maq_relacion/create/{id}', ['uses' => 'MaqRelacionController@create', 'as' => 'maq_relacion.create']);
		Route::resource('maq_relacion', 'MaqRelacionController')->except('create');

		Route::group(['prefix' => 'logo', 'as' => 'logo'], function() {
			Route::get('create', ['uses' => 'LogoController@create', 'as' => '.create']);
			Route::get('index', ['uses' => 'LogoController@index', 'as' => '.index']);
			Route::match(['get', 'post'], 'store', ['uses' => 'LogoController@store', 'as' => '.store']);
			Route::get('edit/{id}', ['uses' => 'LogoController@edit', 'as' => '.edit']);
			Route::put('update/{id}', ['uses' => 'LogoController@update', 'as' => '.update']);
			Route::get('duplicate/{id}', ['uses' => 'LogoController@duplicate', 'as' => '.duplicate']);
			Route::delete('destroy/{id}', ['uses' => 'LogoController@destroy', 'as' => '.destroy']);
		});

		Route::group(['prefix' => 'slider', 'as' => 'slider'], function() {
			Route::get('{section}/create', ['uses' => 'SliderController@create', 'as' => '.create']);
			Route::get('{section}/show', ['uses' => 'SliderController@show', 'as' => '.show']);
			Route::post('store', ['uses' => 'SliderController@store', 'as' => '.store']);
			Route::get('{section}/edit/{id}', ['uses' => 'SliderController@edit', 'as' => '.edit']);
			Route::put('update/{id}', ['uses' => 'SliderController@update', 'as' => '.update']);
			Route::get('duplicate/{id}', ['uses' => 'SliderController@duplicate', 'as' => '.duplicate']);
			Route::delete('destroy/{id}', ['uses' => 'SliderController@destroy', 'as' => '.destroy']);
		});

		Route::group(['prefix' => 'icon', 'as' => 'icon'], function() {
			Route::get('{section}/create', ['uses' => 'IconController@create', 'as' => '.create']);
			Route::get('{section}/show', ['uses' => 'IconController@show', 'as' => '.show']);
			Route::post('store', ['uses' => 'IconController@store', 'as' => '.store']);
			Route::get('{section}/edit/{id}', ['uses' => 'IconController@edit', 'as' => '.edit']);
			Route::put('update/{id}', ['uses' => 'IconController@update', 'as' => '.update']);
			Route::get('duplicate/{id}', ['uses' => 'IconController@duplicate', 'as' => '.duplicate']);
			Route::delete('destroy/{id}', ['uses' => 'IconController@destroy', 'as' => '.destroy']);
		});

		Route::group(['prefix' => 'banner', 'as' => 'banner'], function() {
			Route::get('{section}/create', ['uses' => 'BannerController@create', 'as' => '.create']);
			Route::get('{section}/show', ['uses' => 'BannerController@show', 'as' => '.show']);
			Route::post('store', ['uses' => 'BannerController@store', 'as' => '.store']);
			Route::get('{section}/edit/{id}', ['uses' => 'BannerController@edit', 'as' => '.edit']);
			Route::put('update/{id}', ['uses' => 'BannerController@update', 'as' => '.update']);
			Route::get('duplicate/{id}', ['uses' => 'BannerController@duplicate', 'as' => '.duplicate']);
			Route::delete('destroy/{id}', ['uses' => 'BannerController@destroy', 'as' => '.destroy']);
		});

		Route::group(['prefix' => 'content', 'as' => 'content'], function() {
			Route::get('{section}/create', ['uses' => 'ContentController@create', 'as' => '.create']);
			Route::get('{section}/show', ['uses' => 'ContentController@show', 'as' => '.show']);
			Route::post('store', ['uses' => 'ContentController@store', 'as' => '.store']);
			Route::get('{section}/edit/{id}', ['uses' => 'ContentController@edit', 'as' => '.edit']);
			Route::put('update/{id}', ['uses' => 'ContentController@update', 'as' => '.update']);
			Route::get('duplicate/{id}', ['uses' => 'ContentController@duplicate', 'as' => '.duplicate']);
			Route::delete('destroy/{id}', ['uses' => 'ContentController@destroy', 'as' => '.destroy']);
		});
	});
});
