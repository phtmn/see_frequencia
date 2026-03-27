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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Relacionamento com a tabela users
            $table->string('product', 100); // Nome do produto (defina limite razoável)
            $table->integer('quantity')->unsigned(); // Quantidade — número inteiro e não negativo
            $table->string('unit', 10); // Unidade de medida (ex: Kg, L, Un, T, etc.)
            $table->string('type', 50); // Tipo (ex: In natura, Beneficiado, etc.)
            $table->string('availability', 50); // Disponibilidade (ex: disponível, esgotado, etc.)
            $table->timestamps();
            $table->softDeletes(); // Exclusão lógica

            // Relacionamento com usuários
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
