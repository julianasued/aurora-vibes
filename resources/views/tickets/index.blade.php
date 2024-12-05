@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-start mb-3">
            <a href="{{ route('tickets.create') }}" class="btn btn-success me-2">+ Cadastrar Novo Ticket</a>
            <a href="{{ route('prad.validarUsos') }}" class="btn btn-primary">Validar Tickets</a>
        </div>
        
        <!-- Cabeçalho -->
        <div class="card shadow-lg mb-4">
            <div class="card-header bg-primary text-white text-center">
                <h3>Gerenciamento de Tickets</h3>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($tickets->count() > 0)
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <table class="table table-striped text-center">
                        <thead class="table-primary">
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
                                        {{-- <a href="{{ route('tickets.editTicket', $ticket->id) }}"
                                            class="btn btn-warning btn-sm">Editar</a> --}}
                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Tem certeza que deseja remover este ticket?')"><i class="bi bi-trash"></i> Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $tickets->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">
                Nenhum ticket cadastrado até o momento.
            </div>
        @endif
    </div>
@endsection