<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogoRequest;
use App\Extensions\Helpers;
use App\Logo;
use Redirect;

class LogoController extends Controller
{
    protected $model = 'Logo';

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
    public function store(LogoRequest $request)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;

        $store = Logo::create($data);
        $success = $store->type . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }

        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'section' => $request->section, 'repeat' => $repeat, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Logo::paginate(10);
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
        $data = Logo::find($id);
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
         $data = Logo::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->type . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(LogoRequest $request, $id)
    {
        $data = $request->all();

            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model), $id);
            $file_save ? $data['image'] = $file_save : false;

        $store = Logo::find($id);
        $store->fill($data);
        $store->save();
        $success = $store->type . ' ¡Registro editado exitósamente!';
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
        $data = Logo::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
