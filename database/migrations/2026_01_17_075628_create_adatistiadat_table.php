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
        Schema::create('adatistiadat', function (Blueprint $table) {
            $table->id();

            // kolom tambahan
            $table->string('adat_id')->unique();      // kode unik adat istiadat
            $table->string('name');                   // nama adat istiadat
            $table->string('image')->nullable();      // path gambar (boleh kosong)
            $table->text('description')->nullable();  // deskripsi (boleh kosong)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adatistiadat');
    }
};
