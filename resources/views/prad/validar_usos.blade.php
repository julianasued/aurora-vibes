@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="mb-3">
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
        <h1>Validar Usos de Tickets</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($usos->isEmpty())
            <p>Não há usos de tickets pendentes de validação.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Aluno</th>
                        <th>Ticket</th>
                        <th>Quantidade Usada</th>
                        <th>Data de Uso</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usos as $uso)
                        <tr>
                            <td>{{ $uso->user->name }}</td>
                            <td>{{ $uso->ticket->titulo }}</td>
                            <td>{{ $uso->quantidade_usada }}</td>
                            <td>{{ \Carbon\Carbon::parse($uso->data_uso)->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('prad.validarUsoPost') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="uso_id" value="{{ $uso->id }}">
                                    <button type="submit" class="btn btn-success">Validar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
