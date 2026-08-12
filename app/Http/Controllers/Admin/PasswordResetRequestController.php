<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        $query = PasswordResetRequest::with('user');

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $requests = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.password_reset_requests.index', compact('requests', 'status'));
    }

    public function approve(Request $request, PasswordResetRequest $passwordResetRequest)
    {
        $request->validate([
            'new_password' => 'nullable|string|min:6',
        ]);

        $user = $passwordResetRequest->user ?: User::where('email', $passwordResetRequest->email)->first();

        if (!$user) {
            return back()->with('error', 'User terkait tidak ditemukan.');
        }

        // Generate password if custom one is not provided
        $newPassword = $request->filled('new_password') ? $request->new_password : ('Bhakti' . rand(100, 999) . '!');

        $user->update([
            'password' => Hash::make($newPassword),
        ]);

        $passwordResetRequest->update([
            'status' => 'approved',
            'temp_password_display' => $newPassword,
            'admin_notes' => $request->admin_notes ?? 'Permohonan disetujui dan kata sandi baru telah ditetapkan oleh Super Admin.',
        ]);

        return back()->with('success_reset', [
            'message' => 'Kata sandi pengguna ' . $user->name . ' (' . $user->email . ') berhasil diperbarui!',
            'new_password' => $newPassword,
            'email' => $user->email,
        ]);
    }

    public function reject(Request $request, PasswordResetRequest $passwordResetRequest)
    {
        $passwordResetRequest->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes ?? 'Permohonan ditolak oleh Super Admin.',
        ]);

        return back()->with('success', 'Permohonan reset kata sandi telah ditolak.');
    }

    public function destroy(PasswordResetRequest $passwordResetRequest)
    {
        $passwordResetRequest->delete();
        return back()->with('success', 'Riwayat permohonan berhasil dihapus.');
    }
}
