<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Collection;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }
    public function create()
    {
        return view('role.create',[
            'title' => __('Roles add'),
            'permissions' => Permission::select('id', 'name')->get(),
        ]);
    }
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name,'guard_name'=>'web']);
        if($request->permissions){
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('role.index');
    }
    public function edit(Role $role)
    {
        return view('role.edit',[
            'title' => 'Edit Role',
            'role' => $role,
            'permissions' => $this->getPermissionsByRoleId($role),
        ]);
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('roles')->ignore($role),
            ],
        ], [], [
            'name' => __('labels.name'),
        ]);

        $role->update([
            'name' => str($request->name)->lower()->slug('_'),
        ]);

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions(null);
        }

        return to_route('role.index')->with(['success' => __('messages.roles.update')]);
    }

    public function getPermissionsByRoleId(Role $role): Collection
    {
        $rolePermission = $role->permissions()
            ->pluck('id')
            ->toArray();

        $permissions = Permission::select('id', 'name')->orderBy('id')->get();

        $collection = $permissions->map(function ($item, $key) use ($rolePermission) {
            if (in_array($item->id, $rolePermission)) {
                return Arr::add($item, 'checked', true);
            } else {
                return Arr::add($item, 'checked', false);
            }
        });

        return $collection;
    }

}
