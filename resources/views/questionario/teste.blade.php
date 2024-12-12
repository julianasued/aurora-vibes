@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Título -->
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white text-center">
            <h1>Questionario</h1>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2>Por favor. Responda com seu grau de aprovação as seguintes perguntas.</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('menu_semanal.store') }}" method="POST">
                @csrf

                <!-- Primeira Pergunta -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <label for="prato_principal" class="form-label">Pergunta 1</label>
                        <div class="star-rating">
                            <input type="radio" id="star5-q1" name="rating_q1" value="5">
                            <label for="star5-q1" title="5 estrelas">★</label>
                            <input type="radio" id="star4-q1" name="rating_q1" value="4">
                            <label for="star4-q1" title="4 estrelas">★</label>
                            <input type="radio" id="star3-q1" name="rating_q1" value="3">
                            <label for="star3-q1" title="3 estrelas">★</label>
                            <input type="radio" id="star2-q1" name="rating_q1" value="2">
                            <label for="star2-q1" title="2 estrelas">★</label>
                            <input type="radio" id="star1-q1" name="rating_q1" value="1">
                            <label for="star1-q1" title="1 estrela">★</label>
                        </div>
                    </div>
                </div>

                <!-- Segunda Pergunta -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <label for="guarnicao" class="form-label">Pergunta 2</label>
                        <div class="star-rating">
                            <input type="radio" id="star5-q2" name="rating_q2" value="5">
                            <label for="star5-q2" title="5 estrelas">★</label>
                            <input type="radio" id="star4-q2" name="rating_q2" value="4">
                            <label for="star4-q2" title="4 estrelas">★</label>
                            <input type="radio" id="star3-q2" name="rating_q2" value="3">
                            <label for="star3-q2" title="3 estrelas">★</label>
                            <input type="radio" id="star2-q2" name="rating_q2" value="2">
                            <label for="star2-q2" title="2 estrelas">★</label>
                            <input type="radio" id="star1-q2" name="rating_q2" value="1">
                            <label for="star1-q2" title="1 estrela">★</label>
                        </div>
                    </div>
                </div>

                <!-- Terceira Pergunta -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <label for="acompanhamentos" class="form-label">Pergunta 3</label>
                        <div class="star-rating">
                            <input type="radio" id="star5-q3" name="rating_q3" value="5">
                            <label for="star5-q3" title="5 estrelas">★</label>
                            <input type="radio" id="star4-q3" name="rating_q3" value="4">
                            <label for="star4-q3" title="4 estrelas">★</label>
                            <input type="radio" id="star3-q3" name="rating_q3" value="3">
                            <label for="star3-q3" title="3 estrelas">★</label>
                            <input type="radio" id="star2-q3" name="rating_q3" value="2">
                            <label for="star2-q3" title="2 estrelas">★</label>
                            <input type="radio" id="star1-q3" name="rating_q3" value="1">
                            <label for="star1-q3" title="1 estrela">★</label>
                        </div>
                    </div>
                </div>

                <!-- Botão -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
