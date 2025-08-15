<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendidikans = [
            ['kode' => 'SD', 'nama_pendidikan' => 'Sekolah Dasar', 'urut' => 1, 'status' => 'aktif'],
            ['kode' => 'SMP', 'nama_pendidikan' => 'Sekolah Menengah Pertama', 'urut' => 2, 'status' => 'aktif'],
            ['kode' => 'SMA', 'nama_pendidikan' => 'Sekolah Menengah Atas', 'urut' => 3, 'status' => 'aktif'],
            ['kode' => 'D1', 'nama_pendidikan' => 'Diploma 1', 'urut' => 4, 'status' => 'aktif'],
            ['kode' => 'D2', 'nama_pendidikan' => 'Diploma 2', 'urut' => 5, 'status' => 'aktif'],
            ['kode' => 'D3', 'nama_pendidikan' => 'Diploma 3', 'urut' => 6, 'status' => 'aktif'],
            ['kode' => 'S1', 'nama_pendidikan' => 'Sarjana (S1)', 'urut' => 7, 'status' => 'aktif'],
            ['kode' => 'S2', 'nama_pendidikan' => 'Magister (S2)', 'urut' => 8, 'status' => 'aktif'],
            ['kode' => 'S3', 'nama_pendidikan' => 'Doktor (S3)', 'urut' => 9, 'status' => 'aktif'],
        ];

        foreach ($pendidikans as $pendidikan) {
            Pendidikan::firstOrCreate(['kode' => $pendidikan['kode']], $pendidikan);
        }
    }
}