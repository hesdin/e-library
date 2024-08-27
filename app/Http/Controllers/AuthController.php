<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Requests\AuthRequest;
use Auth;
use Session;

class AuthController extends BaseController
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request){
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->intended('dashboard');    
        }

        if (Auth::guard('siswa')->attempt($credentials)) {
            $user = Auth::guard('siswa')->user();
            return redirect()->intended('dashboard');    
        }

        return redirect()->to('login')
                ->withErrors(trans('auth'));
    }

    public function logout(Request $request){
        Session::flush();
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
            return redirect('login');
        }

        if (Auth::check()) {
            Auth::logout();
            return redirect('login');
        }
        
        return redirect('login');
    }
}
