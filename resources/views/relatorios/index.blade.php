@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Gerar Relatórios</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('relatorios.gerar') }}" method="POST" target="_blank">
                            @csrf
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo de Relatório</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option value="" disabled selected>Selecione o tipo de relatório</option>
                                    <option value="uso_tickets">Uso de Tickets</option>
                                    <option value="dinheiro_arrecadado">Dinheiro Arrecadado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="data_inicio" class="form-label">Data de Início</label>
                                <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="data_fim" class="form-label">Data de Fim</label>
                                <input type="date" name="data_fim" id="data_fim" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-bar-chart-line-fill"></i> Gerar Relatório
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
