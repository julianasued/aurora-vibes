@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Título -->
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white text-center">
            <h1>Questionário</h1>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2>Por favor responda, com base no seu grau de aprovação, as seguintes perguntas.</h2>
        </div>
        <div class="card-body">
            @csrf

            <!-- Primeira Pergunta -->
            <div class="row">
                <div class="col-md-8 mb-0">
                    <label for="pergunta1" class="form-label">Pergunta 1</label>    <!-- "string" pergunta 1 -->             
                </div>

                <!-- Conteiner das estrelas -->
                <div class="col-md-8 mb-3">
                    <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++) <!-- identificador de avaliação -->
                            <input type="radio" id="pergunta1-star{{ $i }}" name="pergunta1" value="{{ $i }}" />
                            <label for="pergunta1-star{{ $i }}" class="star">&#9733;</label>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Segunda Pergunta -->
            <div class="row">
                <div class="col-md-8 mb-0">
                    <label for="pergunta2" class="form-label">Pergunta 2</label>   <!-- "string" pergunta 2 -->             
                </div>

                <!-- Conteiner das estrelas -->
                <div class="col-md-8 mb-3">
                    <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)    <!-- identificador de avaliação -->
                            <input type="radio" id="pergunta2-star{{ $i }}" name="pergunta2" value="{{ $i }}" />
                            <label for="pergunta2-star{{ $i }}" class="star">&#9733;</label>
                        @endfor
                    </div>
                </div>
            </div>


            <!-- Terceira Pergunta -->
            <div class="row">
                <div class="col-md-8 mb-0">
                    <label for="pergunta3" class="form-label">Pergunta 3</label>  <!-- "string" pergunta 3 -->              
                </div>

                <!-- Conteiner das estrelas -->
                <div class="col-md-8 mb-3">
                    <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)    <!-- identificador de avaliação -->
                            <input type="radio" id="pergunta3-star{{ $i }}" name="pergunta3" value="{{ $i }}" />
                            <label for="pergunta3-star{{ $i }}" class="star">&#9733;</label>
                        @endfor
                    </div>
                </div>
                <div class="col-md-8 mb-5">
                            <label for="sobremesa" class="form-label">Comentário:</label>
                            <textarea class="form-control" id="sobremesa" name="sobremesa" rows="2" maxlength="255" placeholder="Digite um comentário adicional (opcional)"></textarea>
                </div>
            </div>

            <!-- Botão -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
            </div>
        </div>
    </div>
</div>


<!--Criação do style da estrela-->
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