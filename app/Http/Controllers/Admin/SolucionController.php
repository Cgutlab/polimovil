<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SolucionRequest;
use App\Extensions\Helpers;
use App\Solucion;
use App\SolucionImg;
use Redirect;

class SolucionController extends Controller
{
    protected $model = 'Solucion';

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
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model]);
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

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['icon']))){
            $file_save = Helpers::saveImage($request->file('icon'), strtolower($this->model));
            $file_save ? $data['icon'] = $file_save : false;
        }

        $store = Solucion::create($data);

        $file = new SolucionImg();
        $file->order = 'AA'; //
        $file->solucion_id = $store->id; //
        if (!file_exists(public_path('img/'.$this->model.'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), 'solucion');
            $file_save ? $file['image'] = $file_save : false;
        }
        $file->save();

        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }

        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'repeat' => $repeat, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Solucion::orderBy('order')->paginate(20);
      return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function show($id)
    {
        $data = Solucion::find($id);
        $son = SolucionImg::where('solucion_id', $data->id)->get();

        $store = $data->replicate();
        $store->save();

        foreach($son as $img){
          $img->solucion_id = $store->id;
          $fill = $img->replicate();
          $fill->save();
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
        $data = Solucion::find($id);
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
         $data = Solucion::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['icon']))){
            $file_save = Helpers::saveImage($request->file('icon'), strtolower($this->model));
            $file_save ? $data['icon'] = $file_save : false;
        }

        $store = Solucion::find($id);
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
        $data = Solucion::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
