<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * * Sesuai dengan spesifikasi startup Vibra-Tech, tabel ini 
     * menyimpan data anomali mesin di industri Batam.
     */
    public function up(): void
    {
        Schema::create('sensor_logs', function (Blueprint $table) {
            $table->id();
            
            // Nama atau ID Mesin yang dipantau (Misal: Mesin CNC 01)
            $table->string('nama_mesin'); 
            
            // Data Getaran dari sensor ADXL345 (Satuan Hz atau m/s^2)
            $table->float('getaran'); 
            
            // Data Suhu dari sensor DS18B20 (Satuan Celcius)
            $table->float('suhu'); 
            
            // Status kondisi: 'Normal', 'Warning', atau 'Critical'
            $table->string('status'); 
            
            // Keterangan tambahan (Opsional, misal: "Lokasi Muka Kuning")
            $table->text('catatan')->nullable(); 
            
            // timestamps akan otomatis membuat kolom 'created_at' dan 'updated_at'
            // 'created_at' digunakan sebagai penanda waktu (log time) sensor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_logs');
    }
};