<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->exists('admin')){
            return redirect()->route('admin.home');
        }
        else if($request->session()->exists('staff')){
            return redirect()->route('staff.index');
        }
        else if($request->session()->exists('doctor')){
            return redirect()->route('doctor.home');
        }
        return $next($request);
    }
}
