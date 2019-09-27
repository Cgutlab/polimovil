<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Extensions\Helpers;
use App\Producto_familia;
use App\Producto;
use App\Producto_imagen;
use App\Color;
use App\Producto_color;
use App\Producto_plano;
use App\Presentation;
use Redirect;

class ProductoController extends Controller
{
    protected $model = 'Producto';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $master = Producto_familia::find($id);

        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'master' => $master]);
    }

    /**
     * Store a newly created <res></res>ource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('image');

            $file_save = Helpers::saveImage($request->file('icon'), 'gallery');
            $file_save ? $file['icon'] = $file_save : false;
            $file_save = Helpers::saveImage($request->file('document'), 'producto_ficha');
            $file_save ? $data['document'] = $file_save : false;

        $store = Producto::create($data);
        $file = new Producto_imagen();
        $file->order = 'AA'; //
        $file->product_id = $store->id; //
            $file_save = Helpers::saveImage($request->file('image'), 'gallery');
            $file_save ? $file['image'] = $file_save : false;
        $file->save();

        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
          $repeat = array_add($repeat, 'image', $file['image']);
        }else{
          $repeat = null;
        }

        $master = Producto_familia::find($store->family_id);/*
        $color = Color::pluck('title_es', 'id')->all();
        $size = Size::where('producto_id', $master->id)->orderBy('order')->pluck('title_es', 'id')->all();
        $gmge = Grammage::where('producto_id', $master->id)->orderBy('order')->pluck('title_es', 'id')->all();
        $pttn = Presentation::where('producto_id', $master->id)->orderBy('order')->pluck('title_es', 'id')->all();

*/        return view('adm.'.strtolower($this->model).'.create', ['master' => $master, 'model' => $this->model, 'section' => $request->section, 'repeat' => $repeat, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      dd('index.product');
      $data = Producto::orderBy('order')->paginate(20);
      return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function show($id)
    {
        $master = Producto_familia::find($id);
        $data = Producto::orderBy('order')->where('family_id', $id)->paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model, 'master' => $master]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Producto::find($id);
        $master = Producto_familia::orderBy('order')->where('id', '<>', 0)->get();

        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model, 'master' => $master]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function duplicate(Request $request, $id)
     {
         $data = Producto::find($id);
         $son1 = Producto_imagen::where('product_id', $data->id)->get();
         $son2 = Producto_color::where('product_id', $data->id)->get();
         $son3 = Producto_plano::where('product_id', $data->id)->get();
         $store = $data->replicate();
         $store->save();

         foreach($son1 as $img){
           $img->product_id = $store->id;
           $fill1 = $img->replicate();
           $fill1->save();
         }

         foreach($son2 as $color){
           $color->product_id = $store->id;
           $fill2 = $color->replicate();
           $fill2->save();
         }

         foreach($son3 as $plano){
           $plano->product_id = $store->id;
           $fill3 = $plano->replicate();
           $fill3->save();
         }

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('icon'), 'gallery');
            $file_save ? $file['icon'] = $file_save : false;
            $file_save = Helpers::saveImage($request->file('document'), 'producto_ficha');
            $file_save ? $data['document'] = $file_save : false;

        $store = Producto::find($id);
        $store->fill($data);
        $store->save();

        $success = $store->title_es . ' ¡Registro editado exitósamente!';
        return back()->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Producto::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
