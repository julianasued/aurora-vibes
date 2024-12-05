@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Título -->
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white text-center">
            <h1>Menu Semanal</h1>
        </div>
    </div>

    <!-- Formulário de Cadastro -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2>Cadastrar Prato</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('menu_semanal.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Dia da Semana -->
                    <div class="col-md-4 mb-3">
                        <label for="dia_da_semana" class="form-label">Dia da Semana</label>
                        <select class="form-control" id="dia_da_semana" name="dia_da_semana" required>
                            <option value="" disabled selected>Selecione um dia</option>
                            <option value="segunda">Segunda-feira</option>
                            <option value="terca">Terça-feira</option>
                            <option value="quarta">Quarta-feira</option>
                            <option value="quinta">Quinta-feira</option>
                            <option value="sexta">Sexta-feira</option>
                            <option value="sabado">Sábado</option>
                            <option value="domingo">Domingo</option>
                        </select>
                    </div>

                    <!-- Prato Principal -->
                    <div class="col-md-8 mb-3">
                        <label for="prato_principal" class="form-label">Prato Principal</label>
                        <input type="text" class="form-control" id="prato_principal" name="prato_principal" placeholder="Digite o prato principal" maxlength="255">
                    </div>
                </div>

                <div class="row">
                    <!-- Guarnição -->
                    <div class="col-md-6 mb-3">
                        <label for="guarnicao" class="form-label">Guarnição</label>
                        <textarea class="form-control" id="guarnicao" name="guarnicao" rows="2" maxlength="255"></textarea>
                    </div>

                    <!-- Acompanhamento -->
                    <div class="col-md-6 mb-3">
                        <label for="acompanhamentos" class="form-label">Acompanhamentos</label>
                        <textarea class="form-control" id="acompanhamentos" name="acompanhamentos" rows="2"></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Sobremesa -->
                    <div class="col-md-6 mb-3">
                        <label for="sobremesa" class="form-label">Sobremesa</label>
                        <textarea class="form-control" id="sobremesa" name="sobremesa" rows="2" maxlength="255"></textarea>
                    </div>

                    <!-- Salada -->
                    <div class="col-md-6 mb-3">
                        <label for="salada" class="form-label">Salada</label>
                        <textarea class="form-control" id="salada" name="salada" rows="3" maxlength="255"></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Datas -->
                    <div class="col-md-3 mb-3">
                        <label for="data_inicio" class="form-label">Data de Início</label>
                        <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="data_fim" class="form-label">Data de Fim</label>
                        <input type="date" class="form-control" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" required>
                    </div>
                </div>

                <!-- Botão -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
