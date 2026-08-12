<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'reason' => 'required|string|max:500',
        ], [
            'email.required' => 'Alamat email terdaftar wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'reason.required' => 'Alasan permohonan reset kata sandi wajib diisi.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInput()->withErrors([
                'email' => 'Alamat email tidak ditemukan dalam sistem database pengguna.',
            ]);
        }

        // Check if there is already a pending request
        $existingPending = PasswordResetRequest::where('user_id', $user->id)
            ->where('status', 'pending')
            ->first();

        if ($existingPending) {
            return back()->with('info', 'Anda sudah memiliki permohonan reset kata sandi yang sedang dalam proses verifikasi Super Admin.');
        }

        PasswordResetRequest::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return back()->with('status', 'Permohonan reset kata sandi berhasil dikirimkan ke Super Admin Diskominfo. Mohon tunggu verifikasi dan penetapan kata sandi baru dari Super Admin.');
    }
}
