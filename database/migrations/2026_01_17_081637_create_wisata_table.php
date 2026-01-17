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
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();

            // kolom tambahan
            $table->string('wisata_id')->unique();   // kode unik wisata
            $table->string('name');                  // nama wisata
            $table->string('image')->nullable();     // path gambar (boleh kosong)
            $table->text('description')->nullable(); // deskripsi (boleh kosong)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};
