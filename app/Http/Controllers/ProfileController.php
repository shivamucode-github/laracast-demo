<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('posts.profile');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|min:6|max:255|unique:users,email,' . Auth::id(),
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $user = User::find(Auth::id());
        $imageName = md5_file($request->image);

        if (isset($user->image)) {
            Storage::delete($user->image);
        }

        $user->update(array_merge(
            $attributes,
            [
                'image' => $request->image->storeAs('public/images', $imageName . '.png', 'public')
            ]
        ));

        return back()->with('success', 'User Profile Updated Successfully!');
    }

    public function delete()
    {
        $user = User::find(Auth::id());
        $user->delete();
        Auth::logout();
        return redirect('login')->with('success', 'User Profile is Deleted!');
    }
}
