<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agamas = [
            ['kode' => 'ISL', 'nama_agama' => 'Islam', 'urut' => 1, 'status' => 'aktif'],
            ['kode' => 'KRT', 'nama_agama' => 'Kristen', 'urut' => 2, 'status' => 'aktif'],
            ['kode' => 'KTL', 'nama_agama' => 'Katolik', 'urut' => 3, 'status' => 'aktif'],
            ['kode' => 'HND', 'nama_agama' => 'Hindu', 'urut' => 4, 'status' => 'aktif'],
            ['kode' => 'BDH', 'nama_agama' => 'Buddha', 'urut' => 5, 'status' => 'aktif'],
            ['kode' => 'KHU', 'nama_agama' => 'Khonghucu', 'urut' => 6, 'status' => 'aktif'],
        ];

        foreach ($agamas as $agama) {
            Agama::firstOrCreate(['kode' => $agama['kode']], $agama);
        }
    }
}