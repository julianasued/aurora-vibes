@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Validar Usos de Tickets</h3>
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

                        <!-- Tabela de Usos Pendentes -->
                        @if ($usos->isEmpty())
                            <div class="alert alert-warning text-center">
                                Não há usos de tickets pendentes de validação.
                            </div>
                        @else
                            <table class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Aluno</th>
                                        <th>Ticket</th>
                                        <th>Data de Uso</th>
                                        <th class="text-center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usos as $uso)
                                        <tr>
                                            <td>{{ $uso->user->name }}</td>
                                            <td>{{ $uso->ticket->titulo }}</td>
                                            <td>{{ \Carbon\Carbon::parse($uso->data_uso)->format('d/m/Y') }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('prad.validarUsoPost') }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="uso_id" value="{{ $uso->id }}">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="bi bi-check-circle"></i> Validar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
