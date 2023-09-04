<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function update(Request $request){
        $data = $request->validate([
            'oldpassword' => 'required|alpha_num|min:6|max:100',
            'password' => 'required|alpha_num|min:6|max:100',
            'confirm_password' => 'required|alpha_num|min:6|max:100|same:password'
        ]);

        $user = User::find(Auth::id());
        if(Hash::check($request->oldpassword,$user->password))
        {
            $user->update($data);
            return back()->with('success', 'Password Updated Successfully! ');
        }else{
            return back()->with('error', 'Invalid Password !');
        }
    }
}
