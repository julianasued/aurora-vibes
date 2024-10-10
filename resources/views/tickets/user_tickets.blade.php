@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Compras de Tickets</h1>

    <!-- Exibir o saldo atual -->
    <div class="alert alert-info">
        <strong>Saldo Atual: </strong> R$ {{ number_format($user->saldo, 2, ',', '.') }}
    </div>

    @if ($compras->count() > 0)
        <!-- Tabela para exibir as compras de tickets -->
        <table class="table">
            <thead>
                <tr>
                    <th>Título do Ticket</th>
                    <th>Descrição</th>
                    <th>Quantidade Comprada</th>
                    <th>Total Pago</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->ticket->titulo }}</td>
                        <td>{{ $compra->ticket->descricao }}</td>
                        <td>{{ $compra->quantidade_comprada }}</td>
                        <td>R$ {{ number_format($compra->total, 2, ',', '.') }}</td>
                        <td>{{ ucfirst($compra->status) }}</td> <!-- Exibe "Pendente" ou "Validado" -->
                        {{-- <td>
                            <a href="{{ route('tickets.editar', $compra->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="d-flex justify-content-center">
            {{ $compras->links() }}
        </div>
    @else
        <p class="alert alert-warning">Você ainda não comprou nenhum ticket.</p>
    @endif
</div>
    @include('includes.scripts')
@endsection

