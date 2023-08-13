<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class profileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        return view('home.profile', ['user' => $user]);
    }

    public function changeName(Request $request)
    {
        $user = Auth::user();

        $newName = $request->input('new_name');

        $user->name = $newName;
        $user->save();

        return redirect()->route('Profile')->with('success', 'Your name has been changed successfully');
    }

    public function changePassword(Request $request)
    {

        $user = Auth::user();
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');
        $confirmNewPassword = $request->input('confirm_new_password');

        if (!Hash::check($currentPassword, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('error', 'Confirm new password does not match.');
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect()->route('Profile')->with('success', 'Your password has been changed successfully.');
    }
}
