<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DipDocumentController as AdminDipController;
use App\Http\Controllers\Admin\RegulationController as AdminRegulationController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\DipController;
use App\Http\Controllers\Public\RequestController;
use App\Http\Controllers\Public\TrackingController;
use App\Http\Controllers\Public\RegulationController;
use App\Http\Controllers\Public\NewsController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Admin\PasswordResetRequestController as AdminPasswordResetController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Public Portal Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil Routes (Separate pages)
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/profil/visi-misi', [HomeController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/tugas-fungsi', [HomeController::class, 'tugasFungsi'])->name('profil.tugas-fungsi');
Route::get('/profil/struktur-organisasi', [HomeController::class, 'strukturOrganisasi'])->name('profil.struktur-organisasi');
Route::get('/profil/maklumat-pelayanan', [HomeController::class, 'maklumatPelayanan'])->name('profil.maklumat-pelayanan');

Route::get('/informasi-publik', [DipController::class, 'index'])->name('dip.index');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan.index');
Route::get('/informasi-publik/prosedur-layanan', [HomeController::class, 'prosedurLayanan'])->name('prosedur.public');
Route::get('/informasi-publik/download/{id}', [DipController::class, 'download'])->name('dip.download');

Route::get('/formulir-permohonan', [RequestController::class, 'create'])->name('request.create');
Route::post('/formulir-permohonan', [RequestController::class, 'store'])->name('request.store')->middleware('throttle:10,1');
Route::post('/tracking', [TrackingController::class, 'search'])->name('tracking.search');

Route::get('/regulasi', [RegulationController::class, 'index'])->name('regulations.public');

Route::get('/berita', [NewsController::class, 'index'])->name('news.public');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:10,1');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Public Forgot Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('guest');

/*
|--------------------------------------------------------------------------
| Admin Management Routes (Protected by Auth & RBAC Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Read-only dashboard view (Accessible by admin, operator, pimpinan)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/export-report', [DashboardController::class, 'exportReport'])->name('export-report');

    // Update status permohonan (Operator & Admin)
    Route::post('/requests/{id}/status', [DashboardController::class, 'updateRequestStatus'])
        ->name('requests.update')
        ->middleware('role:operator');

    // Dokumen DIP (Create/Edit: Operator & Admin, Delete: Admin Only)
    Route::resource('dip-documents', AdminDipController::class)->except(['show', 'destroy']);
    Route::delete('dip-documents/{dip_document}', [AdminDipController::class, 'destroy'])
        ->name('dip-documents.destroy')
        ->middleware('role:admin');

    // Regulasi (Create/Edit: Operator & Admin, Delete: Admin Only)
    Route::resource('regulations', AdminRegulationController::class)->except(['show', 'destroy']);
    Route::delete('regulations/{regulation}', [AdminRegulationController::class, 'destroy'])
        ->name('regulations.destroy')
        ->middleware('role:admin');

    // Berita (Create/Edit: Operator & Admin, Delete: Admin Only)
    Route::resource('news', AdminNewsController::class)->except(['show', 'destroy']);
    Route::delete('news/{news}', [AdminNewsController::class, 'destroy'])
        ->name('news.destroy')
        ->middleware('role:admin');

    // Export CSV Specific Datasets
    Route::get('/requests/export-csv', [DashboardController::class, 'exportRequestsCsv'])->name('requests.export-csv');
    Route::get('/contact-messages/export-csv', [AdminContactMessageController::class, 'exportCsv'])->name('contact-messages.export-csv');

    // Pesan Kontak (Index: All Roles, Delete: Admin Only)
    Route::get('contact-messages', [AdminContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::delete('contact-messages/{contact_message}', [AdminContactMessageController::class, 'destroy'])
        ->name('contact-messages.destroy')
        ->middleware('role:admin');

    // Permohonan Reset Password (Super Admin Only)
    Route::get('password-reset-requests', [AdminPasswordResetController::class, 'index'])->name('password-reset-requests.index')->middleware('role:superadmin');
    Route::post('password-reset-requests/{passwordResetRequest}/approve', [AdminPasswordResetController::class, 'approve'])->name('password-reset-requests.approve')->middleware('role:superadmin');
    Route::post('password-reset-requests/{passwordResetRequest}/reject', [AdminPasswordResetController::class, 'reject'])->name('password-reset-requests.reject')->middleware('role:superadmin');
    Route::delete('password-reset-requests/{passwordResetRequest}', [AdminPasswordResetController::class, 'destroy'])->name('password-reset-requests.destroy')->middleware('role:superadmin');

    // Manajemen Pengguna (Super Admin Only)
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->except(['show'])->middleware('role:superadmin');
});
