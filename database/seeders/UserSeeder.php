<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::where('name', 'superadmin')->first();
        $admin = Role::where('name', 'admin')->first();
        $provider = Role::where('name', 'provider')->first();
        User::create([
            'name' => 'task superadmin',
            'user_name' => 'task_superadmin',
            'password' => Hash::make('123456789'),
            'email' => 'superadmin@oneapp.com',
            'role_id' => $superadmin->id,
        ]);
        User::create([
            'name' => 'task admin',
            'user_name' => 'task_admin',
            'password' => Hash::make('123456789'),
            'email' => 'admin@oneapp.com',
            'role_id' => $admin->id,
        ]);
        User::create([
            'name' => 'task provider',
            'user_name' => 'task_provider',
            'password' => Hash::make('123456789'),
            'email' => 'provider@oneapp.com',
            'role_id' => $provider->id,
        ]);
    }
}
