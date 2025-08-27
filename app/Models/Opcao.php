<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcao extends Model
{
    use HasFactory;

    protected $fillable = ['enquete_id', 'texto', 'votos'];
    protected $hidden = ['enquete'];


    public function enquete()
    {
        return $this->belongsTo(Enquete::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }
}
