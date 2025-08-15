<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatans = [
            ['kode' => 'DIR001', 'kode_unit_kerja' => 'DIR', 'nama_jabatan' => 'Direktur Utama', 'status' => 'aktif', 'urut' => 1],
            ['kode' => 'DIR002', 'kode_unit_kerja' => 'DIR', 'nama_jabatan' => 'Direktur Operasional', 'status' => 'aktif', 'urut' => 2],
            ['kode' => 'SDM001', 'kode_unit_kerja' => 'SDM', 'nama_jabatan' => 'Manajer SDM', 'status' => 'aktif', 'urut' => 1],
            ['kode' => 'SDM002', 'kode_unit_kerja' => 'SDM', 'nama_jabatan' => 'Staff SDM', 'status' => 'aktif', 'urut' => 2],
            ['kode' => 'KEU001', 'kode_unit_kerja' => 'KEU', 'nama_jabatan' => 'Manajer Keuangan', 'status' => 'aktif', 'urut' => 1],
            ['kode' => 'KEU002', 'kode_unit_kerja' => 'KEU', 'nama_jabatan' => 'Staff Akuntansi', 'status' => 'aktif', 'urut' => 2],
            ['kode' => 'IT001', 'kode_unit_kerja' => 'IT', 'nama_jabatan' => 'IT Manager', 'status' => 'aktif', 'urut' => 1],
            ['kode' => 'IT002', 'kode_unit_kerja' => 'IT', 'nama_jabatan' => 'Programmer', 'status' => 'aktif', 'urut' => 2],
            ['kode' => 'IT003', 'kode_unit_kerja' => 'IT', 'nama_jabatan' => 'System Administrator', 'status' => 'aktif', 'urut' => 3],
        ];

        foreach ($jabatans as $jabatan) {
            Jabatan::firstOrCreate(['kode' => $jabatan['kode']], $jabatan);
        }
    }
}