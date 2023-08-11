<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\PasswordResetToken;

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


    // here
    public function forgetpass()
    {
        return view('home/Auth/forget_password');
    }

    public function forgetpassPost(Request $request)
    {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['status' => 0, 'message' => 'Invalid email format']);
        }

        $existingUser = User::where('email', $request->email)->first();
        if (!$existingUser) {
            return response()->json(['status' => 0, 'message' => 'Email does not exist']);
        }

        $token = strtoupper(Str::random(10));
        $user = User::where('email', $request->email)->first();

        $passwordResetToken = PasswordResetToken::where('email', $user->email)->first();

        if ($passwordResetToken) {
            $passwordResetToken->update(['token' => $token]);
        } else {
            $passwordResetToken = PasswordResetToken::create([
                'email' => $user->email,
                'token' => $token,
            ]);
        }

        Mail::send('emails.check_email_forget', compact('user', 'passwordResetToken'), function ($email) use ($user) {
            $email->subject('acedia - password retrieval');
            $email->to($user->email, $user->name);
        });

        return response()->json(['status' => 0, 'message' => 'Please check your email to complete the password reset process.']);
    }


    public function getpass(user $user, $token)
    {
        $user = User::findOrFail($user->id);

        $passwordResetToken = PasswordResetToken::where('email', $user->email)
            ->where('token', $token)
            ->first();

        if (!$passwordResetToken) {
            return abort(404);
        }

        return view('home/Auth/getpass', compact('user', 'token'));
    }

    public function getpassPost(Request $request, User $user, $token)
    {

        if (strlen($request->password) < 8 || $request->password !== $request->password_confirmation) {
            return response()->json(['status' => 0, 'message' => 'Invalid password']);
        }

        $user = User::findOrFail($user->id);

        $passwordResetToken = PasswordResetToken::where('email', $user->email)
            ->where('token', $token)
            ->first();

        if (!$passwordResetToken) {
            return abort(404);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        $passwordResetToken->delete();
        return response()->json(['status' => 0, 'message' => 'Your password has been reset successfully. You can now log in with your new password.']);
    }
}
