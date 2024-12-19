@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white text-center">
            <h1>{{ $questionario->titulo }}</h1>
        </div>
        <div class="card-body">
            <p>{{ $questionario->descricao }}</p>
            <form action="{{ route('questionarios.responder', $questionario->id) }}" method="POST">
                @csrf
                @foreach ($perguntas as $pergunta)
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="pergunta-{{ $pergunta->id }}" class="form-label">
                                {{ $pergunta->texto }}
                            </label>
                        </div>
                        @if ($pergunta->tipo === 'texto')
                            <div class="col-md-12">
                                <textarea 
                                    class="form-control" 
                                    name="respostas[{{ $pergunta->id }}]" 
                                    id="pergunta-{{ $pergunta->id }}" 
                                    rows="2" 
                                    placeholder="Digite sua resposta aqui"></textarea>
                            </div>
                        @elseif ($pergunta->tipo === 'multipla_escolha')
                            <div class="col-md-12">
                                <div class="star-rating">
                                    @foreach ($pergunta->opcoes as $opcao)
                                        <input 
                                            type="radio" 
                                            id="pergunta-{{ $pergunta->id }}-opcao-{{ $opcao->id }}" 
                                            name="respostas[{{ $pergunta->id }}]" 
                                            value="{{ $opcao->id }}" />
                                        <label 
                                            for="pergunta-{{ $pergunta->id }}-opcao-{{ $opcao->id }}" 
                                            class="star">&#9733;</label>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Salvar Respostas</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .star-rating {
        direction: rtl;
        display: inline-block;
        margin-top: 5px;
    }
    .star {
        font-size: 30px;
        color: #ccc;
        cursor: pointer;
    }
    .star:hover,
    .star:hover ~ .star {
        color: #f39c12;
    }
    input[type="radio"] {
        display: none;
    }
    input[type="radio"]:checked ~ .star {
        color: #f39c12;
    }
</style>
@endsection
