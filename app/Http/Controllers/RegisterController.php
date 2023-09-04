<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterationRequest $request)
    {
        if ($request->image) {
            $image = User::storeImage($request->image);
        } else {
            $image = null;
        }

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image
        ]);

        if ($user) {
            return redirect('/login')->with('success', 'User created successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
