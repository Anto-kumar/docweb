<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;


class ForgetpasswordController extends Controller
{
    public function forgetpassword()
    {
        return view('forgetpassword');
    }

    public function forgetpasswordpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(60);

        $user = User::where('email', $request->email)->first();
        DB::table('password_reset')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        if ($user) {
            $reset = PasswordReset::create([
                'user_id' => $user->id,
                'reset_code' => rand(100000, 999999)
            ]);

            Mail::to($user->email)->send(new ResetPasswordMail($reset));

            return redirect()->back()->with('success', 'Reset code sent to your email');
        }

        return redirect()->back()->with('error', 'User not found');
    }

    public function resetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'reset_code' => 'required|exists:password_resets,reset_code',
            'password' => 'required|confirmed'
        ]);

        $reset = PasswordReset::where('reset_code', $request->reset_code)->first();
        $user = User::where('email', $request->email)->first();

        if ($reset && $user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            $reset->delete();

            return redirect()->route('login')->with('success', 'Password reset successfully');
        }

        return redirect()->back()->with('error', 'Invalid reset code');
    }
}
