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
        $providerRole = Role::where('name', 'provider')->first()->id;
        $provider = User::where('role_id', $providerRole)->first();
        Location::create([
            'user_id' => $provider->id,
            'location_1' => json_encode([
                'long' => 25,
                'latt' => 15,
            ]),
            'location_2' => json_encode([
                'long' => 35,
                'latt' => 25,
            ]),
            'location_3' => json_encode([
                'long' => 45,
                'latt' => 35,
            ]),
            'location_4' => json_encode([
                'long' => 55,
                'latt' => 45,
            ]),
            'location_5' => json_encode([
                'long' => 65,
                'latt' => 55,
            ]),
        ]);
    }
}
