<?php

namespace App\Http\Controllers\web;

use App\Models\Role;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function index()
    {
        $providerId = Role::where('name', 'provider')->first()->id;
        $data['providers'] = User::where('role_id', $providerId)->get();
        return view('web.providers.index')->with($data);
    }
    public function show($username)
    {
        $providerId = Role::where('name', 'provider')->first()->id;
        $data['providers'] = User::where('role_id', $providerId)->get();
        $data['provider'] = User::where('user_name', $username)->first();
        $data['locations'] = Location::where('user_id', $data['provider']->id)->get();
        return view('web.providers.show')->with($data);
    }
    public function createLocations()
    {
        $data['user'] = Auth::user();
        $data['locations'] = Location::where('user_id', $data['user']->id)->get();
        $data['locations_count'] = $data['locations']->count();
        if ($data['locations_count'] > 5) {
            return redirect(url('/'));
        }
        return view('web.providers.create-location')->with($data);
    }
    public function storeLocation(Request $request)
    {
        $request->validate([
            'latt' => 'nullable|array',
            'latt.*' => 'nullable|integer|max:255',
            'long' => 'nullable|array',
            'long.*' => 'nullable|integer|max:255',
        ]);
        $user = Auth::user();

        for ($i = 1; $i < 6; $i++) {
            //to make sure he filled the location and store it correctly
            if (!empty($request->long[$i]) and !empty($request->latt[$i])) {
                Location::create([
                    'user_id' => $user->id,
                    'longitude' => $request->long[$i],
                    'latitude' => $request->latt[$i],
                ]);
            }
        }
        return redirect(url("dashboard/providers"));
    }
}
