@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Compra de Ticket</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('tickets.atualizar-compra', $alunoTicket->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título do Ticket</label>
            <input type="text" class="form-control" id="titulo" value="{{ $alunoTicket->ticket->titulo }}" readonly>
        </div>

        <div class="form-group">
            <label for="quantidade_comprada">Quantidade Comprada</label>
            <input type="number" name="quantidade_comprada" class="form-control"
                value="{{ $alunoTicket->quantidade_comprada }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="total">Total Atual</label>
            <input type="text" class="form-control" id="total"
                value="R$ {{ number_format($alunoTicket->total, 2, ',', '.') }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Compra</button>
    </form>
</div>
@endsection
