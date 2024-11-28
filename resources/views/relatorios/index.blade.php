<!DOCTYPE html>
<html>
<head>
    <title>Gerar Relatórios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, select, button { padding: 10px; width: 100%; max-width: 400px; }
    </style>
</head>
<body>
    <h1>Gerar Relatórios</h1>
    <form action="{{ route('relatorios.gerar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipo">Tipo de Relatório</label>
            <select name="tipo" id="tipo" required>
                <option value="">Selecione</option>
                <option value="uso_tickets">Uso de Tickets</option>
                <option value="dinheiro_arrecadado">Dinheiro Arrecadado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" required>
        </div>

        <button type="submit" target="_blank">Gerar Relatório</button>
    </form>
</body>
</html>
