<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{  
    use HasFactory;
    
    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'phone_number',
        'nama_izin',
        'tanggal_awal_izin',
        'tanggal_akhir_izin',
        'jenis_izin',
        'alasan_izin',
        'status_izin',
    ];
    
    protected $table = 'leave_requests';

}
