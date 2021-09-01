<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProviderController extends Controller
{
    public function index($subdomain)
    {
        // $user_name = Route::getCurrentRoute()->getParameter('subdomain');
        // $provider = User::where('user_name', $user_name);
        $provider = User::where('user_name', $subdomain);
        $data['locations'] = Location::where('user_id', $provider->id)->first();
        return view('users.user-locations')->with($data);
    }
}
