<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ator extends Model
{
    use HasFactory;

    protected $table = 'atores';

    protected $fillable = [
        'nome',
        'nacionalidade',
        'data_nascimento',
        'foto',
    ];
}
