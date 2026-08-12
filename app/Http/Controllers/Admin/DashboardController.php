<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use App\Models\DipDocument;
use App\Models\ContactMessage;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRequests = InformationRequest::count();
        $pendingRequests = InformationRequest::where('status', 'pending')->count();
        $approvedRequests = InformationRequest::where('status', 'approved')->count();
        $totalDocs = DipDocument::count();

        // SLA & Performance Metrics
        $completedRequests = InformationRequest::whereIn('status', ['approved', 'rejected'])->get();
        $totalDurationDays = 0;
        $onTimeCount = 0;

        foreach ($completedRequests as $req) {
            if ($req->created_at && $req->updated_at) {
                $days = max(1, $req->created_at->diffInDays($req->updated_at));
                $totalDurationDays += $days;
                if ($days <= 10) {
                    $onTimeCount++;
                }
            }
        }

        $avgSlaDays = $completedRequests->count() > 0 
            ? round($totalDurationDays / $completedRequests->count(), 1) 
            : 2.5;

        $slaOnTimePercentage = $completedRequests->count() > 0
            ? round(($onTimeCount / $completedRequests->count()) * 100, 1)
            : 100.0;

        // Near Deadline (Pending/Processing for > 7 days)
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $nearDeadlineCount = InformationRequest::whereIn('status', ['pending', 'processing'])
            ->where('created_at', '<=', $sevenDaysAgo)
            ->count();

        // DIP Category Breakdown
        $categoryBreakdown = [
            'berkala' => DipDocument::where('category', 'berkala')->count(),
            'serta_merta' => DipDocument::where('category', 'serta-merta')->count(),
            'setiap_saat' => DipDocument::where('category', 'setiap-saat')->count(),
            'dikecualikan' => DipDocument::where('category', 'dikecualikan')->count(),
        ];

        // Visitor Traffic Stats (Last 7 Days Trend)
        $visitorStats = VisitorLog::getStats();
        $trafficLabels = [];
        $trafficData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateStr = $date->toDateString();
            $trafficLabels[] = $date->format('d M');
            $count = VisitorLog::where('visited_date', $dateStr)->count();
            $trafficData[] = max($i === 0 ? $visitorStats['today'] : 1, $count);
        }

        // Recent Requests & Contact Messages
        $recentRequests = InformationRequest::orderBy('created_at', 'desc')->take(10)->get();
        $recentContacts = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $unreadContactsCount = ContactMessage::where('status', 'unread')->count();

        return view('admin.dashboard', compact(
            'totalRequests',
            'pendingRequests',
            'approvedRequests',
            'totalDocs',
            'avgSlaDays',
            'slaOnTimePercentage',
            'nearDeadlineCount',
            'categoryBreakdown',
            'visitorStats',
            'trafficLabels',
            'trafficData',
            'recentRequests',
            'recentContacts',
            'unreadContactsCount'
        ));
    }

    public function updateRequestStatus(Request $request, $id)
    {
        $infoReq = InformationRequest::findOrFail($id);
        $status = $request->input('status');
        $notes = $request->input('response_notes');

        $infoReq->update([
            'status' => $status,
            'response_notes' => $notes,
        ]);

        return redirect()->back()->with('success', 'Status permohonan #' . $infoReq->ticket_number . ' berhasil diperbarui.');
    }

    public function exportReport()
    {
        $fileName = 'Laporan_Monev_PPID_PT_Bhakti_Husada_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');

            // Header Laporan
            fputcsv($file, ['LAPORAN MONEV KETERBUKAAN INFORMASI PUBLIK (KIP)']);
            fputcsv($file, ['INSTANSI:', 'PT Bhakti Husada Wonosobo (Perseroda)']);
            fputcsv($file, ['TANGGAL CETAK:', date('d F Y H:i:s')]);
            fputcsv($file, []);

            // Ringkasan Statistik
            fputcsv($file, ['--- RINGKASAN METRIK LAYANAN ---']);
            fputcsv($file, ['Total Permohonan Masuk', InformationRequest::count()]);
            fputcsv($file, ['Permohonan Disetujui', InformationRequest::where('status', 'approved')->count()]);
            fputcsv($file, ['Permohonan Menunggu', InformationRequest::where('status', 'pending')->count()]);
            fputcsv($file, ['Total Katalog DIP', DipDocument::count()]);
            fputcsv($file, []);

            // Detail Permohonan
            fputcsv($file, ['--- REKAPITULASI PERMOHONAN INFORMASI ---']);
            fputcsv($file, ['No. Tiket', 'Nama Pemohon', 'NIK', 'Email', 'Telepon', 'Rincian Informasi', 'Status', 'Tanggal Pengajuan']);

            $requests = InformationRequest::orderBy('created_at', 'desc')->get();
            foreach ($requests as $req) {
                fputcsv($file, [
                    $req->ticket_number,
                    $req->name,
                    "'" . $req->nik,
                    $req->email,
                    $req->phone,
                    $req->information_requested,
                    strtoupper($req->status),
                    $req->created_at ? $req->created_at->format('d/m/Y H:i') : '-',
                ]);
            }

            fputcsv($file, []);
            fputcsv($file, ['--- REKAPITULASI KATALOG DIP ---']);
            fputcsv($file, ['No. Registrasi', 'Judul Dokumen', 'Kategori', 'Tahun', 'Jumlah Unduhan']);

            $docs = DipDocument::orderBy('year', 'desc')->get();
            foreach ($docs as $doc) {
                fputcsv($file, [
                    $doc->registration_number,
                    $doc->title,
                    strtoupper($doc->category),
                    $doc->year,
                    $doc->downloads_count ?? 0,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportRequestsCsv()
    {
        $fileName = 'Data_Permohonan_Informasi_Masuk_' . date('Ymd_His') . '.csv';

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

            fputcsv($file, ['REKAPITULASI PERMOHONAN INFORMASI PUBLIK MASUK (E-PPID)']);
            fputcsv($file, ['INSTANSI:', 'PT Bhakti Husada Wonosobo (Perseroda)']);
            fputcsv($file, ['TANGGAL EKSPOR:', date('d F Y H:i:s')]);
            fputcsv($file, []);

            fputcsv($file, [
                'No. Tiket',
                'Nama Pemohon',
                'NIK',
                'Email',
                'Telepon',
                'Alamat Domisili',
                'Rincian Informasi Membutuhkan Layanan',
                'Tujuan Penggunaan Informasi',
                'Status Permohonan',
                'Catatan Tanggapan Petugas',
                'Tanggal Pengajuan'
            ]);

            $requests = InformationRequest::orderBy('created_at', 'desc')->get();
            foreach ($requests as $req) {
                fputcsv($file, array_map([$this, 'sanitizeCsvCell'], [
                    $req->ticket_number,
                    $req->name,
                    "'" . $req->nik,
                    $req->email,
                    $req->phone,
                    $req->address,
                    $req->information_requested,
                    $req->purpose,
                    strtoupper($req->status),
                    $req->response_notes ?? '-',
                    $req->created_at ? $req->created_at->format('d/m/Y H:i:s') : '-',
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
