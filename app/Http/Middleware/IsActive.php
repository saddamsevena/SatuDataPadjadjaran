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
        if(auth()->user()->is_active == 1){
            return $next($request);
        }
        else {
            Alert::error('Error!', 'Akun anda belum diverifikasi! SIlahkan hubungi admin!');
        }
        return redirect()->to(route('katalog.home'))->with('error',"Akun anda belum terverifikasi");
    }
}