<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'title' => __('Dashboard'),
            'permissions' => Permission::select(['id', 'name'])->get(),
        ]);
    }
}
