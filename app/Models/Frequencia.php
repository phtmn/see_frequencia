<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = ['aula_id', 'user_id', 'latitude_aluno', 'longitude_aluno', 'distancia_metros', 'ip_address'];

    public function aluno()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
