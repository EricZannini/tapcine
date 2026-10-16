<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('nacionalidade', 60);
            $table->date('data_nascimento');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atores');
    }
};
