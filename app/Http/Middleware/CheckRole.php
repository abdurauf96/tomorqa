<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if(Auth::user()->hasRole('admin')){
            return $next($request);
        };

        abort(403, 'This action is unauthorized.');
    }
}
