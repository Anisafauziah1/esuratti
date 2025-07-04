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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pegawai
            $table->foreignId('surat_type_id')->constrained()->onDelete('cascade'); // jenis surat
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->string('file_surat_pengantar')->nullable(); // hasil file surat PDF
            $table->text('keterangan')->nullable(); // optional: alasan ditolak atau catatan admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
