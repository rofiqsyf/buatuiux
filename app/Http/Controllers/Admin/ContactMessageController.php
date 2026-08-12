<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');
        $query = ContactMessage::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('ticket_number', 'like', "%{$search}%")
                  ->orWhere('topic_category', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.contact_messages.index', compact('messages', 'search'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function exportCsv()
    {
        $fileName = 'Kotak_Masuk_Dan_Pengaduan_Publik_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            // UTF-8 BOM for proper Excel display
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, ['REKAPITULASI KOTAK MASUK & PENGADUAN PUBLIK (E-PPID)']);
            fputcsv($file, ['INSTANSI:', 'PT Bhakti Husada Wonosobo (Perseroda)']);
            fputcsv($file, ['TANGGAL EKSPOR:', date('d F Y H:i:s')]);
            fputcsv($file, []);

            fputcsv($file, [
                'No. Tiket Inquiry',
                'Nama Pengirim',
                'Email',
                'Telepon',
                'Kategori Pemohon',
                'Topik / Subjek',
                'Judul',
                'Isi Pesan / Pengaduan',
                'Status',
                'Tanggal Masuk'
            ]);

            $messages = ContactMessage::orderBy('created_at', 'desc')->get();
            foreach ($messages as $msg) {
                fputcsv($file, array_map([$this, 'sanitizeCsvCell'], [
                    $msg->ticket_number ?? ('INQ-' . $msg->id),
                    $msg->name,
                    $msg->email,
                    $msg->phone ?? '-',
                    $msg->applicant_category ?? 'Perorangan',
                    $msg->topic_category ?? $msg->subject ?? 'Umum',
                    $msg->title ?? $msg->subject ?? '-',
                    $msg->message,
                    strtoupper($msg->status ?? 'unread'),
                    $msg->created_at ? $msg->created_at->format('d/m/Y H:i:s') : '-',
                ]));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function sanitizeCsvCell($value)
    {
        if (is_null($value)) {
            return '-';
        }
        $str = (string) $value;
        if (preg_match('/^[\=\+\-\@\t\r]/', $str)) {
            return "'" . $str;
        }
        return $str;
    }
}
