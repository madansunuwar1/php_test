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
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles = [
            'admin' => [1, Role::IS_ADMIN],
            'bcio' => [Role::IS_BCIO],
            'bcpn' => [Role::IS_BCPN],
            'hasAccess' => [1, Role::IS_ADMIN, Role::IS_BCIO, Role::IS_BCPN]
        ];

        $roleIDs = $roles[$role] ?? [];

        if (!auth()->user()->hasAnyRole($roleIDs)) {
            abort(403);
        }

        return $next($request);
    }
}
