<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        $user = Auth::user();
        foreach($roles as $role) {
            if($user->role_id == $role)
                return $next($request);
        }

        return abort(404);
    }
}
