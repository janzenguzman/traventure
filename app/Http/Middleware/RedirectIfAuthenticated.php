<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('Admin.HomePage');
              }
              break;
            case 'travelers':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('Traveler.HomePage');
              }
              break;
            case 'agents':
            if (Auth::guard($guard)->check()) {
              return redirect()->route('Agent.HomePage');
            }
          }
          return $next($request);
        }  
}
