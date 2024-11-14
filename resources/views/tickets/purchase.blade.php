@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success text-center mb-4">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger text-center mb-4">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach ($tickets as $ticket)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary font-weight-bold">{{ $ticket->titulo }}</h5>
                        <p class="card-text text-muted">{{ $ticket->descricao }}</p>
                        <p><strong>Preço: </strong> R$ {{ number_format($ticket->amount, 2, ',', '.') }}</p>
                        <p><strong>Quantidade disponível: </strong> {{ $ticket->quantidade }}</p>
                        <form action="{{ route('tickets.processarCompra') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            
                            <div class="form-group mb-3">
                                <label for="quantidade_comprada" class="form-label">Quantidade</label>
                                <input type="number" name="quantidade_comprada" class="form-control" min="1"
                                    max="{{ $ticket->quantidade }}" placeholder="Insira a quantidade" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Comprar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('includes.scripts')
@endsection

