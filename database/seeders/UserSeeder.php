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
        User::create([
            'name' => 'superadmin',
            'password' => Hash::make('123456789'),
            'email' => 'superadmin@system.com',
            'role_id' => Role::where('name', 'superadmin')->first()->id,
        ]);
        User::create([
            'name' => 'admin',
            'password' => Hash::make('123456789'),
            'email' => 'admin@system.com',
            'role_id' => Role::where('name', 'admin')->first()->id,
        ]);
        User::create([
            'name' => 'provider',
            'password' => Hash::make('123456789'),
            'email' => 'provider@system.com',
            'user_name' => 'provider',
            'role_id' => Role::where('name', 'provider')->first()->id,
        ]);
    }
}
