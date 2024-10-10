@include('includes.head')

<div class="container">
    <h1>Editar Ticket</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('tickets.atualizar', $ticket->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $ticket->titulo }}"
                required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ $ticket->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="amount">Valor (R$)</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01"
                value="{{ $ticket->amount }}" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade Disponível</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade"
                value="{{ $ticket->quantidade }}" required>
        </div>

        <div class="form-group">
            <label for="vencimento">Data de Vencimento</label>
            <input type="date" class="form-control" id="vencimento" name="vencimento"
                value="{{ $ticket->vencimento }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Ticket</button>
    </form>
</div>
@include('includes.scripts')
