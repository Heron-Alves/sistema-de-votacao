<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enquete;
use Carbon\Carbon;

class EnqueteSeeder extends Seeder
{
    public function run(): void
    {
        $agendada = Enquete::create([
            'titulo' => 'Enquete Agendada',
            'inicio' => Carbon::now()->addDay(),
            'fim'    => Carbon::now()->addDays(2),
        ]);
        $this->criarOpcoes($agendada);

        $andamento = Enquete::create([
            'titulo' => 'Enquete Em Andamento',
            'inicio' => Carbon::now()->subHour(),
            'fim'    => Carbon::now()->addHour(),
        ]);
        $this->criarOpcoes($andamento);

        $finalizada = Enquete::create([
            'titulo' => 'Enquete Finalizada',
            'inicio' => Carbon::now()->subDays(2),
            'fim'    => Carbon::now()->subDay(),
        ]);
        $this->criarOpcoes($finalizada);
    }

    private function criarOpcoes(Enquete $enquete)
    {
        $opcoes = ['Opção A', 'Opção B', 'Opção C'];
        foreach ($opcoes as $texto) {
            $enquete->opcoes()->create(['texto' => $texto, 'votos' => 0]);
        }
    }
}
