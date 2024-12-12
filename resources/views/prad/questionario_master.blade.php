@extends('layouts.app')

@section('content')
<h1>Criar Questionário</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('questionarios.store') }}" method="POST">
        @csrf
        <label for="titulo">Título do Questionário:</label>
        <input type="text" id="titulo" name="titulo" required>
        <button type="submit">Cadastrar</button>
    </form>
@endsection
