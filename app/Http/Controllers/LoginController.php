<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::firstwhere('email', $request->email);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/')->with('success', 'Welcome ' . ucwords($user->name));
            } else {
                return back()->with('error', 'Invalid Credentials');
            }
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }

    public function destory()
    {
        Auth::logout();
        return redirect('/login')->with('success','Logout Successfully !');
    }
}
