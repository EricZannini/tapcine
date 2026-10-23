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
    {{-- 5 --}}
    <h2>Relatório de Produtos</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Vendidos</th>
        </tr>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->categoria }}</td>
                <td>R$ {{ $item->preco }}</td>
                <td>{{ $item->quantidade_vendida }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
