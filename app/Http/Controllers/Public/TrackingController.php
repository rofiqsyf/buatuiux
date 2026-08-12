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

        $infoReq = InformationRequest::where('ticket_number', $ticket)
            ->orWhere('ticket_number', strtoupper($ticket))
            ->first();

        if ($infoReq) {
            $statusLabels = [
                'pending' => 'Menunggu Verifikasi',
                'processing' => 'Sedang Diproses Tim PPID',
                'approved' => 'Selesai - Informasi Disetujui',
                'rejected' => 'Permohonan Ditolak',
            ];

            return response()->json([
                'success' => true,
                'found' => true,
                'ticket_number' => $infoReq->ticket_number,
                'name' => $infoReq->name,
                'status' => $infoReq->status,
                'status_label' => $statusLabels[$infoReq->status] ?? 'Sedang Diproses',
                'stage' => $infoReq->status === 'approved' ? 'Dokumen Siap / Dikirim' : 'Verifikasi Substansi & Dokumen PPID',
                'estimate' => 'Maks. 10 hari kerja',
                'created_at' => $infoReq->created_at ? $infoReq->created_at->format('d F Y') : date('d F Y'),
                'response_notes' => $infoReq->response_notes,
            ]);
        }

        // Fallback: Check ContactMessage ticket (INQ-)
        $contactMsg = \App\Models\ContactMessage::where('ticket_number', $ticket)
            ->orWhere('ticket_number', strtoupper($ticket))
            ->first();

        if ($contactMsg) {
            $contactStatusLabels = [
                'unread' => 'Pesan Diterima - Menunggu Respon Sekretariat',
                'read' => 'Pesan Telah Dibaca & Diproses Tim Sekretariat',
                'responded' => 'Pesan Telah Dibalas / Ditindaklanjuti',
            ];

            return response()->json([
                'success' => true,
                'found' => true,
                'ticket_number' => $contactMsg->ticket_number,
                'name' => $contactMsg->name,
                'status' => $contactMsg->status,
                'status_label' => $contactStatusLabels[$contactMsg->status] ?? 'Pesan Diterima',
                'stage' => 'Tindak Lanjut Sekretariat PPID',
                'estimate' => 'Maks. 3 hari kerja',
                'created_at' => $contactMsg->created_at ? $contactMsg->created_at->format('d F Y') : date('d F Y'),
                'response_notes' => 'Pesan kontak Anda telah tercatat dengan subjek: ' . $contactMsg->topic_category,
            ]);
        }

        return response()->json([
            'success' => true,
            'found' => false,
            'ticket_number' => $ticket,
            'message' => 'Nomor tiket ' . $ticket . ' tidak ditemukan dalam sistem PPID. Pastikan nomor tiket yang Anda masukkan sudah benar.',
        ]);
    }
}
