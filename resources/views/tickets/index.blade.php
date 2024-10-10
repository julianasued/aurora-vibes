@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gerenciamento de Tickets</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('tickets.create') }}" class="btn btn-success">Cadastrar Novo Ticket</a>
            <a href="{{ route('tickets.pendentes') }}" class="btn btn-primary">Validar Tickets</a>
        </div>

        @if ($tickets->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Quantidade Disponível</th>
                        <th>Vencimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->titulo }}</td>
                            <td>{{ $ticket->descricao }}</td>
                            <td>R$ {{ number_format($ticket->amount, 2, ',', '.') }}</td>
                            <td>{{ $ticket->quantidade }}</td>
                            <td>{{ \Carbon\Carbon::parse($ticket->vencimento)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('tickets.editTicket', $ticket->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja remover este ticket?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $tickets->links() }}
            </div>
        @else
            <p class="alert alert-warning">Nenhum ticket cadastrado até o momento.</p>
        @endif
    </div>
@endsection
