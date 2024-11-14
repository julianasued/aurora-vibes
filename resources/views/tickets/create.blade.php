@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro de Tickets</h2>
    <div class="mb-3 text-center">
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </div>
    <div class="card shadow-sm p-4">
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Insira o título" required>
            </div>
            <div class="form-group mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Insira a descrição" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="vencimento" class="form-label">Vencimento:</label>
                <input type="date" class="form-control" name="vencimento" id="vencimento" required>
            </div>
            <div class="form-group mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Insira a quantidade" required>
            </div>
            <div class="form-group mb-4">
                <label for="amount" class="form-label">Valor:</label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="number" class="form-control" id="amount" name="amount" step="0.01" placeholder="Insira o valor" required>
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>
@include('includes.scripts')
@endsection

