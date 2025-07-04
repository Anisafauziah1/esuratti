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
        Schema::create('pengajuan_persyaratans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->constrained()->onDelete('cascade');
            $table->string('nama_syarat'); // misal: Proposal, Surat Permohonan
            $table->enum('type', ['text', 'file','tanggal']);
            $table->text('isian')->nullable(); // jika text
            $table->string('file_path')->nullable(); // path file di storage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_persyaratans');
    }
};
