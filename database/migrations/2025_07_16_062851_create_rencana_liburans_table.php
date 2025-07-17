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
        Schema::create('rencana_liburans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rencana');
            $table->string('destinasi');
            $table->date('tgl_berangkat');
            $table->date('tgl_pulang');
            $table->decimal('estimasi_biaya', 15, 2);
            $table->text('catatan')->nullable();
            $table->enum('status', ['aktif', 'selesai'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_liburans');
    }
};
