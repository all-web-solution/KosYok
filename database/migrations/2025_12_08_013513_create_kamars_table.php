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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar', 10)->unique();
            $table->string('nama_kamar', 100);
            $table->text('deskripsi')->nullable();
            $table->text('fasilitas')->nullable();
            $table->decimal('harga_3bulan', 10, 2);
            $table->decimal('harga_6bulan', 10, 2);
            $table->decimal('harga_1tahun', 10, 2);
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
