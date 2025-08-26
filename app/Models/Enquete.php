<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'inicio', 'fim'];

    protected $casts = [
        'inicio' => 'datetime',
        'fim'    => 'datetime',
    ];

    public function opcoes()
    {
        return $this->hasMany(Opcao::class);
    }

    public function getStatusAttribute()
    {
        $now = now();

        if ($now->lt($this->inicio)) {
            return 'Agendada';
        } elseif ($now->between($this->inicio, $this->fim)) {
            return 'Em andamento';
        }

        return 'Finalizada';
    }



}
