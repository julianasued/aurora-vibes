<?php

namespace App\Http\Controllers;

use App\Models\MenuSemanal;
use Illuminate\Http\Request;

class MenuSemanalController extends Controller
{
    public function index()
    {
        $menus = MenuSemanal::with('user')->get();
        return view('menu_semanal.index', compact('menus'));
    }

    public function create()
    {
        return view('menu_semanal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'dia_semana' => 'required|date',
            'pratro_principal' => 'required',
            'guarnicao' => 'required',
            'acompanhamento' => 'required',
            'sobremesa' => 'required',
            'salada' => 'required',
            'vegetariano' => 'required',
        ]);

        MenuSemanal::create($validated);

        return redirect()->route('menu_semanal.index')->with('success', 'Menu cadastrado com sucesso!');
    }
}
