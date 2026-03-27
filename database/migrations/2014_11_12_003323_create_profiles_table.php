<?php

use App\Models\User;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);          
            $table->string('whatsapp')->nullable();      
            $table->string('cpf')->nullable();
            $table->string('birthdate')->nullable(); // Ou string se for salvar como texto e formatar na view
            $table->string('address_street')->nullable();
            $table->string('address_district')->nullable();
            $table->string('address_zipcode')->nullable();
            $table->string('address_city')->nullable();
            $table->string('num_caf')->nullable();
            $table->string('num_car')->nullable();
            $table->string('caf_file')->nullable(); // Para armazenar o nome do arquivo CAF
            $table->string('car_file')->nullable(); // Para armazenar o nome do arquivo CAR         
            $table->timestamp('email_verified_at')->nullable();            
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};