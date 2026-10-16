<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->decimal('nota', 3, 1)->default(0);
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('quantidade_vendida')->default(0);
        });

        Schema::table('ingressos', function (Blueprint $table) {
            $table->date('data_venda')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->dropColumn('nota');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('quantidade_vendida');
        });

        Schema::table('ingressos', function (Blueprint $table) {
            $table->dropColumn('data_venda');
        });
    }
};
