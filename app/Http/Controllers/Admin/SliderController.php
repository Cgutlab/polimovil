<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Extensions\Helpers;
use App\Slider;
use Redirect;

class SliderController extends Controller
{
    protected $model = 'Slider';

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
    public function create($section)
    {
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'section' => $section]);
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

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;
        }

        $store = Slider::create($data);
        $success = $store->title_es . ' ¡Registro creado exitósamente!';

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
    public function show($section)
    {
        $data = Slider::orderBy('order')->where('section', $section)->paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model, 'section' => $section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($section, $id)
    {
        $data = Slider::find($id);
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model, 'section' => $section]);
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
         $data = Slider::find($id);

         $store = $data->replicate();
         $store->save();

         $success = $store->title_es . ' ¡Registro duplicado exitósamente!';
         return back()->with('success', $success);
     }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;
        }

        $store = Slider::find($id);
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
        $data = Slider::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
