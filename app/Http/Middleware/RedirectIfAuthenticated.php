<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // Jika tidak ada guard yang diberikan, gunakan default [null]
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Cek apakah guard aktif
            if (Auth::guard($guard)->check()) {
                // Tentukan redirect berdasarkan guard yang aktif
                switch ($guard) {
                    case 'siswa':
                        return redirect()->route('siswa.dashboard');
                    case 'web':
                        return redirect()->route('dashboard');
                    default:
                        // Anda bisa menambahkan lebih banyak kondisi untuk guard lainnya jika diperlukan
                        return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        // Jika tidak ada guard yang aktif, lanjutkan dengan request
        return $next($request);
    }

}
