<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * Secara default Laravel akan mencari tabel bernama 'sensor_logs'.
     */
    protected $table = 'sensor_logs';

    /**
     * Properti $fillable menentukan kolom mana saja yang boleh diisi secara massal.
     * Ini SANGAT PENTING agar data dari API ESP32 bisa masuk ke database.
     */
    protected $fillable = [
        'nama_mesin',
        'getaran',
        'suhu',
        'status',
        'catatan',
    ];

    /**
     * Casting atribut ke tipe data tertentu.
     * Memastikan getaran dan suhu selalu dibaca sebagai angka desimal (float).
     */
    protected $casts = [
        'getaran' => 'float',
        'suhu' => 'float',
        'created_at' => 'datetime',
    ];
}
