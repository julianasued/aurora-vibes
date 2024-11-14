@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Uso de Tickets</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('aluno.registrarUsoPost') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ticket_id">Selecione o Ticket:</label>
                <select name="ticket_id" class="form-control" required>
                    @foreach ($tickets as $ticket)
                        @if ($ticket->quantidade_total > $ticket->quantidade_usada)
                            <option value="{{ $ticket->ticket_id }}">
                                {{ $ticket->ticket->titulo }} 
                                (Comprados: {{ $ticket->quantidade_total }} | Usados: {{ $ticket->quantidade_usada }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantidade_usada">Quantidade a Usar:</label>
                <input type="number" name="quantidade_usada" class="form-control" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Uso</button>
        </form>
    </div>
@endsection
