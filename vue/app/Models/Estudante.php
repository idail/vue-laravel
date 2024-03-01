<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;
    protected $table = "estudante";
    public $timestamps = false; 

    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
  ];
}
