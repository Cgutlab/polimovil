<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PresentationRequest;
use App\Extensions\Helpers;
use App\Category;
use App\Presentation;
use Redirect;

class PresentationController extends Controller
{
    protected $model = 'Presentation';

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
    public function create($master)
    {
        $find = Category::find($master);
        $section = $find->title_es;
        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'master' => $master, 'section' => $section, 'find' => $find]);
    }

    /**
     * Store a newly created <res></res>ource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $master = $request->category_id;
        $find = Category::find($master);
        $section = $find->title_es;
        $data = $request->all();

        if (!file_exists(public_path('img/'.$this->model.'/'. $request['image']))){
            $file_save = Helpers::saveImage($request->file('image'), strtolower($this->model));
            $file_save ? $data['image'] = $file_save : false;
        }

        $store = Presentation::create($data);
        $success = $store->title_es . ' ¡Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }

        return view('adm.'.strtolower($this->model).'.create', ['model' => $this->model, 'master' => $master, 'find' => $find, 'repeat' => $repeat, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($master)
    {
        $find = Category::select('title_es')->find($master);
        $section = $find->title_es;
        $data = Presentation::orderBy('order')->where('category_id', $master)->paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model, 'section' => $section, 'master' => $master]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($master, $id)
    {
        $find = Category::find($master);
        $array = Category::all()->sortBy('title_es', SORT_NATURAL | SORT_FLAG_CASE)->pluck('title_es', 'id');
        $section = $find->title_es;
        $data = Presentation::find($id);
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model, 'section' => $section, 'master' => $master, 'find' => $find, 'array' => $array]);
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
         $data = Presentation::find($id);

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

        $store = Presentation::find($id);
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
        $data = Presentation::find($id);
        $data->delete();

        $success = $data->title_es . ' ¡Registro eliminado exitósamente!';
        return back()->with('success', $success);
    }
}
