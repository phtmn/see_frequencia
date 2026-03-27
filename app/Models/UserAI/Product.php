<?php

namespace App\Models\UserAI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',      // ID do usuário associado
        'product',      // Produto selecionado
        'quantity',       // Quantidade
        'unit',         // Unidade
        'type',         // Tipo
        'availability', // Disponibilidade
    ];
    
}
