<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DescargaRequest;
use App\Extensions\Helpers;
use App\Descarga;
use Redirect;

class DescargaController extends Controller
{
    protected $model = 'Descarga';

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
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), 'descarga');
            $file_save ? $data['image'] = $file_save : false;

            $file_save = Helpers::saveImage($request->file('file'), 'descarga');
            $file_save ? $data['file'] = $file_save : false;

        $store = Descarga::create($data);
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
        $data = Descarga::paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model]);
    }

    public function notuseShow()
    {
        $data = Descarga::paginate(10);
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
        $data = Descarga::find($id);
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Request $request, $id)
     {
         $data = Descarga::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), 'descarga');
            $file_save ? $data['image'] = $file_save : false;

            $file_save = Helpers::saveImage($request->file('file'), 'descarga');
            $file_save ? $data['file'] = $file_save : false;

        $store = Descarga::find($id);
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
        $data = Descarga::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
