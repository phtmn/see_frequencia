<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('frequencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained('aulas')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Aluno
            $table->decimal('latitude_aluno', 10, 8);
            $table->decimal('longitude_aluno', 11, 8);
            $table->float('distancia_metros')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            // Garante que o aluno não assine a mesma aula duas vezes
            $table->unique(['aula_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequencias');
    }
};
