<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\AlunoTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'titulo' => 'required',
            'descricao' => 'required',
            'vencimento' => 'required',
            'quantidade' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
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

    public function showPurchasePage()
    {

        $tickets = Ticket::where('quantidade', '>', 0)->get();

        return view('tickets.purchase', compact('tickets'));
    }

    public function processPurchase(Request $request)
    {

        $validatedData = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'quantidade_comprada' => 'required|integer|min:1',
        ]);

        $ticket = Ticket::find($validatedData['ticket_id']);
        $user = Auth::user();


        if ($ticket->quantidade < $validatedData['quantidade_comprada']) {
            return redirect()->back()->with('error', 'Quantidade insuficiente de tickets disponíveis.');
        }

        $totalCompra = $ticket->amount * $validatedData['quantidade_comprada'];

        $ticket->quantidade -= $validatedData['quantidade_comprada'];
        $ticket->save();

        AlunoTicket::create([
            'user_id' => $user->id,
            'ticket_id' => $ticket->id,
            'quantidade_comprada' => $validatedData['quantidade_comprada'],
            'total' => $totalCompra,
            'status' => 'pendente',
        ]);

        return redirect()->route('tickets.comprar')->with('success', 'Compra realizada com sucesso!');
    }

    public function showPendingPurchases()
    {
        $pendentes = AlunoTicket::where('status', 'pendente')->get();

        return view('tickets.pending', compact('pendentes'));
    }

    public function validatePurchase($alunoTicketId)
    {
        $alunoTicket = AlunoTicket::find($alunoTicketId);

        if (!$alunoTicket) {
            return redirect()->back()->with('error', 'Compra não encontrada.');
        }

        if ($alunoTicket->status == 'validado') {
            return redirect()->back()->with('error', 'Compra já foi validada.');
        }

        $user = $alunoTicket->user;
        $totalCompra = $alunoTicket->total;

        if ($user->saldo < $totalCompra) {
            return redirect()->back()->with('error', 'Saldo insuficiente para validar esta compra.');
        }

        $user->saldo -= $totalCompra;
        $user->save();

        $alunoTicket->status = 'validado';
        $alunoTicket->save();

        return redirect()->back()->with('success', 'Compra validada com sucesso!');
    }
}