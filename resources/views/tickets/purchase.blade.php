@include('includes.head')

<body>
    <div class="container">
        <h1>Comprar Tickets</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            @foreach ($tickets as $ticket)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->titulo }}</h5>
                            <p class="card-text">{{ $ticket->descricao }}</p>
                            <p><strong>Preço: </strong> R$ {{ number_format($ticket->amount, 2, ',', '.') }}</p>
                            <p><strong>Quantidade disponível: </strong> {{ $ticket->quantidade }}</p>
                            <form action="{{ route('tickets.processarCompra') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                                <div class="form-group mb-2">
                                    <label for="quantidade_comprada">Quantidade</label>
                                    <input type="number" name="quantidade_comprada" class="form-control" min="1"
                                        max="{{ $ticket->quantidade }}" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.scripts')
</body>

</html>
