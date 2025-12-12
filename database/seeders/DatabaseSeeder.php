<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        \App\Models\LeaveRequest::factory(5)->create();

        \App\Models\LeaveRequest::create([
            'nama_mahasiswa' => 'Wilson Winata',
            'nim' => '1234567890', // Dummy NIM
            'phone_number' => '082162739975',
            'nama_izin' => 'Izin Khusus', // Dummy name_izin
            'jenis_izin' => 'izin', // Dummy jenis_izin
            'tanggal_awal_izin' => now()->addDays(5), // Dummy start date
            'tanggal_akhir_izin' => now()->addDays(7), // Dummy end date
            'alasan_izin' => 'Menghadiri acara keluarga di luar kota.', // Dummy reason
            'status_izin' => 'pending', // Default status
        ]);
    }
}
