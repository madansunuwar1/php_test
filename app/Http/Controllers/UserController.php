<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '<>', 1)->with('role')->get();
        return view('user.index', compact('users'));
    }
    public function edit(User $user)
    {
        $roles = Role::select(['id', 'name'])->whereNotIn('id', [1,2])->orderBy('id', 'ASC')->get();
        return view('user.edit', [
            'title' => 'Edit User',
            'roles' => $roles,
            'roleId' => $user->role->pluck('id')->first(),
            'user' => $user,
        ]);
    }
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if ($request->role) {
            $user->syncRoles($request->role);
        }
        return redirect()->route('user.index');
    }
}
