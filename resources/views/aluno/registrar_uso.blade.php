@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Registrar Uso de Tickets</h3>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Formulário de Registro de Uso -->
                        <form action="{{ route('aluno.registrarUsoPost') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="ticket_id" class="form-label">Selecione o Ticket:</label>
                                <select name="ticket_id" class="form-select" required>
                                    <option value="" disabled selected>Escolha um ticket...</option>
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

                            <div class="mb-3">
                                <label for="quantidade_usada" class="form-label">Quantidade:</label>
                                <input type="number" name="quantidade_usada" class="form-control" min="1" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-ticket-perforated"></i> Confirmar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
