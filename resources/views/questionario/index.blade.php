@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Lista de Questionários</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('questionarios.create') }}" class="btn btn-success">+ Criar Novo Questionário</a>
                <a href="{{ route('relatorios.graficos') }}" class="btn btn-info">Resultados</a>
            </div>
            @if ($questionarios->isEmpty())
                <p class="text-center text-muted">Nenhum questionário cadastrado até o momento.</p>
            @else
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Data de Criação</th>
                            {{-- <th>Ações</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questionarios as $questionario)
                            <tr>
                                <td>{{ $questionario->titulo }}</td>
                                <td>{{ $questionario->descricao }}</td>
                                <td>{{ $questionario->created_at->format('d/m/Y') }}</td>
                                {{-- <td class="text-center"> --}}
                                    {{-- <a href="{{ route('questionarios.show', $questionario->id) }}" class="btn btn-info btn-sm">Visualizar</a> --}}
                                    {{-- <a href="{{ route('questionarios.edit', $questionario->id) }}" class="btn btn-warning btn-sm">Editar</a> --}}
                                    {{-- <form action="{{ route('questionarios.destroy', $questionario->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este questionário?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection