<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama_izin');
            $table->date('tanggal_awal_izin');
            $table->date('tanggal_akhir_izin');
            $table->enum('jenis_izin', ['sakit', 'izin', 'other']);
            $table->text('alasan_izin');
            $table->enum('status_izin', ['pending', 'rejected', 'accepted']);

            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
