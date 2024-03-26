<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name'=>'superadmin', 'guard_name'=>'web'],
            ['name'=>'admin', 'guard_name'=>'web'],
            ['name'=>'bcio', 'guard_name'=>'web'],
            ['name'=>'bcpn', 'guard_name'=>'web'],
            ['name'=>'bcio_member', 'guard_name'=>'web'],
            ['name'=>'bcpn_member', 'guard_name'=>'web'],
        ]);
    }
}
