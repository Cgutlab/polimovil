<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Extensions\Helpers;
use App\Producto_color;
use App\Producto;
use Redirect;

class ProductoColorController extends Controller
{
    protected $model = 'Producto_color';

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
        $master = Producto::find($id);
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
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), 'gallery');
            $file_save ? $data['image'] = $file_save : false;

        $store = Producto_color::create($data);
        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }

        $master = Producto::find($request->product_id);

        return view('adm.'.strtolower($this->model).'.create', ['master' => $master,'model' => $this->model, 'section' => $request->section, 'repeat' => $repeat, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Producto_color::orderBy('order')->paginate(20);
      return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function show($id)
    {
        $data = Producto_color::orderBy('order')->where('product_id', $id)->paginate(10);
        $master = Producto::find($id);
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
        $data = Producto_color::find($id);
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model]);
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
         $data = Producto_color::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), 'gallery');
            $file_save ? $data['image'] = $file_save : false;

        $store = Producto_color::find($id);
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
        $data = Producto_color::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
