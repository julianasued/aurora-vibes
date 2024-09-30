@include('includes.head')

<body>
    <div class="container">
        <h1>Compras Pendentes</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Ticket</th>
                    <th>Quantidade Comprada</th>
                    <th>Total</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendentes as $pendente)
                    <tr>
                        <td>{{ $pendente->user->name }}</td>
                        <td>{{ $pendente->ticket->titulo }}</td>
                        <td>{{ $pendente->quantidade_comprada }}</td>
                        <td>R$ {{ number_format($pendente->total, 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('tickets.validar', $pendente->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Validar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('includes.scripts')
</body>

