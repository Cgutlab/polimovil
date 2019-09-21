<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Uso;
use App\UsoImagen;
use App\Producto;
use App\Extensions\Helpers;

class UsoappController extends Controller
{
    protected $model = 'Uso_Aplicacion';

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
    public function create()
    {
    	$productos = Producto::orderBy('order')->pluck('title_es', 'id')->all();
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'productos' => $productos]);
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
        $store = Uso::create($data);
        $store->product()->attach($request->get('uso_id'));
        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        $file = new UsoImagen();
        $file->orden = 'AA'; //
        $file->uso_id = $store->id; //
            $file_save = Helpers::saveImage($request->file('image'), 'uso');
            $file_save ? $file['image'] = $file_save : false;
        $file->save();

        $productos = Producto::orderBy('order')->pluck('title_es', 'id')->all();

        if($request->repeatcheck){
          $add = ['uso_id' => $request->uso_id];
          $inputs = array_merge($data, $add);
          $repeat = $inputs;
        }else{
          $repeat = null;
        }

        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'section' => $request->section, 'repeat' => $repeat, 'success' => $success, 'productos' => $productos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Uso::orderBy('order')->paginate(20);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function show($id)
    {
        $data = Uso::find($id);
        $son = UsoImagen::where('uso_id', $data->id)->get();

        $store = $data->replicate();
        $store->save();

        foreach($son as $img){
            $img->uso_id = $store->id;
            $fill = $img->replicate();
            $fill->save();
            $store->product()->attach($data->uso_id);
        }

        $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
        return back()->with('success', $success);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Producto::orderBy('order')->pluck('title_es', 'id')->all();
        $data = Uso::find($id);
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model, 'productos' => $productos]);
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
        $data = Uso::find($id);

        $store = $data->replicate();
        $store->save();

        $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), 'uso');
            $file_save ? $data['image'] = $file_save : false;
        }

        $store = Uso::find($id);
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
        $data = Uso::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
