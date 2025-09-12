<?php

namespace App\Http\Controllers\AuthApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class EmailVerificationController extends Controller
{
    /**
     * Підтвердження email користувача
     */
    public function verify(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        $pendingUser = PendingUser::where('email', $email)
                                  ->where('email_verification_token', $token)
                                  ->first();

        if (!$pendingUser) {
            return response()->json(['message' => 'Invalid verification link'], 422);
        }

        // Створюємо постійного користувача
        $user = User::create([
            'name' => $pendingUser->name,
            'surname' => $pendingUser->surname ?? null,
            'email' => $pendingUser->email,
            'password' => $pendingUser->password,
            'registration_date' => now(),
            'is_active' => true,
        ]);

        // Видаляємо запис з pending_users
        $pendingUser->delete();

        return response()->json(['message' => 'Email verified successfully', 'user' => $user]);
    }

    /**
     * Повторна відправка листа для підтвердження
     */
    public function resend(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $pendingUser = PendingUser::where('email', $request->email)->first();

        if (!$pendingUser) {
            return response()->json(['message' => 'Email not found or already verified'], 422);
        }

        Mail::to($pendingUser->email)->send(new VerifyEmail($pendingUser));

        return response()->json(['message' => 'Verification link resent']);
    }
}
