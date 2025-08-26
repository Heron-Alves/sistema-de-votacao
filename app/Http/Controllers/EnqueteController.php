<?php

namespace App\Http\Controllers;

use App\Models\Enquete;
use App\Models\Opcao;
use Illuminate\Http\Request;

class EnqueteController extends Controller
{
    public function index()
    {
        $enquetes = Enquete::with('opcoes')->get();
        return view('enquetes.index', compact('enquetes'));
    }

    public function create()
    {
        return view('enquetes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'inicio' => 'required|date',
            'fim'    => 'required|date|after:inicio',
            'opcoes' => 'required|array|min:3',
        ]);

        $enquete = Enquete::create([
            'titulo' => $request->titulo,
            'inicio' => \Carbon\Carbon::parse($request->inicio),
            'fim'    => \Carbon\Carbon::parse($request->fim),
        ]);

        foreach ($request->opcoes as $texto) {
            $enquete->opcoes()->create(['texto' => $texto]);
        }

        return redirect()->route('enquetes.index')->with('success', 'Enquete criada com sucesso!');
    }

    public function update(Request $request, Enquete $enquete)
    {
        $request->validate([
            'titulo' => 'required',
            'inicio' => 'required|date',
            'fim'    => 'required|date|after:inicio',
            'opcoes' => 'required|array|min:3',
        ]);

        $enquete->update([
            'titulo' => $request->titulo,
            'inicio' => \Carbon\Carbon::parse($request->inicio),
            'fim'    => \Carbon\Carbon::parse($request->fim),
        ]);

        $enquete->opcoes()->delete();
        foreach ($request->opcoes as $texto) {
            $enquete->opcoes()->create(['texto' => $texto]);
        }

        return redirect()->route('enquetes.index')->with('success', 'Enquete atualizada com sucesso!');
    }

}
