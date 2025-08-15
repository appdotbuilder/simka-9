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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique()->comment('Kode unik jabatan');
            $table->string('kode_unit_kerja', 10)->comment('Kode unit kerja reference');
            $table->string('nama_jabatan', 150)->comment('Nama jabatan');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->comment('Status data');
            $table->integer('urut')->default(0)->comment('Urutan tampil');
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('kode_unit_kerja')->references('kode')->on('unit_kerjas')->onDelete('cascade');
            
            // Indexes for performance
            $table->index('kode');
            $table->index('kode_unit_kerja');
            $table->index('status');
            $table->index(['status', 'urut']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};