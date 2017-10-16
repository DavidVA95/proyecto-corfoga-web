<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;
use Session;
use Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(20);
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|regex:/^([1-7]-[0-9]{4}-[0-9]{4})$/|unique:users',
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneNumber' => 'required|regex:/^[0-9]{4}-[0-9]{4}$/',
        ]);
        if($validator->fails()) {
            return Redirect::to('admin/usuarios/create')->withErrors($validator)->withInput();
        }
        $state = 'Listo';
        $message = 'El usuario fue creado exitosamente.';
        $alert_class = 'alert-success';
        try {
            User::create($request->all());
        } catch(Exception $exception) {
            $state = 'Error';
            $message = 'No se pudo crear el usuario.';
            $alert_class = 'alert-danger';
        }
        Session::flash('state', $state);
        Session::flash('message', $message);
        Session::flash('alert_class', $alert_class);
        return Redirect::to('admin/usuarios/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
