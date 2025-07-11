<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mutasi_perabotans', function (Blueprint $table) {
            $table->foreignId('lokasi_awal')->nullable()->constrained('lokasis')->after('id_perabotan');
            $table->foreignId('lokasi_tujuan')->nullable()->constrained('lokasis')->after('lokasi_awal');
        });
    }

    public function down(): void
    {
        Schema::table('mutasi_perabotans', function (Blueprint $table) {
            $table->dropForeign(['lokasi_awal']);
            $table->dropForeign(['lokasi_tujuan']);
            $table->dropColumn(['lokasi_awal', 'lokasi_tujuan']);
        });
    }
};
