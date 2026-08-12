<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function search(Request $request)
    {
        $ticket = trim($request->input('ticket'));

        if (!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Nomor tiket wajib diisi.'
            ], 422);
        }

        // Dummy Frontend-Only Logic
        if (str_starts_with(strtoupper($ticket), 'REQ')) {
            return response()->json([
                'success' => true,
                'found' => true,
                'ticket_number' => strtoupper($ticket),
                'name' => 'Pengguna Simulasi',
                'status' => 'processing',
                'status_label' => 'Sedang Diproses Tim PPID',
                'stage' => 'Verifikasi Substansi & Dokumen PPID',
                'estimate' => 'Maks. 10 hari kerja',
                'created_at' => date('d F Y'),
                'response_notes' => 'Ini adalah simulasi pelacakan tiket permohonan informasi.',
            ]);
        } elseif (str_starts_with(strtoupper($ticket), 'INQ')) {
            return response()->json([
                'success' => true,
                'found' => true,
                'ticket_number' => strtoupper($ticket),
                'name' => 'Pengguna Simulasi',
                'status' => 'unread',
                'status_label' => 'Pesan Diterima - Menunggu Respon',
                'stage' => 'Tindak Lanjut Sekretariat PPID',
                'estimate' => 'Maks. 3 hari kerja',
                'created_at' => date('d F Y'),
                'response_notes' => 'Ini adalah simulasi pelacakan pesan kontak/pengaduan.',
            ]);
        }

        return response()->json([
            'success' => true,
            'found' => false,
            'ticket_number' => $ticket,
            'message' => 'Nomor tiket ' . $ticket . ' tidak ditemukan dalam sistem simulasi. Awali dengan REQ atau INQ.',
        ]);
    }
}
