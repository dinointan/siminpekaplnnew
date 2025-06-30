<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mutasi.', function (Blueprint $table) {
            $table->foreignId('id_perabotan')->nullable()->constrained('perabotans')->onDelete('cascade');
            $table->foreignId('id_lokasi')->nullable()->constrained('lokasis')->onDelete('cascade');
            $table->foreignId('id_pengguna')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('tanggal_mutasi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->default('pending');
            $table->string('kode_mutasi')->unique()->nullable();
            $table->string('alasan_mutasi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('mutasi_perabotans', function (Blueprint $table) {
            $table->dropColumn([
                'id_perabotan',
                'id_lokasi',
                'id_pengguna',
                'tanggal_mutasi',
                'keterangan',
                'status',
                'kode_mutasi',
                'alasan_mutasi',
            ]);
        });
    }
};
