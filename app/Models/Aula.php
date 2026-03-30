<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos via formulário
    protected $fillable = ['titulo', 'professor_id', 'is_ativa', 'latitude', 'longitude', 'data_aula'];

    // Relacionamento: Uma aula pertence a um Professor (User)
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    // Relacionamento: Uma aula pode ter várias frequências
    public function frequencias()
    {
        return $this->hasMany(Frequencia::class);
    }
}