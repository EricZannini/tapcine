<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'TapCine')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        /* ===== Paleta TapCine: Rojo #DE1A1A + Ghost White #E8EBF7 ===== */
        :root {
            --rojo: #de1a1a;
            --rojo-strong: #b81414;
            --ground: #e8ebf7;
            --card: #ffffff;
            --stripe: #f5f6fb;
            --ink: #1c1e2a;
            --muted: #5b5f70;
            --line: #d5d9e8;
        }

        /* Plano de fundo em ondas (From Uiverse.io by romeo_3200) */
        body {
            background:
                repeating-radial-gradient(circle at 0% 50%,
                    rgba(0, 0, 0, .04) 0px, rgba(0, 0, 0, .04) 2px,
                    transparent 2px, transparent 30px),
                var(--ground);
            background-attachment: fixed;
            color: var(--ink);
        }

        .navbar {
            background: var(--rojo) !important;
            border-bottom: 0 !important;
            box-shadow: 0 3px 14px -7px rgba(222, 26, 26, .55);
        }
        .navbar .navbar-brand { color: #fff !important; font-weight: 700; letter-spacing: -.01em; }
        .navbar .nav-link { color: rgba(255, 255, 255, .85) !important; }
        .navbar .nav-link:hover { color: #fff !important; }
        .navbar-text { color: rgba(255, 255, 255, .9) !important; }

        main.container { margin-top: 26px; }
        h3, h4 { color: var(--ink); font-weight: 700; }
        a { color: var(--rojo); }

        /* ===== Cards com sombra sólida deslocada (efeito Uiverse) ===== */
        .card {
            background: var(--card); color: var(--ink);
            border: 2px solid var(--rojo); border-radius: 14px;
            box-shadow: 6px 6px 0 var(--rojo-strong); transition: all .2s ease;
        }
        .card:hover { transform: translate(-2px, -2px); box-shadow: 8px 8px 0 var(--rojo-strong); }

        .table {
            background: var(--card); color: var(--ink); border-radius: 12px; overflow: hidden;
            box-shadow: 0 1px 2px rgba(28, 30, 42, .04), 0 14px 30px -20px rgba(28, 30, 42, .25);
        }
        .table > :not(caption) > * > * { border-color: var(--line); }
        .table thead th { color: var(--muted); text-transform: uppercase; font-size: 12px; letter-spacing: .04em; }
        .table.table-striped > tbody > tr:nth-of-type(odd) > * { background: var(--stripe); }

        .form-control:focus, .form-select:focus {
            border-color: var(--rojo); box-shadow: 0 0 0 .2rem rgba(222, 26, 26, .15);
        }

        /* ===== Efeito Uiverse (pílula + "salto" no hover) em TODOS os botões ===== */
        .btn {
            border-radius: 10em; font-weight: 600; padding: .5em 1.4em;
            transition: all .3s ease-in-out; box-shadow: 0 0 0 0 var(--rojo-strong);
        }
        .btn:hover { transform: translateY(-4px) translateX(-2px); box-shadow: 2px 5px 0 0 var(--rojo-strong); }
        .btn:active { transform: translateY(2px) translateX(1px); box-shadow: 0 0 0 0 var(--rojo-strong); }
        .btn-sm { padding: .3em 1em; }

        /* cores por variante */
        .btn-success, .btn-primary { background: var(--rojo); color: #fff; border: 1px solid var(--rojo-strong); }
        .btn-success:hover, .btn-primary:hover { background: var(--rojo); color: #fff; border-color: var(--rojo-strong); }
        .btn-warning { background: transparent; border-color: var(--rojo); color: var(--rojo); }
        .btn-warning:hover { background: var(--rojo); border-color: var(--rojo); color: #fff; }
        .btn-danger { background: var(--rojo); border-color: var(--rojo-strong); color: #fff; }
        .btn-danger:hover { background: var(--rojo-strong); border-color: var(--rojo-strong); color: #fff; }
        /* botão "Sair" na barra vermelha: sombra escura pra aparecer */
        .navbar .btn:hover { box-shadow: 2px 5px 0 0 rgba(0, 0, 0, .28); }
    </style>
</head>

<body>
    <div>
        @include('sidebar')
    </div>

    <main class="container">
        <div class="col-12 col-md-9">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="fechar"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="fechar"></button>
                </div>
            @endif
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <b>Por favor, verifique os erros abaixo</b>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('conteudo')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
