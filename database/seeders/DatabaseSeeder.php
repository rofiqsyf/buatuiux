<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DipDocument;
use App\Models\News;
use App\Models\Regulation;
use App\Models\InformationRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ──────────────────────────────────────────────────────────────
        // 1. USERS (4 Roles: superadmin, admin, operator, pimpinan)
        // ──────────────────────────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@bhaktihusada-wonosobo.co.id'],
            [
                'name' => 'Admin PPID',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'petugas@bhaktihusada-wonosobo.co.id'],
            [
                'name' => 'Petugas Layanan PPID',
                'password' => Hash::make('password123'),
                'role' => 'operator',
            ]
        );

        User::firstOrCreate(
            ['email' => 'pimpinan@bhaktihusada-wonosobo.co.id'],
            [
                'name' => 'Direktur PT Bhakti Husada',
                'password' => Hash::make('password123'),
                'role' => 'pimpinan',
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@diskominfo.wonosobokab.go.id'],
            [
                'name' => 'Super Admin Diskominfo',
                'password' => Hash::make('diskominfo2026'),
                'role' => 'superadmin',
            ]
        );

        // ──────────────────────────────────────────────────────────────
        // 2. DIP DOCUMENTS (10 Dokumen — 4 Berkala, 2 Serta Merta, 3 Setiap Saat, 1 Dikecualikan)
        // ──────────────────────────────────────────────────────────────
        $dipDocuments = [
            [
                'registration_number' => 'BHW/LK/2024/01',
                'title' => 'Laporan Keuangan Semester I Tahun 2024',
                'category' => 'berkala',
                'year' => 2024,
                'file_size' => '2.4 MB',
            ],
            [
                'registration_number' => 'BHW/LK/2023/04',
                'title' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) RSUD Tahun 2023',
                'category' => 'berkala',
                'year' => 2023,
                'file_size' => '3.1 MB',
            ],
            [
                'registration_number' => 'BHW/PK/2023/01',
                'title' => 'Program Kerja Tahunan PT Bhakti Husada 2023',
                'category' => 'berkala',
                'year' => 2023,
                'file_size' => '2.7 MB',
            ],
            [
                'registration_number' => 'BHW/PR/2024/02',
                'title' => 'Profil Ringkas Direksi dan Manajemen RSUD Tahun 2024',
                'category' => 'berkala',
                'year' => 2024,
                'file_size' => '1.8 MB',
            ],
            [
                'registration_number' => 'BHW/PL/2024/09',
                'title' => 'Pengumuman Lelang Pengadaan Alat Kesehatan ICU',
                'category' => 'serta-merta',
                'year' => 2024,
                'file_size' => '850 KB',
            ],
            [
                'registration_number' => 'BHW/SM/2024/03',
                'title' => 'Informasi Darurat: Wabah Demam Berdarah Kec. Wonosobo',
                'category' => 'serta-merta',
                'year' => 2024,
                'file_size' => '420 KB',
            ],
            [
                'registration_number' => 'BHW/SPM/2024/01',
                'title' => 'Standar Pelayanan Minimal (SPM) Rawat Jalan',
                'category' => 'setiap-saat',
                'year' => 2024,
                'file_size' => '1.1 MB',
            ],
            [
                'registration_number' => 'BHW/DA/2023/01',
                'title' => 'Daftar Aset Tetap dan Inventaris RSUD 2023',
                'category' => 'setiap-saat',
                'year' => 2023,
                'file_size' => '1.5 MB',
            ],
            [
                'registration_number' => 'BHW/RS/2020/01',
                'title' => 'Rencana Strategis (Renstra) PT Bhakti Husada 2020 - 2025',
                'category' => 'setiap-saat',
                'year' => 2020,
                'file_size' => '5.2 MB',
            ],
            [
                'registration_number' => 'BHW/RM/2024/DK',
                'title' => 'Ringkasan Data Rekam Medis Pasien (Terbatas)',
                'category' => 'dikecualikan',
                'year' => 2024,
                'file_size' => 'Terbatas',
            ],
        ];

        foreach ($dipDocuments as $doc) {
            DipDocument::firstOrCreate(
                ['registration_number' => $doc['registration_number']],
                $doc
            );
        }

        // ──────────────────────────────────────────────────────────────
        // 3. REGULATIONS (5 Regulasi)
        // ──────────────────────────────────────────────────────────────
        $regulations = [
            [
                'title' => 'Undang-Undang RI Nomor 14 Tahun 2008',
                'sub_title' => 'Keterbukaan Informasi Publik',
                'category' => 'uu',
                'year' => 2008,
            ],
            [
                'title' => 'Peraturan Pemerintah RI Nomor 61 Tahun 2010',
                'sub_title' => 'Pelaksanaan UU Nomor 14 Tahun 2008',
                'category' => 'pp',
                'year' => 2010,
            ],
            [
                'title' => 'Peraturan Komisi Informasi (PERKI) No. 1 Tahun 2021',
                'sub_title' => 'Standar Layanan Informasi Publik',
                'category' => 'perki',
                'year' => 2021,
            ],
            [
                'title' => 'Peraturan Daerah Kabupaten Wonosobo No. 13 Tahun 2022',
                'sub_title' => 'Penyelenggaraan Keterbukaan Informasi Publik di Lingkungan BUMD',
                'category' => 'perda',
                'year' => 2022,
            ],
            [
                'title' => 'SK Direktur Utama PT Bhakti Husada No. 045/DIR/2023',
                'sub_title' => 'Pedoman Pengelolaan Informasi dan Dokumentasi Internal',
                'category' => 'internal',
                'year' => 2023,
            ],
        ];

        foreach ($regulations as $reg) {
            Regulation::firstOrCreate(
                ['title' => $reg['title']],
                $reg
            );
        }

        // ──────────────────────────────────────────────────────────────
        // 4. NEWS & BERITA TRANSPARANSI (6 Artikel)
        // ──────────────────────────────────────────────────────────────
        $newsList = [
            [
                'title' => 'Publikasi Laporan Keuangan Semester I Tahun 2024',
                'slug' => 'publikasi-laporan-keuangan-semester-i-2024',
                'summary' => 'PT Bhakti Husada Wonosobo mempublikasikan Laporan Keuangan Semester I Tahun 2024 (No. Reg: BHW/LK/2024/01) sebagai wujud akuntabilitas dan transparansi pengelolaan keuangan BUMD kepada masyarakat luas.',
                'content' => 'Sebagai bentuk komitmen transparansi pengelolaan keuangan BUMD, PT Bhakti Husada Wonosobo mempublikasikan Laporan Keuangan Semester I Tahun 2024. Laporan ini mencakup realisasi anggaran pendapatan dan belanja, neraca keuangan, serta catatan atas laporan keuangan yang telah diaudit oleh pihak independen. Masyarakat dapat mengakses dokumen lengkap melalui halaman Daftar Informasi Publik (DIP) pada portal ini.',
                'category' => 'Informasi Berkala',
                'published_at' => '2024-08-01 10:00:00',
            ],
            [
                'title' => 'Pengumuman Lelang Pengadaan Alat Kesehatan ICU',
                'slug' => 'pengumuman-lelang-pengadaan-alat-kesehatan-icu',
                'summary' => 'Dalam rangka peningkatan fasilitas pelayanan kesehatan intensif, PT Bhakti Husada Wonosobo mengumumkan proses lelang pengadaan alat kesehatan ICU (No. Reg: BHW/PL/2024/09) secara terbuka kepada publik.',
                'content' => 'PT Bhakti Husada Wonosobo mengumumkan proses lelang terbuka untuk pengadaan alat kesehatan unit ICU. Pengumuman ini disampaikan sebagai bagian dari informasi serta-merta yang wajib dipublikasikan sesuai amanat UU KIP No. 14 Tahun 2008. Dokumen lelang lengkap dapat diakses pada repositori DIP dengan nomor registrasi BHW/PL/2024/09.',
                'category' => 'Serta Merta',
                'published_at' => '2024-07-25 14:30:00',
            ],
            [
                'title' => 'Informasi Darurat: Wabah Demam Berdarah Kecamatan Wonosobo',
                'slug' => 'informasi-darurat-wabah-demam-berdarah-kecamatan-wonosobo',
                'summary' => 'Sebagai informasi serta-merta, PT Bhakti Husada Wonosobo mempublikasikan data terkini wabah Demam Berdarah Dengue (DBD) di Kecamatan Wonosobo beserta langkah-langkah penanggulangan yang diambil.',
                'content' => 'Berdasarkan data surveilans epidemiologi, terjadi peningkatan kasus Demam Berdarah Dengue (DBD) di Kecamatan Wonosobo. PT Bhakti Husada Wonosobo selaku pengelola fasilitas kesehatan mempublikasikan informasi ini sebagai bagian dari kewajiban penyampaian informasi serta-merta kepada masyarakat. Data lengkap tersedia pada dokumen BHW/SM/2024/03.',
                'category' => 'Serta Merta',
                'published_at' => '2024-07-20 09:15:00',
            ],
            [
                'title' => 'Standar Pelayanan Minimal (SPM) Rawat Jalan Telah Diperbarui',
                'slug' => 'standar-pelayanan-minimal-rawat-jalan-diperbarui',
                'summary' => 'Dokumen Standar Pelayanan Minimal (SPM) Rawat Jalan (No. Reg: BHW/SPM/2024/01) telah diperbarui dan dipublikasikan melalui repositori DIP. Pembaruan mencakup standar mutu pelayanan terkini.',
                'content' => 'PT Bhakti Husada Wonosobo telah memperbarui Standar Pelayanan Minimal (SPM) untuk layanan rawat jalan. Dokumen ini menetapkan standar minimum yang harus dipenuhi dalam penyelenggaraan pelayanan kesehatan kepada masyarakat. Pembaruan dilakukan berdasarkan evaluasi kinerja tahun sebelumnya dan masukan dari berbagai pemangku kepentingan.',
                'category' => 'Setiap Saat',
                'published_at' => '2024-06-15 11:00:00',
            ],
            [
                'title' => 'Publikasi LKjIP RSUD Tahun 2023',
                'slug' => 'publikasi-lkjip-rsud-tahun-2023',
                'summary' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) RSUD Tahun 2023 (No. Reg: BHW/LK/2023/04) telah dipublikasikan mencakup capaian kinerja, analisis efisiensi, dan rencana tindak lanjut.',
                'content' => 'Laporan Kinerja Instansi Pemerintah (LKjIP) RSUD Tahun 2023 merupakan dokumen akuntabilitas yang menyajikan capaian kinerja PT Bhakti Husada Wonosobo selama tahun anggaran 2023. Laporan ini mencakup realisasi target kinerja, analisis efisiensi penggunaan sumber daya, serta rencana perbaikan untuk tahun berikutnya.',
                'category' => 'Informasi Berkala',
                'published_at' => '2024-05-10 16:45:00',
            ],
            [
                'title' => 'Profil Ringkas Direksi dan Manajemen RSUD Tahun 2024',
                'slug' => 'profil-ringkas-direksi-dan-manajemen-rsud-tahun-2024',
                'summary' => 'Publikasi profil lengkap Direksi dan Manajemen RSUD (No. Reg: BHW/PR/2024/02) sebagai informasi berkala yang wajib disampaikan kepada publik sesuai amanat UU KIP.',
                'content' => 'Sebagai bentuk transparansi tata kelola BUMD, PT Bhakti Husada Wonosobo mempublikasikan profil lengkap jajaran Direksi dan Manajemen RSUD untuk tahun 2024. Profil ini mencakup riwayat pendidikan, pengalaman profesional, serta visi masing-masing pimpinan dalam meningkatkan kualitas pelayanan kesehatan di Kabupaten Wonosobo.',
                'category' => 'Informasi Berkala',
                'published_at' => '2024-04-05 08:30:00',
            ],
        ];

        foreach ($newsList as $news) {
            News::firstOrCreate(
                ['slug' => $news['slug']],
                $news
            );
        }

        // ──────────────────────────────────────────────────────────────
        // 5. SAMPLE INFORMATION REQUESTS (3 Permohonan dengan Berbagai Status)
        // ──────────────────────────────────────────────────────────────
        InformationRequest::firstOrCreate(
            ['ticket_number' => 'REQ-20260805-A1B2'],
            [
                'name' => 'Budi Santoso',
                'nik' => '3307123456780001',
                'email' => 'budi.santoso@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 45, Kel. Wonosobo Timur, Kec. Wonosobo',
                'information_requested' => 'Salinan Laporan Keuangan BUMD PT Bhakti Husada Wonosobo Tahun 2023 dan Laporan Kinerja Instansi (LKjIP).',
                'purpose' => 'Penelitian Karya Tulis Ilmiah Tata Kelola BUMD Kesehatan',
                'status' => 'processing',
                'response_notes' => 'Permohonan sedang diverifikasi oleh Tim PPID PT Bhakti Husada Wonosobo. Estimasi selesai 5 hari kerja.',
            ]
        );

        InformationRequest::firstOrCreate(
            ['ticket_number' => 'REQ-20260720-C3D4'],
            [
                'name' => 'Siti Nurhaliza',
                'nik' => '3307987654321002',
                'email' => 'siti.nurhaliza@example.com',
                'phone' => '085678901234',
                'address' => 'Jl. Dieng No. 12, Kel. Garung, Kec. Garung, Kab. Wonosobo',
                'information_requested' => 'Data pengadaan alat kesehatan dan obat-obatan RSUD tahun 2023-2024.',
                'purpose' => 'Monitoring dan pengawasan masyarakat terhadap penggunaan anggaran BUMD',
                'status' => 'approved',
                'response_notes' => 'Permohonan telah disetujui. Dokumen telah dikirimkan via email terdaftar pada tanggal 28 Juli 2026.',
            ]
        );

        InformationRequest::firstOrCreate(
            ['ticket_number' => 'REQ-20260615-E5F6'],
            [
                'name' => 'Ahmad Fauzi',
                'nik' => '3307112233445503',
                'email' => 'ahmad.fauzi@example.com',
                'phone' => '087812345678',
                'address' => 'Jl. Raya Selomerto No. 78, Kec. Selomerto, Kab. Wonosobo',
                'information_requested' => 'Dokumen Rencana Strategis (Renstra) PT Bhakti Husada 2020-2025 dan Program Kerja Tahunan 2024.',
                'purpose' => 'Tugas Akhir Skripsi Program Studi Administrasi Publik',
                'status' => 'pending',
            ]
        );

        // ──────────────────────────────────────────────────────────────
        // 6. SAMPLE CONTACT MESSAGE (1 Pesan Konsultasi)
        // ──────────────────────────────────────────────────────────────
        ContactMessage::firstOrCreate(
            ['ticket_number' => 'INQ-20260801-G7H8'],
            [
                'name' => 'Dewi Ratnasari',
                'phone' => '089912345678',
                'email' => 'dewi.ratnasari@example.com',
                'applicant_category' => 'akademisi',
                'topic_category' => 'konsultasi',
                'title' => 'Konsultasi Prosedur Permohonan Informasi untuk Penelitian',
                'message' => 'Selamat siang, saya ingin berkonsultasi mengenai prosedur pengajuan permohonan informasi publik untuk keperluan penelitian akademik. Apakah ada persyaratan khusus untuk peneliti?',
                'status' => 'unread',
            ]
        );
    }
}
