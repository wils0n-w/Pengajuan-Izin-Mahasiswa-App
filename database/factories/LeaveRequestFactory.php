<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_mahasiswa' => $this->faker->name(),
            'nim' => $this->faker->unique()->numerify('##########'),
            'phone_number' => '082162739975',
            'nama_izin' => $this->faker->randomElement(['Sakit', 'Izin', 'Lainnya']),
            'tanggal_awal_izin' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'tanggal_akhir_izin' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'jenis_izin' => $this->faker->randomElement(['sakit', 'izin', 'other']),
            'alasan_izin' => $this->faker->sentence(),
            'status_izin' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
