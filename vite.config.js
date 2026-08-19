import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        tailwindcss(),
    ],
    build: {
        outDir: 'dist',
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'index.html'),
                profil: resolve(__dirname, 'profil.html'),
                profilVisiMisi: resolve(__dirname, 'profil-visi-misi.html'),
                profilTugasFungsi: resolve(__dirname, 'profil-tugas-fungsi.html'),
                profilStruktur: resolve(__dirname, 'profil-struktur.html'),
                profilMaklumat: resolve(__dirname, 'profil-maklumat.html'),
                layanan: resolve(__dirname, 'layanan.html'),
                katalogProduk: resolve(__dirname, 'katalog-produk.html'),
                informasiPublik: resolve(__dirname, 'informasi-publik.html'),
                prosedurLayanan: resolve(__dirname, 'prosedur-layanan.html'),
                regulasi: resolve(__dirname, 'regulasi.html'),
                berita: resolve(__dirname, 'berita.html'),
                beritaDetail: resolve(__dirname, 'berita-detail.html'),
                formulirPermohonan: resolve(__dirname, 'formulir-permohonan.html'),
                kontak: resolve(__dirname, 'kontak.html'),
            },
        },
    },
});
