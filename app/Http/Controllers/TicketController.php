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

    public function comprar(Request $request, Ticket $ticket)
    {
        // Verificar se o ticket ainda está disponível
        if ($ticket->quantidade < 1) {
            return redirect()->back()->withErrors('Ticket esgotado.');
        }

        // Verificar a validade do ticket
        if ($ticket->vencimento < now()) {
            return redirect()->back()->withErrors('Ticket expirado.');
        }

        // Verificar se o aluno tem saldo suficiente
        $user = Auth::user();
        if ($user->saldo < $ticket->amount) {
            return redirect()->back()->withErrors('Saldo insuficiente.');
        }

        // Verificar se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Você precisa estar logado para realizar a compra.');
        }
        
        // Depuração: Verifique se Auth::user() está retornando o usuário
        $user = Auth::user();
        dd($user);  // Isso deve mostrar as informações do usuário logado

        // Descontar o saldo do usuário e salvar a compra
        $user->saldo -= $ticket->amount;
        $user->save();

        // Descontar um ticket do estoque
        $ticket->quantidade -= 1;
        $ticket->save();

        // Registrar a compra na tabela de transações
        Compra::create([
            'user_id'    => $user->id,
            'ticket_id'  => $ticket->id,
            'quantidade' => 1,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Compra realizada com sucesso!');
    }

    protected function verificarDisponibilidade(Ticket $ticket)
    {
        if ($ticket->quantidade < 1){
            return false;
        }
        return true;
        //return $ticket->quantidade > 0;
    }

    protected function verificarSaldo(User $user, Ticket $ticket)
    {
        if ($user->saldo < $ticket->valor){
            return false;
        }
        return true;
        //return $user->saldo >= $ticket->amount;
    }
}
