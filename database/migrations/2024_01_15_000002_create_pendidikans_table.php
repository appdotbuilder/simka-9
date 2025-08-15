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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique()->comment('Kode unik pendidikan');
            $table->string('nama_pendidikan', 100)->comment('Nama tingkat pendidikan');
            $table->integer('urut')->default(0)->comment('Urutan tampil');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->comment('Status data');
            $table->timestamps();
            
            // Indexes for performance
            $table->index('kode');
            $table->index('status');
            $table->index(['status', 'urut']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};