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
        $tickets = Ticket::paginate(10);
        
        return view('tickets.index', compact('tickets'));
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
    public function edit($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket não encontrado.');
        }

        return view('tickets.editTicket', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:1',
            'vencimento' => 'required|date',
        ]);

        $ticket = Ticket::find($id);

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket não encontrado.');
        }

        $ticket->update($validatedData);

        return redirect()->route('tickets.index', $ticket->id)->with('success', 'Ticket atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Item não encontrado.'], 404);
        }

        try {
            $ticket->delete();
            return redirect()->route('tickets.index')->with('success', 'Ticket removido com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('tickets.index')->with('error', 'Erro ao remover o ticket.');
        }
    }

    public function destroyPurchase(string $id)
    {
        $ticket = AlunoTicket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Item não encontrado.'], 404);
        }

        try {
            $ticket->delete();
            return redirect()->route('tickets.informacoes-pessoais')->with('success', 'Ticket removido com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('tickets.informacoes-pessoais')->with('error', 'Erro ao remover o ticket.');
        }
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

    public function editPurchase($id)
    {
        $alunoTicket = AlunoTicket::find($id);

        if (!$alunoTicket || $alunoTicket->status != 'pendente') {
            return redirect()->back()->with('error', 'A compra não pode ser editada porque já foi validada ou não existe.');
        }

        return view('tickets.edit', compact('alunoTicket'));
    }

    public function updatePurchase(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantidade_comprada' => 'required|integer|min:1',
        ]);

        $alunoTicket = AlunoTicket::find($id);

        if (!$alunoTicket || $alunoTicket->status != 'pendente') {
            return redirect()->back()->with('error', 'A compra não pode ser editada porque já foi validada ou não existe.');
        }

        $ticket = $alunoTicket->ticket;
        $quantidadeDiferenca = $validatedData['quantidade_comprada'] - $alunoTicket->quantidade_comprada;

        if ($ticket->quantidade < $quantidadeDiferenca) {
            return redirect()->back()->with('error', 'Não há tickets suficientes disponíveis.');
        }

        $ticket->quantidade -= $quantidadeDiferenca;
        $ticket->save();

        $alunoTicket->quantidade_comprada = $validatedData['quantidade_comprada'];
        $alunoTicket->total = $ticket->amount * $validatedData['quantidade_comprada'];
        $alunoTicket->save();

        return redirect()->route('tickets.editar', $alunoTicket->id)->with('success', 'Compra atualizada com sucesso!');
    }

    public function showUserTickets()
    {
        $user = Auth::user();
        $compras = AlunoTicket::where('user_id', $user->id)
            ->with('ticket')
            ->paginate(10);

        return view('tickets.user_tickets', compact('user', 'compras'));
    }
}