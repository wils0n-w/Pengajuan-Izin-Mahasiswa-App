<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = [
        'name',
        'nama_izin',
        'tanggal_awal_izin', 
        'tanggal_akhir_izin',
        'jenis_izin',
        'alasan_izin',
        'status_izin' 
    ];

    
    protected $attributes = [
        'status_izin' => 'pending',
    ];

    protected $table = 'leave_requests';
}
