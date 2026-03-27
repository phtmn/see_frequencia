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
        Schema::create('prices', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Relacionamento com a tabela users
            $table->unsignedBigInteger('product_id'); // Relacionamento com a tabela products
            $table->date('datetime');
            $table->decimal('price', 10, 2); // Preço mínimo
            $table->char('acquisition', 1); // S ou N
            //$table->decimal('pricemin', 10, 2); // Preço mínimo
            //$table->decimal('pricemax', 10, 2); // Preço máximo
            $table->timestamps(); // Campos created_at e updated_at
            $table->softDeletes(); // Exclusão lógica

            // Definição de chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key para a tabela users
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
};
