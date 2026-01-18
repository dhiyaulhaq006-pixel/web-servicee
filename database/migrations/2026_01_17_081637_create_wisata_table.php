<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id(); // primary key auto-increment
            $table->string('wisata_id')->unique(); // kode unik wisata
            $table->string('name'); // nama wisata
            $table->string('slug')->unique(); // slug untuk URL
            $table->string('province_slug'); // slug provinsi
            $table->string('image')->nullable(); // path gambar
            $table->text('description')->nullable(); // deskripsi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};
