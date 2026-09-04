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
        Schema::create('fichas', function (Blueprint $table) {
            $table->id();
            // filme_id UNIQUE = garante o relacionamento 1:1 (um filme, uma ficha)
            $table->foreignId('filme_id')->unique()->constrained('filmes')->onDelete('cascade');
            $table->string('diretor', 100);
            $table->string('ano', 4);
            $table->text('sinopse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichas');
    }
};
