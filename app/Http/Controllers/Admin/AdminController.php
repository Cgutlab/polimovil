<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Admin;
use Redirect;

class AdminController extends Controller
{
    protected $model = 'Admin';
    protected $type  = ['admin' => 'Administrador', 'user' => 'Usuario'];
    protected $status= ['on' => 'Habilitado', 'off' => 'Deshabilitado'];

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adm.dashboard');
    }

    public function manual()
    {
      return view('adm.layouts.manual');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.'.strtolower($this->model).'.create', ['type' => $this->type, 'model' => $this->model, 'status' => $this->status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $data = new Admin();
        $data->username    = $request->username;
        $data->name        = $request->name;
        $data->type        = $request->type;
        $data->status      = $request->status;
        if($request->password){
          $data->password= \Hash::make($request->password);
        }
        $data->save();
        $success = 'Registro creado exitósamente!';

        if($request->repeatcheck){
          $repeat = $data;
        }else{
          $repeat = null;
        }
        return view('adm.'.strtolower($this->model).'.create', ['type' => $this->type, 'model' => $this->model, 'repeat' => $repeat, 'status' => $this->status, 'success' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Admin::paginate(10);
        return view('adm.'.strtolower($this->model).'.show', ['data' => $data, 'model' => $this->model, 'status' => $this->status]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Admin::find($id);
        return view('adm.'.strtolower($this->model).'.edit', ['data' => $data, 'model' => $this->model, 'status' => $this->status, 'type' => $this->type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $data = Admin::find($id);
        $data->username    = $request->username;
        $data->name        = $request->name;
        $data->type        = $request->type;
        $data->status      = $request->status;
        if($request->password){
          $data->password= \Hash::make($request->password);
        }
        $data->save();
        $success = 'Registro editado exitósamente';
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
        $data = Admin::find($id);
        $data->delete();

        $success = 'Registro eliminado exitósamente';
        return back()->with('success', $success);
    }
}
