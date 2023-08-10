<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Register()
    {
        return view('home/Auth/Registration');
    }

    public function RegisterPost(Request $request)
    {
        try {

            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['status' => 0, 'message' => 'Invalid email format']);
            }

            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json(['status' => 0, 'message' => 'Email already exists']);
            }

            if ($request->password !== $request->password_confirmation) {
                return response()->json(['status' => 0, 'message' => 'Passwords do not match']);
            }

            $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/';
            if (!preg_match($passwordPattern, $request->password)) {
                return response()->json(['status' => 0, 'message' => 'Password must be at least 6 characters long, contain at least one uppercase letter, and have at least one digit.']);
            }


            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            // return redirect()->route('login')->with('success', 'Register successfully');
            return response()->json(['status' => 0, 'message' => 'Register successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => 'An error occurred during registration']);
        }
    }

    public function login()
    {
        return view('home/Auth/login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            // return redirect()->route('dashboard')->with('success', 'Login Success');
            return response()->json(['status' => 0, 'message' => 'Login Success']);
        }

        // return back()->with('error', 'Error Email or Password');
        return response()->json(['status' => 0, 'message' => 'Error Email or Password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
