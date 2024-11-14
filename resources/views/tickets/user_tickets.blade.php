@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="card mb-4 shadow-sm">
        <div class="card-body text-center">
            <h4 class="card-title text-primary mb-3">Saldo Atual</h4>
            <p class="card-text display-6">
                <strong>R$ {{ number_format($saldoAtual, 2, ',', '.') }}</strong>
            </p>
        </div>
    </div>

    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Minhas Compras de Tickets</h3>
        </div>
        <div class="card-body">
            @if ($compras->count() > 0)
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Título do Ticket</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Quantidade Comprada</th>
                            <th scope="col">Total Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                            <tr>
                                <td>{{ $compra->ticket->titulo }}</td>
                                <td>{{ $compra->ticket->descricao }}</td>
                                <td>{{ $compra->quantidade_comprada }}</td>
                                <td>R$ {{ number_format($compra->total, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Paginação -->
                <div class="d-flex justify-content-center">
                    {{ $compras->links() }}
                </div>
            @else
                <p class="alert alert-warning text-center mb-0">Você ainda não comprou nenhum ticket.</p>
            @endif
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Extrato de Uso de Tickets</h3>
        </div>
        <div class="card-body">
            @if ($extratos->count() > 0)
                <table class="table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Título do Ticket</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data de Uso</th>
                            <th scope="col">Valor do Ticket</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($extratos as $extrato)
                            <tr>
                                <td>{{ $extrato->ticket->titulo }}</td>
                                <td>{{ $extrato->ticket->descricao }}</td>
                                <td>{{ \Carbon\Carbon::parse($extrato->data_uso)->format('d/m/Y') }}</td>
                                <td>R$ {{ number_format($extrato->ticket->amount, 2, ',', '.') }}</td>
                                <td>{{ ucfirst($extrato->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Paginação -->
                <div class="d-flex justify-content-center">
                    {{ $extratos->links() }}
                </div>
            @else
                <p class="alert alert-warning text-center mb-0">Você ainda não tem nenhum uso registrado.</p>
            @endif
        </div>
    </div>
</div>
@endsection
