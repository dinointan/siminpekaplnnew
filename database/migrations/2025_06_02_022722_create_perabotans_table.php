<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perabotans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->year('tahun_pengadaan');
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('lokasi_id')->nullable()->constrained('lokasis')->onDelete('set null');


            //$table->foreignId('id_lokasi')->constrained('lokasis')->onDelete('cascade');//

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perabotans');
    }
};
