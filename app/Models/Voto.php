<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = ['opcao_id', 'ip'];

    public function opcao()
    {
        return $this->belongsTo(Opcao::class);
    }
}
