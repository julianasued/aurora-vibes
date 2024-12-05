<?php

namespace App\Http\Controllers;

use App\Models\MenuSemanal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuSemanalController extends Controller
{
    public function index()
    {
        $pratos = MenuSemanal::orderBy('dia_da_semana')->get();

        return view('menu_semanal.index', compact('pratos'));
    }

    public function create()
    {
        return view('menu_semanal.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        $validated = $request->validate([
            'dia_da_semana' => 'nullable|in:segunda,terca,quarta,quinta,sexta,sabado,domingo',
            'prato_principal' => 'nullable|string|max:255',
            'guarnicao' => 'nullable|string|max:255',
            'acompanhamentos' => 'nullable|string',
            'sobremesa' => 'nullable|string|max:255',
            'salada' => 'nullable|string|max:255',
            'vegetariano' => 'nullable|string|max:255',
            'data_inicio' => 'nullable|date',
            'data_fim' => 'nullable|date',
        ]);

        $validated['data_inicio'] = Carbon::parse($validated['data_inicio'])->startOfDay();
        $validated['data_fim'] = Carbon::parse($validated['data_fim'])->endOfDay();

        MenuSemanal::create($validated);

        return redirect()->route('menu_semanal.index')->with('success', 'Menu cadastrado com sucesso!');
    }

    public function cardapio()
    {
        $hoje = Carbon::now();

        // Obter o cardápio da semana atual
        $cardapios = MenuSemanal::whereDate('data_inicio', '<=', $hoje)
            ->whereDate('data_fim', '>=', $hoje)
            ->orderBy('dia_da_semana')
            ->get();

        return view('menu_semanal.cardapio', compact('cardapios'));
    }

    public function destroy($id)
    {
        $prato = MenuSemanal::findOrFail($id);
        $prato->delete();

        return redirect()->route('menu_semanal.index')->with('success', 'Prato excluído com sucesso!');
    }
}
