@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Gerar Relatórios</h3>
                    </div>
                    <div class="card-body">
                        <form id="formRelatorio">
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo de Relatório</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option value="" disabled selected>Selecione o tipo de relatório</option>
                                    <option value="uso_tickets">Uso de Tickets</option>
                                    <option value="dinheiro_arrecadado">Dinheiro Arrecadado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="data_inicio" class="form-label">Data de Início</label>
                                <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="data_fim" class="form-label">Data de Fim</label>
                                <input type="date" name="data_fim" id="data_fim" class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-bar-chart-line-fill"></i> Gerar Relatório
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="resultadoRelatorio" class="mt-4">
                    <!-- Relatório será exibido aqui -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('formRelatorio').addEventListener('submit', function(event) {
            event.preventDefault();
    
            const tipo = document.getElementById('tipo').value;
            const data_inicio = document.getElementById('data_inicio').value;
            const data_fim = document.getElementById('data_fim').value;
    
            const resultado = document.getElementById('resultadoRelatorio');
            resultado.innerHTML = '<p class="text-center text-primary">Carregando relatório, por favor aguarde...</p>';
    
            fetch("{{ route('relatorios.gerar') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ tipo, data_inicio, data_fim })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let html = `<div class="text-center mb-4">
                                        <h4 class="text-success">${data.nome}</h4>
                                    </div>`;
    
                        if (data.tipo === 'uso_tickets') {
                            html += `
                            <table class="table table-striped table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Dia</th>
                                        <th>Total de Uso</th>
                                    </tr>
                                </thead>
                                <tbody>
                            `;
    
                            data.dados.forEach(item => {
                                html += `
                                    <tr>
                                        <td>${item.dia}</td>
                                        <td>${item.total_uso}</td>
                                    </tr>
                                `;
                            });
    
                            html += '</tbody></table>';
                        } else if (data.tipo === 'dinheiro_arrecadado') {
                            html += `
                            <div class="alert alert-info">
                                <p><strong>Total de Vendas:</strong> R$ ${data.dados.total_vendas.toFixed(2)}</p>
                                <p><strong>Total de Usos:</strong> R$ ${data.dados.total_usos.toFixed(2)}</p>
                                <p><strong>Diferença:</strong> R$ ${data.dados.diferenca.toFixed(2)}</p>
                            </div>`;
                        } else if (data.tipo === 'respostas_questionario'){
                            html += '<table class="table table-bordered mt-3">';
                            html += `
                            <thead>
                                <tr>
                                    <th>Questionário</th>
                                    <th>Pergunta</th>
                                    <th>Resposta</th>
                                    <th>Data de Resposta</th>
                                </tr>
                            </thead>
                            <tbody>
                        `;
                            data.dados.forEach(item => {
                                html += `
                                <tr>
                                    <td>${item.questionario}</td>
                                    <td>${item.pergunta}</td>
                                    <td>${item.resposta || '---'}</td>
                                    <td>${new Date(item.data_resposta).toLocaleDateString()}</td>
                                </tr>
                            `;
                            });
                            html += '</tbody></table>';
                        }

                        resultado.innerHTML = html;
                    } else {
                        resultado.innerHTML = `<p class="text-center text-danger">Erro: ${data.message}</p>`;
                    }
                })
                .catch(error => {
                    console.error('Erro ao gerar o relatório:', error);
                    resultado.innerHTML = 
                        '<p class="text-center text-danger">Ocorreu um erro ao gerar o relatório. Tente novamente mais tarde.</p>';
                });
        });
    </script>    
@endsection
