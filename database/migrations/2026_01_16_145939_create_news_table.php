<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            
            // type berita: province | custom | tour | culinary
            $table->enum('type', ['province', 'custom', 'tour', 'culinary']);

            // relasi ke province
            $table->foreignId('province_id')
                  ->nullable()
                  ->constrained('provinces')
                  ->onDelete('cascade');

            // image berita
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
