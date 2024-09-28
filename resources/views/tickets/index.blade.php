<!DOCTYPE html>
<html dir="ltr">
@include('includes.head')

<body>
    {{-- <div class="container mt-5">
        <h2 class="text-center">Cadastro de Tickets</h2>
        <form>
            <!--Criação dos campos de preenchimento para cadastro de tickets-->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" placeholder="Insira o título" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" rows="3" placeholder="Insira a descrição" required></textarea>
            </div>
            <div class="form-group">
                <label for="vencimento">Vencimento:</label>
                <input type="date" class="form-control" id="vencimento" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" placeholder="Insira a quantidade" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div> --}}

    <a href="{{ route('tickets.create') }}" class="btn btn-danger" role="button">COMPRAR</a>


    <!--Criação do formulário-->
    {{-- <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Insira o título"
                required>
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Insira a descrição" required></textarea>
            @error('descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="vencimento">Vencimento:</label>
            <input type="date" class="form-control" id="vencimento" name="vencimento" required>
            @error('vencimento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade"
                placeholder="Insira a quantidade" required min="1">
            @error('quantidade')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form> --}}


    @include('includes.scripts')
</body>

</html>
