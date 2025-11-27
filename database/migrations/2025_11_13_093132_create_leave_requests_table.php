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
            // Changed to standard $table->id() for Eloquent consistency.
            // If you keep it as $table->id('leaverequest_id'), you must define 
            // protected $primaryKey = 'leaverequest_id'; in the LeaveRequest model.
            $table->id(); 
            $table->string('nama_mahasiswa'); 
            $table->string('nim'); 
            $table->string('nama_izin')->nullable(); 
            $table->date('tanggal_awal_izin');
            $table->date('tanggal_akhir_izin');
            $table->enum('jenis_izin', ['sakit', 'izin', 'other']);
            $table->text('alasan_izin');
            $table->enum('status_izin', ['pending', 'rejected', 'approved'])->default('pending');

            // FIX: This adds 'created_at' and 'updated_at' columns.
            $table->timestamps(); 
            
            // REMOVED: $table->rememberToken(); (Not needed on this table)
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