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
    Schema::create('contents', function (Blueprint $table) {
        $table->id();

        // FK ke provinces
        $table->foreignId('province_id')
              ->constrained('provinces')
              ->cascadeOnDelete();

        // kategori konten
        $table->enum('category', ['adat', 'kuliner', 'wisata']);

        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->string('image')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
