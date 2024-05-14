<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbearia extends Model
{
    protected $table = 'barbearias';
    protected $fillable = ['nome', 'rua', 'bairro'];
}
