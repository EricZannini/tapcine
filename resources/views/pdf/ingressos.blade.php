<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; }
    </style>
</head>

<body>
    <h2>Relatório de Ingressos</h2>

    <table>
        <tr>
            <th>Cliente</th>
            <th>Filme</th>
            <th>Assento</th>
            <th>Tipo</th>
            <th>Data</th>
        </tr>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->cliente_nome }}</td>
                <td>{{ $item->sessao->filme->titulo }}</td>
                <td>{{ $item->assento }}</td>
                <td>{{ $item->tipo_ingresso }}</td>
                <td>{{ $item->data_venda }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
