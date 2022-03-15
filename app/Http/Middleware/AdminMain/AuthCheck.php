<?php

namespace App\Http\Middleware\AdminMain;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!Session::has('admin_email_session'))
        {
            return redirect('/');
        }
        return $next($request);
        return $next($request);
    }
}
