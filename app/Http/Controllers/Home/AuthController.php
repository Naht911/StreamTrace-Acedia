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
    public function showRegistrationForm()
    {
        return view('home.Auth.Registration');
    }

    public function processRegistration(Request $request)
    {
        try {
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['status' => 1, 'message' => 'Invalid email format']);
            }

            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json(['status' => 1, 'message' => 'Email already exists']);
            }

            if ($request->password !== $request->password_confirmation) {
                return response()->json(['status' => 1, 'message' => 'Passwords do not match']);
            }

            $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{6,}$/';
            if (!preg_match($passwordPattern, $request->password)) {
                return response()->json(['status' => 1, 'message' => 'Password must be at least 6 characters long, contain at least one uppercase letter, and have at least one digit.']);
            }

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            Auth::login($user);

            return response()->json(['status' => 0, 'message' => 'Register successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 1, 'message' => 'An error occurred during registration']);
        }
    }

    public function showLoginForm()
    {
        return view('home.Auth.login');
    }
    public function processLogin(Request $request)
    {
        try {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $userExists = User::where('email', $request->email)->exists();
            if (!$userExists) {
                return response()->json(['status' => 1, 'message' => 'Email does not exist']);
            }

            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                return response()->json(['status' => 0, 'message' => 'Login Success']);
            }

            return response()->json(['status' => 1, 'message' => 'Error Email or Password']);
        } catch (\Exception $e) {
            return response()->json(['status' => 1, 'message' => 'An error occurred while processing your request.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    public function showForgotPasswordForm()
    {
        return view('home.Auth.forget_password');
    }

    public function processForgotPassword(Request $request)
    {
        try {
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['status' => 1, 'message' => 'Invalid email format']);
            }

            $existingUser = User::where('email', $request->email)->first();
            if (!$existingUser) {
                return response()->json(['status' => 1, 'message' => 'Email does not exist']);
            }

            $token = strtoupper(Str::random(20));
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

            Auth::login($user);

            Mail::send('emails.check_email_forget', compact('user', 'passwordResetToken'), function ($email) use ($user) {
                $email->subject('acedia - password retrieval');
                $email->to($user->email, $user->name);
            });

            return response()->json(['status' => 0, 'message' => 'Please check your email to complete the password reset process.']);
        } catch (\Exception $e) {
            return response()->json(['status' => -1, 'message' => 'An error occurred while processing your request.']);
        }
    }


    public function showResetPasswordForm(user $user, $token)
    {
        try {
            $user = User::findOrFail($user->id);

            $passwordResetToken = PasswordResetToken::where('email', $user->email)
                ->where('token', $token)
                ->first();

            if (!$passwordResetToken) {
                return abort(404);
            }

            return view('home/Auth/getpass', compact('user', 'token'));
        } catch (\Exception $e) {
            return view('home/Auth/login');
        }
    }

    public function processResetPassword(Request $request, User $user, $token)
    {

        try {
            if (strlen($request->password) < 8 || $request->password !== $request->password_confirmation) {
                return response()->json(['status' => 1, 'message' => 'Invalid password']);
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

            if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                return response()->json(['status' => 0, 'message' => 'Your password has been reset successfully. You can now log in with your new password.']);
            } else {
                return response()->json(['status' => 1, 'message' => 'An error occurred while logging in with the new password.']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 1, 'message' => 'An error occurred while resetting the password.']);
        }
    }
}
