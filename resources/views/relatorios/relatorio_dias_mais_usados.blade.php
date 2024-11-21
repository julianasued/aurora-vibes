<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Uso de Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            font-size: 22px;
        }
    </style>
</head>

<body>
    <h1>Relatório de Uso de Tickets</h1>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Total de Tickets Usados</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $linha)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($linha->dia)->format('d/m/Y') }}</td>
                    <td>{{ $linha->total_uso }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
