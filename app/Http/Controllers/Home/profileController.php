<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Subscription;
use App\Models\StreamingServiceProvider;
use App\Models\TypePrice;
class profileController extends Controller
{

    public function show()
    {
        //danh sách các quan hệ
        $relations = ['subscription'];
        $user = Auth::user();
        $subscriptions = Subscription::where('user_id', $user->id)
            ->with('typePrice')
            ->with('streamingServiceProvider')
            ->get();
            $providers = StreamingServiceProvider::all();
            $type_price = TypePrice::all();
        $data = [
            'user' => $user,
            'subscriptions' => $subscriptions,
            'providers' => $providers,
            'type_price' => $type_price,
        ];

        return view('home.profile', $data);
    }

    public function changeName(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $newName = $request->input('new_name');

        $user->name = $newName;
        $user->save();

        return redirect()->route('Profile')->with('success', 'Update name successfully.');
    }

    public function changePassword(Request $request)
    {

        $user = User::find(Auth::user()->id);
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
