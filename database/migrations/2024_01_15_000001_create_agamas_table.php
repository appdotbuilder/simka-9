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
        Schema::create('agamas', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique()->comment('Kode unik agama');
            $table->string('nama_agama', 100)->comment('Nama agama');
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
        Schema::dropIfExists('agamas');
    }
};