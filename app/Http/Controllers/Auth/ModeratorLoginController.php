<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorLoginController extends Controller
{
    // ######## the trait of Auth Users ########
    use AuthenticatesUsers;

    protected $redirectTo = 'moderator/dashboard';

    public function __construct()
    {
        $this->middleware('guest:moderator,moderator/dashboard')->except('logout');
    }

    // ######## override the following functions from the AuthenticatesUsers trait ########

    public function showLoginForm()
    {
        return view('auth.moderator.login');
    }

    protected function guard()
    {
        /* ======= in this function it goes to the guard guest
                   to check if the moderator login or not ======= */
        return Auth::guard('moderator');
    }
}
