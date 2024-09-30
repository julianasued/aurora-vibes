<!DOCTYPE html>
<html dir="ltr">
@include('includes.head')

<body>
    <div class="container mt-5">
        <h2 class="text-center">Cadastro de Tickets</h2>
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <!--Criação dos campos de preenchimento para cadastro de tickets-->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Insira o título"
                    required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Insira a descrição" required></textarea>
            </div>
            <div class="form-group">
                <label for="vencimento">Vencimento:</label>
                <input type="date" class="form-control" name="vencimento" id="vencimento" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade"
                    placeholder="Insira a quantidade" required>
            </div>
            <div class="form-group">
                <label for="inputValor" class="form-label">Valor</label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="" class="form-control" id="amount" name="amount" step="0.01" required>
                </div>
            </div>
            <!-- Campo oculto com o ID do cliente -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    @include('includes.scripts')
</body>

</html>
