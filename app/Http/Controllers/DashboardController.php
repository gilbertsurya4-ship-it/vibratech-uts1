<?php

namespace App\Http\Controllers;

use App\Models\SensorLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard Utama
     * Mengambil 10 data terbaru untuk ditampilkan di tabel.
     */
    public function index()
    {
        // Mengambil data terbaru berdasarkan waktu input
        $logs = SensorLog::orderBy('created_at', 'desc')->take(10)->get();

        // Menghitung ringkasan untuk widget dashboard
        $total_logs = SensorLog::count();
        $critical_count = SensorLog::where('status', 'Critical')->count();

        return view('dashboard', compact('logs', 'total_logs', 'critical_count'));
    }

    /**
     * API Endpoint untuk Hardware (ESP32)
     * Fungsi ini menerima data JSON dari sensor di pabrik.
     */
    public function storeApi(Request $request)
    {
        // 1. Validasi data yang masuk dari sensor
        $request->validate([
            'nama_mesin' => 'required',
            'getaran'    => 'required|numeric',
            'suhu'       => 'required|numeric',
        ]);

        // 2. Logika Penentuan Status Otomatis
        $status = 'Normal';
        if ($request->suhu > 70 || $request->getaran > 50) {
            $status = 'Critical';
        } elseif ($request->suhu > 50 || $request->getaran > 30) {
            $status = 'Warning';
        }

        // 3. Simpan ke Database MySQL
        $log = SensorLog::create([
            'nama_mesin' => $request->nama_mesin,
            'getaran'    => $request->getaran,
            'suhu'       => $request->suhu,
            'status'     => $status,
            'catatan'    => $request->catatan ?? 'Monitoring Rutin',
        ]);

        // 4. Kirim respon balik ke ESP32
        return response()->json([
            'success' => true,
            'message' => 'Data sensor berhasil diterima oleh server Vibra-Tech',
            'data'    => $log
        ], 201);
    }

    /**
     * Halaman Laporan Lengkap
     */
    public function report()
    {
        $all_logs = SensorLog::orderBy('created_at', 'desc')->paginate(20);
        return view('laporan', compact('all_logs'));
    }
}