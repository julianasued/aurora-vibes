<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Dinheiro Arrecadado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #343a40;
            margin: 20px;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
    
        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
    
        th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }
    
        td {
            background-color: #f8f9fa;
            color: #343a40;
        }
    
        h1 {
            text-align: center;
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
        }
    
        .total {
            font-weight: bold;
            font-size: 1.2em;
            color: #28a745;
            text-align: right;
            margin-top: 10px;
        }
    
        /* Impressão */
        @media print {
            body {
                background-color: #ffffff;
                color: #000000;
            }
    
            th {
                background-color: #dddddd;
                color: #000000;
            }
    
            td {
                background-color: #ffffff;
            }
    
            .no-print {
                display: none;
            }
        }
    </style>    
</head>
<body>
    <h1>Relatório de Dinheiro Arrecadado</h1>
    <table>
        <tr>
            <th>Categoria</th>
            <th>Total (R$)</th>
        </tr>
        <tr>
            <td>Total Arrecadado com Venda de Tickets</td>
            <td>{{ number_format($dados['total_vendas'], 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Total Arrecadado com Uso de Tickets</td>
            <td>{{ number_format($dados['total_usos'], 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Diferença (Vendas - Usos)</strong></td>
            <td class="total">{{ number_format($dados['diferenca'], 2, ',', '.') }}</td>
        </tr>
    </table>
</body>
</html>
