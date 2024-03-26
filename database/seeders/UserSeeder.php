<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password'=>\Hash::make('superadmin')
            ],
            [
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now(),
                'password'=>\Hash::make('admin')
            ],
            [
                'name' => 'BCIO Admin',
                'email' => 'bcio@bcio.com',
                'email_verified_at' => Carbon::now(),
                'password'=>\Hash::make('bcio')
            ],
            [
                'name' => 'BCPN Admin',
                'email' => 'bcpn@bcpn.com',
                'email_verified_at' => Carbon::now(),
                'password'=>\Hash::make('bcpn')
            ]
        ]);
    }
}
