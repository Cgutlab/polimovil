<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactoRequest;
use App\Data;
use App\Logo;
use App\Slider;
use App\Uso;
use App\Descarga;
use App\Producto_familia;
use App\Producto;
use App\Producto_imagen;
use App\Producto_plano;
use App\Producto_color;
use App\Distribuidor;
use App\Content;
use App\Red;
use App\Novedad_categoria;
use App\Novedad_articulo;
use Mail;
use Illuminate\Support\Facades\Input;


class FrontendController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $sliders = Slider::where('section', 'home')->orderBy('order')->get();
        $products = Producto::where('outstanding', 'on')->orderBy('updated_at', 'desc')->take(4)->get();
        $contents = Content::where('section', 'home')->orderBy('order')->get();
        $familias = Producto_familia::orderBy('order')->where('id', '<>', 0)->where('family_id', 0)->get();
        return view('page.home', compact('sliders', 'products', 'contents', 'familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function empresa()
    {
        $content = Content::where('section', 'empresa')->first();
        $sliders = Slider::where('section', 'empresa')->orderBy('order')->get();
        return view('page.empresa', compact('content', 'sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productos_fam()
    {
        $familias = Producto_familia::orderBy('order')->where('id', '<>', 0)->where('family_id', 0)->get();
        return view('page.familias', compact('familias'));
    }

    public function productos_sub($id)
    {
        
        $active = Producto_familia::find($id);
        $familias = Producto_familia::orderBy('order')->where('family_id', $active->id)->get();
        $keypad = Producto_familia::orderBy('order')->where('id', '<>', 0)->get();
        $productos = Producto::orderBy('order')->where('family_id', $id)->get();
        return view('page.subfamilias', compact('familias', 'productos', 'active', 'keypad'));
    }
    public function productos_art($id)
    {
        $keypad = Producto_familia::orderBy('order')->where('id', '<>', 0)->get();

        $active = Producto::find($id);
        return view('page.producto', compact('keypad', 'active'));
    }
    public function usoYAplicaciones(){
        $usos = Uso::orderBy('order')->get();
        return view('page.uso-y-aplicaciones', compact('usos'));
    }
    public function ObtenerusoYAplicacion($id){
        $keypad = Producto_familia::orderBy('order')->where('id', '<>', 0)->get();
        $active = Producto_familia::find($id);
        $uso = Uso::find($id);
        return view('page.uso-y-aplicacion-detalle', compact('uso', 'keypad', 'active'));
    }

    public function solicitarPresupuesto(){
        return view('page.solicitar-presupuesto');
    }   

    public function descargas(){
        $descarga = Descarga::first();
        return view('page.descargas', compact('descarga'));
    }

    public function distribuidoresmap()
    {
        $mapas  = Distribuidor::orderBy('order')->get();
        return view('page.distribuidormap', compact('mapas'));
    }

    public function distribuidoreslist()
    {
        $mapas  = Distribuidor::orderBy('order')->get();
        return view('page.distribuidorlist', compact('mapas'));
    }

    public function novedades()
    {
        $novedades = Novedad_categoria::orderBy('order')->get();
        $article = Novedad_articulo::all();
        return view('page.novedades', compact('novedades', 'article'));
    }

    public function novedade($id)
    {
        $novedades = Novedad_categoria::orderBy('order')->get();
        $active = Novedad_categoria::find($id);
        $article = Novedad_articulo::where('novedad_id', $id)->get();
        return view('page.novedades', compact('novedades', 'article', 'active'));
    }

    public function novedad($id)
    {
        $novedades = Novedad_categoria::orderBy('order')->get();
        $active = Novedad_articulo::find($id);
        return view('page.novedad', compact('novedades', 'active'));
    }

    public function contacto()
    {
        return view('page.contacto');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscador()
    {
        $search = Input::get('search');
        $searchValues = explode(' ', $search);
        $productos = Producto::where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('title_es', 'like', "%{$value}%")
              ->orWhere('code', 'like', "%{$value}%")
              ->orWhere('text_es', 'like', "%{$value}%");
          }
        })->paginate(8);

        return view('page.buscador', compact('productos', 'search'));
    }

    public function presupuesto($id = null)
    {
        if(isset($id)){
          $product = Producto::find($id);
        }
        return view('page.presupuesto', compact('product'));
    }

    public function sendContacto(ContactoRequest $request)
    {
        $data = array(['nombre'     => $request->get('nombre'),
                    'email'         => $request->get('email'),
                    'telefono'      => $request->get('telefono'),
                    'empresa'       => $request->get('empresa'),
                    'mensaje'       => $request->get('mensaje')]);
        Mail::send('page.solicitud', $data[0], function($send){
            $dato = Data::where('type', 'email')->first();
                $send->subject('Te han enviado un mensaje desde la web');
                $send->to($dato->route);
            }
        );

        return redirect()->back()->with('alert', '¡Gracias por contactarnos!');
    }
}