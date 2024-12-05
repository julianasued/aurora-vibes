@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Botão para Cadastro -->
            <div class="d-flex justify-content-start mb-4">
                <a href="{{ route('menu_semanal.create') }}" class="btn btn-success btn-lg">+ Cadastrar</a>
            </div>

            <!-- Título -->
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Pratos Cadastrados</h3>
                </div>
            </div>

            <!-- Tabela de Pratos Cadastrados -->
            <div class="card shadow-lg">
                <div class="card-body">
                    @if ($pratos->isEmpty())
                        <div class="alert alert-warning text-center">
                            Nenhum prato cadastrado até o momento.
                        </div>
                    @else
                        <table class="table table-hover text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>Dia</th>
                                    <th>Prato Principal</th>
                                    <th>Guarnição</th>
                                    <th>Acompanhamento</th>
                                    <th>Sobremesa</th>
                                    <th>Salada</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pratos as $prato)
                                    <tr>
                                        <td>{{ ucfirst($prato->dia_da_semana) }}</td>
                                        <td>{{ $prato->prato_principal }}</td>
                                        <td>{{ $prato->guarnicao }}</td>
                                        <td>{{ $prato->acompanhamentos }}</td>
                                        <td>{{ $prato->sobremesa }}</td>
                                        <td>{{ $prato->salada }}</td>
                                        <td>
                                            <form action="{{ route('menu_semanal.destroy', $prato->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este prato?')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Excluir
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
