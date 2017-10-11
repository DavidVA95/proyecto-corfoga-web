<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Redirect;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user) {
        if ($user->rol == 'a') {
            return Redirect::to('admin/inicio');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
