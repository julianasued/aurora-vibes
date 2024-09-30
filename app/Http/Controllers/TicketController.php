<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo'      => 'required',
            'descricao'   => 'required',
            'vencimento'  => 'required',
            'quantidade'  => 'required',
            'amount'      => 'required',
            'user_id'     => 'required',
        ]);

        Ticket::create($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Ticket criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function verificarDisponibilidade(Ticket $ticket)
    {
        return $ticket->quantidade > 0;
    }

    protected function verificarSaldo(User $user, Ticket $ticket)
    {
        return $user->saldo >= $ticket->amount;
    }
}
