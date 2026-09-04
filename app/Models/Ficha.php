<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'fichas';

    protected $fillable = [
        'filme_id',
        'diretor',
        'ano',
        'sinopse'
    ];

    public function filme()
    {
        return $this->belongsTo(Filme::class);
    }
}
