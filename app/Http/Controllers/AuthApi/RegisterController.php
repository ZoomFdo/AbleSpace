<?php

namespace App\Http\Controllers\AuthApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\PendingUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_pending,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $emailExists = User::where('email', $data['email'])->exists();
        if ($emailExists) {
            return response()->json(['message' => 'Email already registered'], 422);
        }

        $pendingUser = PendingUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verification_token' => Str::random(60),
        ]);
        
        // Надсилання листа для підтвердження e-mail
        Mail::to($pendingUser->email)->send(new VerifyEmail($pendingUser));

        return response()->json([
            'message' => 'Check your email to verify your account',
        ], 201);
    }
}
