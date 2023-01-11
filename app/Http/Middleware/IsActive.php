<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        Alert::warning('Warning', 'Akun kamu belum terverifikasi, silahkan hubungi admin!');
        if(auth()->user()->is_active == 1){
            return $next($request);
        }

        return redirect()->to(route('katalog.home'))->with('error',"Akun anda belum terverifikasi");
    }
}