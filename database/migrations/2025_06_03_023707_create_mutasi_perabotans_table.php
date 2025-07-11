<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('mutasi_perabotans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perabotan')->nullable()->constrained('perabotans')->onDelete('cascade');
            $table->foreignId('id_lokasi')->nullable()->constrained('lokasis')->onDelete('cascade');
            $table->foreignId('id_pengguna')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('tanggal_mutasi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->default('pending');
            $table->string('kode_mutasi')->unique()->nullable();
            $table->string('alasan_mutasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mutasi_perabotans');
    }
};
