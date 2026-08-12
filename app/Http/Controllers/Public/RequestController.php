<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    public function create()
    {
        return view('formulir-permohonan');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nik' => 'required|string|size:16',
                'email' => 'required|email|max:255',
                'telepon' => 'required|string|min:9|max:20',
                'alamat' => 'required|string',
                'rincian' => 'required|string',
                'tujuan' => 'required|string',
                'fileLampiran' => 'nullable|file|mimes:jpeg,jpg,png,pdf,doc,docx|max:5120',
                'pernyataan' => 'accepted',
            ], [
                'nama.required' => 'Nama lengkap wajib diisi.',
                'nik.required' => 'NIK 16 digit wajib diisi.',
                'nik.size' => 'NIK harus berjumlah persis 16 digit angka.',
                'email.required' => 'Alamat email wajib diisi.',
                'email.email' => 'Format alamat email tidak valid.',
                'telepon.required' => 'Nomor telepon/WhatsApp wajib diisi.',
                'alamat.required' => 'Alamat domisili lengkap wajib diisi.',
                'rincian.required' => 'Rincian informasi yang dibutuhkan wajib diisi.',
                'tujuan.required' => 'Tujuan penggunaan informasi wajib diisi.',
                'pernyataan.accepted' => 'Anda harus menyetujui keabsahan data permohonan.',
            ]);

            $ticketNumber = 'REQ-DUMMY-' . strtoupper(Str::random(6));

            return response()->json([
                'success' => true,
                'ticket_number' => $ticketNumber,
                'message' => 'Permohonan (Simulasi) berhasil dikirim. Nomor tiket Anda: #' . $ticketNumber,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors(),
                'message' => 'Terdapat kesalahan atau isian belum lengkap. Silakan periksa kolom yang ditandai merah.',
            ], 422);
        }
    }
}
