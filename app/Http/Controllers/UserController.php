<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();


        return view('user.index', compact('users'));
    }
    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->where('id', '<>', 1)->get();
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
