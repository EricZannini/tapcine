<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; color: #1c1e2a; font-size: 12px; }
        h1 { color: #DE1A1A; font-size: 20px; margin-bottom: 2px; }
        .sub { color: #666; font-size: 11px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #DE1A1A; color: #fff; padding: 7px; text-align: left; font-size: 11px; }
        td { padding: 6px 7px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) td { background: #f5f6fb; }
        .total { margin-top: 14px; font-weight: bold; }
    </style>
</head>

<body>
    <h1>TapCine — Relatório de Ingressos</h1>
    <div class="sub">Vendas · Emitido em {{ date('d/m/Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Filme</th>
                <th>Sala</th>
                <th>Assento</th>
                <th>Tipo</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->cliente_nome }}</td>
                    <td>{{ $item->sessao->filme->titulo ?? '-' }}</td>
                    <td>{{ $item->sessao->sala ?? '-' }}</td>
                    <td>{{ $item->assento }}</td>
                    <td>{{ $item->tipo_ingresso }}</td>
                    <td>{{ $item->data_venda ? \Carbon\Carbon::parse($item->data_venda)->format('d/m/Y') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">Total de ingressos: {{ $dados->count() }}</div>
</body>

</html>
