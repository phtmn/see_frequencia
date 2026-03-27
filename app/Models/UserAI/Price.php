<?php

namespace App\Models\UserAI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'datetime',
        'price',
        'acquisition',
        //'pricemax',
    ];

    protected $casts = [
        'datetime' => 'datetime',
        'price' => 'decimal:2',
        //'pricemax' => 'decimal:2',
    ];



    // Relacionamento com o produto (um preço pertence a um produto)
    public function product()
    {
        return $this->belongsTo(Product::class); // Relacionamento com a tabela 'products'
    }
}