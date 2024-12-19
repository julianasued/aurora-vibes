@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Cadastrar Novo Questionário</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('questionarios.store') }}" method="POST">
                    @csrf

                    <!-- Título -->
                    <div class="mb-4">
                        <label for="titulo" class="form-label"><strong>Título do Questionário</strong></label>
                        <input type="text" name="titulo" id="titulo" class="form-control"
                            placeholder="Digite o título" required>
                    </div>

                    <!-- Descrição -->
                    <div class="mb-4">
                        <label for="descricao" class="form-label"><strong>Descrição</strong></label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="3"
                            placeholder="Descrição do questionário (opcional)"></textarea>
                    </div>

                    <!-- Perguntas -->
                    <div id="perguntas-container" class="mb-4">
                        <!-- As perguntas serão adicionadas dinamicamente -->
                    </div>
                    <button type="button" id="add-pergunta" class="btn btn-success mb-3">Adicionar Pergunta</button>

                    <!-- Botão para Salvar -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Cadastrar Questionário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Estilos -->
    <style>
        .pergunta {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .pergunta h5 {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .opcoes-container .opcao {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .opcoes-container button {
            align-self: flex-start;
        }
    </style>
    <script src="{{ asset('js/questionario.js') }}"></script>
@endsection
