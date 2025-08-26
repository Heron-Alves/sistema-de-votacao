<?php

namespace App\Http\Controllers;

use App\Models\Opcao;
use Illuminate\Http\Request;

class VotoController extends Controller
{
    public function votar(Opcao $opcao, Request $request)
    {
        $opcao->increment('votos');

        $opcao->votos()->create(['ip' => $request->ip()]);

        if ($request->ajax()) {
            return response()->json([
                'id'    => $opcao->id,
                'texto' => $opcao->texto,
                'votos' => $opcao->votos,
            ]);
        }

        return back()->with('success', 'Voto registrado com sucesso!');
    }

}
