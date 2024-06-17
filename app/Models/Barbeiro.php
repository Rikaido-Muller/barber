<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbeiro extends Model
{
    use HasFactory;
    
    protected $table = 'barbeiros';
    protected $fillable = ['nome', 'telefone', 'email', 'id_barbearia'];

    public function barbearia() {
        return $this->belongsTo(Barbearia::class, 'id_barbearia');
    
    }

}
