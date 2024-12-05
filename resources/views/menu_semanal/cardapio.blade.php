{{-- @extends('layouts.app')

@section('content') --}}
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>Cardápio da Semana</h3>
            @if ($cardapios->isNotEmpty())
                <p class="mb-0">
                    Período: 
                    {{ \Carbon\Carbon::parse($cardapios->first()->data_inicio)->format('d/m/Y') }} 
                    a 
                    {{ \Carbon\Carbon::parse($cardapios->first()->data_fim)->format('d/m/Y') }}
                </p>
            @else
                <p class="mb-0">Período: Nenhum cardápio disponível.</p>
            @endif
                </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Categoria</th>
                        <th>2ª Feira</th>
                        <th>3ª Feira</th>
                        <th>4ª Feira</th>
                        <th>5ª Feira</th>
                        <th>6ª Feira</th>
                        <th>Sábado</th>
                        <th>Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Salada</strong></td>
                        @foreach (['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'] as $dia)
                            <td>{{ $cardapios->where('dia_da_semana', $dia)->first()->salada ?? '---' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><strong>Prato Principal</strong></td>
                        @foreach (['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'] as $dia)
                            <td>{{ $cardapios->where('dia_da_semana', $dia)->first()->prato_principal ?? '---' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><strong>Guarnição</strong></td>
                        @foreach (['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'] as $dia)
                            <td>{{ $cardapios->where('dia_da_semana', $dia)->first()->guarnicao ?? '---' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><strong>Acompanhamentos</strong></td>
                        @foreach (['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'] as $dia)
                            <td>{{ $cardapios->where('dia_da_semana', $dia)->first()->acompanhamentos ?? '---' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td><strong>Sobremesa</strong></td>
                        @foreach (['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'] as $dia)
                            <td>{{ $cardapios->where('dia_da_semana', $dia)->first()->sobremesa ?? '---' }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- @endsection --}}
