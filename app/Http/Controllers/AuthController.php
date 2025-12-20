<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends BaseController
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request){
        $credentials = $request->getCredentials();

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();
            return redirect()->intended('dashboard');
        }

        if (Auth::guard('siswa')->attempt($credentials)) {
            $user = Auth::guard('siswa')->user();
            return redirect()->route('siswa.dashboard');
        }

        return redirect()->route('login')
                ->withErrors(trans('auth'));
    }

    public function logout(Request $request){
        // dd(auth()->guard('siswa')->check());

        Session::flush();

        if (Auth::guard('siswa')) {
            Auth::guard('siswa')->logout();
            return redirect()->route('login');
        }

        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->route('login');
        }


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
