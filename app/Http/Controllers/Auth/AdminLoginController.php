<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    // ######## the trait of Auth Users ########
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin,admin/dashboard')->except('logout');
    }

    // ######## override the following functions from the AuthenticatesUsers trait ########

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    protected function guard()
    {
        /* ======= in this function it goes to the guard guest
                   to check if the moderator login or not ======= */
        return Auth::guard("admin");
    }
}
