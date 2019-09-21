<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaquinaRequest;
use App\Extensions\Helpers;

use App\Maquina;
use App\Galeria;
use App\Esquema;
use App\Prestacion;
use App\Video;
use Redirect;

class MaquinaController extends Controller
{
    protected $model = 'Maquina';

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
        $esquema = Esquema::pluck('title_es', 'id')->all();
        $prestacion = Prestacion::orderBy('order')->pluck('title_es', 'id')->all();
        $video = Video::orderBy('order')->pluck('title_es', 'id')->all();
        $relacion = Maquina::orderBy('order')->pluck('title_es', 'id')->all();
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'esquema' => $esquema, 'prestacion' => $prestacion, 'video' => $video, 'relacion' => $relacion]);
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

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['ficha']))){
            $file_save = Helpers::saveImage($request->file('ficha'), strtolower($this->model).'_ficha');
            $file_save ? $data['ficha'] = $file_save : false;
        }

        $store = Maquina::create($data);

        $store->esquemas()->attach($request->get('esquema'));
        $store->prestaciones()->attach($request->get('prestacion'));
        $store->videos()->attach($request->get('video'));
        $store->relacionados()->attach($request->get('relacion'));

        $file = new Galeria();
        $file->order = 'AA'; //
        $file->maquina_id = $store->id; //
        if (!file_exists(public_path('img/'.strtolower($this->model).'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $file['image'] = $file_save : false;
        }
        $file->save();

        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
          $repeat = array_add($repeat, 'image', $file['image']);
        }else{
          $repeat = null;
        }

        $esquema = Esquema::orderBy('order')->pluck('title_es', 'id')->all();
        $prestacion = Prestacion::orderBy('order')->pluck('title_es', 'id')->all();
        $video = Video::orderBy('order')->pluck('title_es', 'id')->all();
        $relacion = Maquina::orderBy('order')->pluck('title_es', 'id')->all();

        return view('adm.'.strtolower($this->model).'.create', ['esquema' => $esquema, 'prestacion' => $prestacion, 'video' => $video, 'relacion' => $relacion, 'model' => $this->model, 'section' => $request->section, 'repeat' => $repeat, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Maquina::orderBy('order')->paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function show($id)
    {
      $data = Maquina::find($id);
      $son = Galeria::where('maquina_id', $data->id)->get();

      $store = $data->replicate();
      $store->save();

      foreach($son as $img){
        $img->maquina_id = $store->id;
        $fill = $img->replicate();
        $fill->save();
      }

      $store->esquemas()->attach(($data->esquemas));
      $store->prestaciones()->attach(($data->prestaciones));
      $store->videos()->attach(($data->videos));
      $store->relacionados()->attach(($data->relacionados));

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
        $data = Maquina::find($id);

        $esquema = Esquema::orderBy('order')->pluck('title_es', 'id')->all();
        $prestacion = Prestacion::orderBy('order')->pluck('title_es', 'id')->all();
        $video = Video::orderBy('order')->pluck('title_es', 'id')->all();
        $relacion = Maquina::orderBy('order')->pluck('title_es', 'id')->all();
        return view('adm.'.strtolower($this->model).'.edit', ['esquema' => $esquema, 'prestacion' => $prestacion, 'video' => $video, 'relacion' => $relacion, 'data' => $data, 'model' => $this->model]);
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
         $data = Maquina::find($id);
         $son = Galeria::where('maquina_id', $data->id)->get();

         $store = $data->replicate();
         $store->save();

         foreach($son as $img){
           $img->maquina_id = $store->id;
           $fill = $img->replicate();
           $fill->save();
         }

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['ficha']))){
            $file_save = Helpers::saveImage($request->file('ficha'), strtolower($this->model).'_ficha');
            $file_save ? $file['ficha'] = $file_save : false;
        }

        if (!file_exists(public_path('img/'.strtolower($this->model).'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;
        }

        $store = Maquina::find($id);
        $store->fill($data);
        $store->save();

        $store->esquemas()->sync($request->get('esquema'));
        $store->prestaciones()->sync($request->get('prestacion'));
        $store->videos()->sync($request->get('video'));
        $store->relacionados()->sync($request->get('relacion'));

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
        $data = Maquina::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }

    public function maqGaleria($id)
    {

    }
    public function maqEsquema($id)
    {

    }
    public function maqPrestacion($id)
    {

    }
    public function maqVideo($id)
    {

    }
    public function maqRelacion($id)
    {

    }
}
