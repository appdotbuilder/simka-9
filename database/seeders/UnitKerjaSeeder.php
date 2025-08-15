<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit_kerjas = [
            ['kode' => 'DIR', 'nama_unit' => 'Direktorat', 'urut' => 1, 'status' => 'aktif'],
            ['kode' => 'SDM', 'nama_unit' => 'Sumber Daya Manusia', 'urut' => 2, 'status' => 'aktif'],
            ['kode' => 'KEU', 'nama_unit' => 'Keuangan', 'urut' => 3, 'status' => 'aktif'],
            ['kode' => 'OPS', 'nama_unit' => 'Operasional', 'urut' => 4, 'status' => 'aktif'],
            ['kode' => 'IT', 'nama_unit' => 'Teknologi Informasi', 'urut' => 5, 'status' => 'aktif'],
            ['kode' => 'HRD', 'nama_unit' => 'Human Resource Development', 'urut' => 6, 'status' => 'aktif'],
        ];

        foreach ($unit_kerjas as $unit_kerja) {
            UnitKerja::firstOrCreate(['kode' => $unit_kerja['kode']], $unit_kerja);
        }
    }
}