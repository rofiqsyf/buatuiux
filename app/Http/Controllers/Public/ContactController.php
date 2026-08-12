<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|min:9|max:20',
            'email' => 'required|email|max:255',
            'kategori_pemohon' => 'nullable|string',
            'subjek' => 'required|string',
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string',
            'kontakFile' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:5120',
        ]);

        $filePath = null;
        if ($request->hasFile('kontakFile')) {
            $filePath = $request->file('kontakFile')->store('contact_attachments', 'public');
        }

        $ticketNum = 'INQ-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        ContactMessage::create([
            'ticket_number' => $ticketNum,
            'name' => $validated['nama'],
            'phone' => $validated['telepon'],
            'email' => $validated['email'],
            'applicant_category' => $validated['kategori_pemohon'] ?? 'perorangan',
            'topic_category' => $validated['subjek'],
            'title' => $validated['judul'],
            'message' => $validated['pesan'],
            'attachment_path' => $filePath,
            'status' => 'unread',
        ]);

        return response()->json([
            'success' => true,
            'ticket_number' => $ticketNum,
            'message' => 'Pesan Anda telah berhasil terkirim. Nomor tiket: #' . $ticketNum,
        ]);
    }
}
