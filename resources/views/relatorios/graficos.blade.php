@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">Relatório de Respostas</h3>
        </div>
        <div class="card-body">
            <!-- Filtro de Questionários -->
            <div class="mb-4 text-center">
                <label for="selectQuestionario" class="form-label">Selecione o Questionário:</label>
                <select id="selectQuestionario" class="form-select w-50 mx-auto">
                    <option value="" disabled selected>Escolha um questionário</option>
                    @foreach ($questionarios as $id => $titulo)
                        <option value="{{ $id }}">{{ $titulo }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Gráficos -->
            <div id="graficosContainer">
                <p class="text-center">Selecione um questionário para exibir os gráficos.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.2/dist/echarts.min.js"></script>
<script>
    document.getElementById('selectQuestionario').addEventListener('change', function () {
    const questionarioId = this.value;
    const graficosContainer = document.getElementById('graficosContainer');

    graficosContainer.innerHTML = '<p class="text-center text-primary">Carregando gráficos...</p>';

    fetch(`/relatorios/filtrar-graficos?questionario_id=${questionarioId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(dados => {
            if (dados.error) {
                graficosContainer.innerHTML = `<p class="text-danger text-center">${dados.error}</p>`;
                return;
            }

            graficosContainer.innerHTML = '';

            Object.keys(dados).forEach(perguntaId => {
                const container = document.createElement('div');
                container.classList.add('mb-5');
                container.innerHTML = `
                    <h5>${dados[perguntaId].pergunta}</h5>
                    <div id="grafico-pizza-${perguntaId}" style="height: 400px;"></div>
                `;
                graficosContainer.appendChild(container);

                const pizzaChart = echarts.init(container.querySelector(`#grafico-pizza-${perguntaId}`));
                const data = dados[perguntaId].opcoes.map(opcao => ({
                    name: opcao.opcao_resposta,
                    value: opcao.total_respostas,
                }));

                pizzaChart.setOption({
                    title: { text: 'Distribuição de Respostas', left: 'center' },
                    tooltip: { trigger: 'item' },
                    series: [
                        { type: 'pie', radius: '50%', data },
                    ],
                });
            });
        })
        .catch(error => {
            console.error('Erro ao carregar os gráficos:', error);
            graficosContainer.innerHTML = '<p class="text-danger text-center">Erro ao carregar os gráficos.</p>';
        });
});

</script>
@endsection
