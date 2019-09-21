<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Producto_familiaRequest;
use App\Extensions\Helpers;
use App\Producto_familia;
use Redirect;

class ProductoFamiliaController extends Controller
{
    protected $model = 'Producto_familia';

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
        $familias = Producto_familia::orderBy('order')->where('family_id', '0')->get();
        $subfam = Producto_familia::orderBy('order')->where('family_id', '<>', '0')->get();
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'familias' => $familias, 'subfam' => $subfam]);
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

            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;

        $store = Producto_familia::create($data);
        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }

        $familias = Producto_familia::orderBy('order')->where('family_id', '0')->get();
        $subfam = Producto_familia::orderBy('order')->where('family_id', '<>', '0')->get();
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'section' => $request->section, 'repeat' => $repeat, 'success' => $success, 'familias' => $familias, 'subfam' => $subfam]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data = Producto_familia::orderBy('order')->where('family_id', '0')->paginate(10);
          $subf = Producto_familia::orderBy('order')->where('family_id', '<>', '0')->paginate(10);
          return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model, 'subf' => $subf]);
    }

    public function show($id)
    {
        $data = Producto_familia::orderBy('order')->where('section', $section)->paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Producto_familia::find($id);
        $familias = Producto_familia::orderBy('order')->where('family_id', '0')->get();
        $subfam = Producto_familia::orderBy('order')->where('family_id', '<>', '0')->get();
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model, 'familias' => $familias, 'subfam' => $subfam]);
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
         $data = Producto_familia::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;

        $store = Producto_familia::find($id);
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
        $data = Producto_familia::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
