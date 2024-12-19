@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Pesquisas de Satisfação Disponíveis</h3>
        </div>
        <div class="card-body">
            @if ($questionarios->isEmpty())
                <p class="text-center text-muted">Nenhuma pesquisa disponível para responder no momento.</p>
            @else
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questionarios as $questionario)
                            <tr>
                                <td>{{ $questionario->titulo }}</td>
                                <td>{{ $questionario->descricao }}</td>
                                <td class="text-center">
                                    <a href="{{ route('questionarios.show', $questionario->id) }}" class="btn btn-success btn-sm">
                                        Responder
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
