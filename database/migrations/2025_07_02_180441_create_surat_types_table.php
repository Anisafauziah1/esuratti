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
        Schema::create('surat_types', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama jenis surat, misal: Surat Pengantar
            $table->string('template_view'); // Nama blade template, misal: surat_templates.pengantar
            $table->json('persyaratan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_types');
    }
};
