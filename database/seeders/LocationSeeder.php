<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providerId = Role::where('name', 'provider')->first()->id;
        for ($i = 0; $i < 5; $i++) {
            Location::create([
                'user_id' => User::where('role_id', $providerId)->first()->id,
                'longitude' => ($i * 15),
                'latitude' => ($i * 10),
            ]);
        }
    }
}
