<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Redirect;
use App\User;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user) {
        if ($user->role == 'a') {
            return Redirect::to('admin/inicio');
        }
    }

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function remoteLogin(Request $request) {
        $credentials = $request->only(['email', 'password']);
        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'Los credenciales son incorrectos'], 401);
            }
            else {
                $user = DB::table('users')
                    ->where('email', $request['email'])
                    ->first();
                if($user->role == 'i'){
                    return response()->json(compact('token'))->setStatusCode(200);
                }
                else {
                    return response()->json(['error' => 'El tipo de usuario no es un Inspector'], 403);
                }
            }
        }
        catch(JWTException $ex) {
            return response()->json(['error' => 'Algo no va bien con el servidor'], $ex->getStatusCode());
        }
    }
}
