<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filme extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'genero',
        'duracao',
        'classificacao',
        'poster',
        'nota'
    ];

    public function sessoes()
    {
        return $this->hasMany(Sessao::class);
    }

    public function ficha()
    {
        return $this->hasOne(Ficha::class);
    }
}
