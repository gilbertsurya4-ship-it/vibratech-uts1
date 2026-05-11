<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes - Vibra-Tech Indonesia
|--------------------------------------------------------------------------
|
| Jalur ini digunakan untuk menerima data dari perangkat keras (Hardware).
| Dalam proyek UTS kamu, ESP32 akan mengirimkan data getaran dan suhu ke sini.
|
*/

// Endpoint untuk menerima data dari sensor IoT (ESP32)
// URL aksesnya nanti adalah: http://127.0.0.1:8000/api/sensor-update
Route::post('/sensor-update', [DashboardController::class, 'storeApi']);

// Endpoint untuk mengecek status sistem (Opsional untuk testing)
Route::get('/status', function () {
    return response()->json([
        'status' => 'Online',
        'startup' => 'Vibra-Tech Indonesia',
        'location' => 'Batam Industrial Park'
    ]);
});