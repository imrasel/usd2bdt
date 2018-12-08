<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user())
        {
            Session::flash('info', 'You do not have permission');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
