<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes - Vibra-Tech Indonesia
|--------------------------------------------------------------------------
|
| Di sini adalah tempat kamu mendaftarkan semua route untuk aplikasi web kamu.
| Sesuai dengan instruksi UTS, kita menggunakan Controller untuk mengatur logika.
|
*/

// 1. Halaman Utama (Dashboard Monitoring)
// Menampilkan ringkasan status semua mesin di pabrik Batam
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// 2. Halaman Detail Mesin (Opsional - Untuk Nilai Plus)
// Menampilkan grafik detail getaran dan suhu untuk mesin tertentu
Route::get('/mesin/{id}', [DashboardController::class, 'show'])->name('mesin.detail');

// 3. Halaman Laporan (History)
// Menampilkan semua log data sensor yang pernah masuk dari ESP32
Route::get('/laporan', [DashboardController::class, 'report'])->name('laporan.index');

// 4. Halaman Tentang Kami / Konsep Startup
// Bisa digunakan untuk menjelaskan masalah "Downtime" di industri Batam
Route::get('/tentang', function () {
    return view('about');
})->name('about');

/* TIPS UTS: 
   Jangan lupa buat fungsi 'show' dan 'report' di DashboardController 
   agar route di atas tidak error saat diakses.
*/