<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Extensions\Helpers;
use App\UsoImagen;
use App\Uso;
use Redirect;

class UsoImagenController extends Controller
{
    protected $model = 'Uso_imagen';

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
        $master = Uso::find($id);
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

            $file_save = Helpers::saveImage($request->file('image'), 'uso');
            $file_save ? $data['image'] = $file_save : false;

        $store = UsoImagen::create($data);
        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }

        $master = Uso::find($request->uso_id);

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
      $data = UsoImagen::orderBy('orden')->paginate(20);
      return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function show($id)
    {
        $data = UsoImagen::orderBy('orden')->where('uso_id', $id)->paginate(10);
        $master = Uso::find($id);
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
        $data = UsoImagen::find($id);
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
         $data = UsoImagen::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), 'uso');
            $file_save ? $data['image'] = $file_save : false;

        $store = UsoImagen::find($id);
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
        $data = UsoImagen::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
