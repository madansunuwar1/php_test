<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::where('id', '<>', 1)->get();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create', [
            'title' => __('Roles add'),
            'permissions' => Permission::get(['id', 'name']),
        ]);
    }

    public function store(CreateRoleRequest $request)
    {
        $role = Role::create($request->validated());
        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('role.index');
    }

    public function edit(Role $role)
    {
        return view('role.edit', [
            'title' => 'Edit Role',
            'role' => $role,
            'permissions' => $this->getPermissionsByRoleId($role),
        ]);
    }

    public function update(CreateRoleRequest $request, Role $role)
    {
        $role->update(array_merge($request->validated(), [
            'name' => str($request->name)->lower()->slug('_'),
        ]));

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions(null);
        }

        return to_route('role.index')->with(['success' => __('messages.roles.update')]);
    }

    public function getPermissionsByRoleId(Role $role)
    {
        $rolePermission = $role->permissions()->get()
            ->pluck('id')
            ->toArray();

        $permissions = Permission::orderBy('id')->get(['id', 'name']);

        return $permissions->map(function ($item, $key) use ($rolePermission) {
            return in_array($item->id, $rolePermission)
                ? Arr::add($item, 'checked', true)
                : Arr::add($item, 'checked', false);
        });
    }

}
