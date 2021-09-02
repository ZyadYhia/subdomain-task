<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function index()
    {
        $data['providers'] = User::where('role_id', Role::where('name', 'provider')->first()->id)->get();
        return view('admin.providers.index')->with($data);
    }
    public function create()
    {
        return view('admin.providers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:users,user_name',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:5|max:25',
            'latt' => 'nullable|array',
            'latt.*' => 'nullable|integer|max:255',
            'long' => 'nullable|array',
            'long.*' => 'nullable|integer|max:255',
        ]);
        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('name', 'provider')->first()->id,
        ]);
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
    public function delete(User $user, Request $request)
    {
        try {
            $user->delete();
            $msg = 'row deleted successfully';
        } catch (Exception $e) {
            $msg = "row can't br deleted";
        }
        $request->session()->flash('msg', $msg);
        return  back();
    }
}
