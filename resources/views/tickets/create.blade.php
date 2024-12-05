@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <!-- Título -->
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Cadastro de Tickets</h3>
                </div>

                <!-- Formulário -->
                <div class="card-body">
                    <form action="{{ route('tickets.store') }}" method="POST">
                        @csrf

                        <!-- Campo Título -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Insira o título" required>
                        </div>

                        <!-- Campo Descrição -->
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Insira a descrição" required></textarea>
                        </div>

                        <!-- Campo Vencimento -->
                        <div class="mb-3">
                            <label for="vencimento" class="form-label">Vencimento:</label>
                            <input type="date" class="form-control" name="vencimento" id="vencimento" required>
                        </div>

                        <!-- Campo Quantidade -->
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade:</label>
                            <input type="number" class="form-control" name="quantidade" id="quantidade" placeholder="Insira a quantidade" required>
                        </div>

                        <!-- Campo Valor -->
                        <div class="mb-4">
                            <label for="amount" class="form-label">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" class="form-control" id="amount" name="amount" step="0.01" placeholder="Insira o valor" required>
                            </div>
                        </div>

                        <!-- Botões Centralizados -->
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Voltar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection