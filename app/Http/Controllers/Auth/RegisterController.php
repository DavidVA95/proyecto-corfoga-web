<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Ruta a donde se redireccionan los usuarios después de registrarse.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Retorna el validador correspondiente al request a realizar.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => 'required|regex:/^[1-7]-[0-9]{4}-[0-9]{4}$/|unique:users',
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneNumber' => 'required|regex:/^[0-9]{4}-[0-9]{4}$/',
        ]);
    }

    /**
     * Crea un nuevo usuario después de haber realizado las validaciones necesarias.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber'],
            'rol' => $data['rol'],
        ]);
    }
}
