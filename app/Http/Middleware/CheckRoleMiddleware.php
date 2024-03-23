<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles = [
            'admin' => [Role::IS_ADMIN],
            'bcio' => [Role::IS_BCIO],
            'bcpn' => [Role::IS_BCPN],
        ];

        $roleIDs = $roles[$role]??[];

        if(!auth()->check() || !is_array(auth()->user()->role_id, $roleIDs)){
            abort(403);
        }

        return $next($request);
    }
}
