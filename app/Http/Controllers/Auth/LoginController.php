<?php

namespace Tradesys\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Tradesys\Http\Controllers\Controller;
use Tradesys\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/member/deposits';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
     * esta funcion redirecciona al admin or al cliente dependiendo del rol
     */
    public function redirectPath()
    {
        if (Auth::user()->hasRole('admin')) {
            return '/admin';
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/member/deposits';
    }

}
