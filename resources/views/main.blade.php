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
        :root {
            --azul: #4361ee;
            --azul-escuro: #2f48c9;
            --lavanda: #c8d1ff;
            --amarelo: #fbbf24;
            --amarelo-escuro: #d97706;
            --tinta: #1b2559;
            --ground: #4361ee;
            --card: #ffffff;
            --stripe: #eef1ff;
            --ink: #ffffff;
            --muted: rgba(255, 255, 255, .8);
            --line: #dfe4ff;
        }

        /* Plano de fundo em ondas (From Uiverse.io by romeo_3200) */
        body {
            background:
                repeating-radial-gradient(circle at 0% 50%,
                    rgba(255, 255, 255, .06) 0px, rgba(255, 255, 255, .06) 2px,
                    transparent 2px, transparent 30px),
                var(--ground);
            background-attachment: fixed;
            color: var(--ink);
        }

        .navbar {
            background: var(--azul) !important;
            border-bottom: 3px solid var(--amarelo) !important;
        }
        .navbar .navbar-brand { color: #fff !important; font-weight: 700; letter-spacing: -.01em; }
        .navbar .navbar-brand i { color: var(--amarelo); }
        .navbar .nav-link { color: rgba(255, 255, 255, .85) !important; }
        .navbar .nav-link:hover { color: var(--amarelo) !important; }
        .navbar .nav-link.active { color: var(--amarelo) !important; font-weight: 700; }
        .navbar-text { color: rgba(255, 255, 255, .9) !important; }
        .navbar .btn-outline-light, .navbar .btn-outline-light:hover { background: #fff; color: var(--tinta); border-color: #fff; }

        main.container { margin-top: 26px; }
        h3, h4 { color: var(--ink); font-weight: 700; }
        h3 > i, h4 > i { color: var(--amarelo); }

        .rodape { text-align: center; color: var(--muted); font-size: 13px; padding: 40px 0 24px; }
        a { color: var(--amarelo); }

        /* ===== Cards com sombra sólida deslocada (efeito Uiverse) ===== */
        .card {
            background: var(--card); color: var(--tinta);
            border: 2px solid var(--tinta); border-radius: 14px;
            box-shadow: 6px 6px 0 var(--tinta); transition: all .2s ease;
        }
        .card:hover { transform: translate(-2px, -2px); box-shadow: 8px 8px 0 var(--tinta); }

        .table {
            background: var(--card); color: var(--tinta); border-radius: 12px; overflow: hidden;
            box-shadow: 0 14px 30px -18px rgba(27, 37, 89, .5);
        }
        .table > :not(caption) > * > * { border-color: var(--line); }
        .table thead th { color: var(--azul); text-transform: uppercase; font-size: 12px; letter-spacing: .04em; }
        .table.table-striped > tbody > tr:nth-of-type(odd) > * { background: var(--stripe); }

        .form-control:focus, .form-select:focus {
            border-color: var(--azul); box-shadow: 0 0 0 .2rem rgba(67, 97, 238, .25);
        }

        /* ===== Efeito Uiverse (pílula + "salto" no hover) em TODOS os botões ===== */
        .btn {
            border-radius: 10em; font-weight: 600; padding: .5em 1.4em;
            transition: all .3s ease-in-out; box-shadow: 0 0 0 0 var(--tinta);
        }
        .btn:hover { transform: translateY(-4px) translateX(-2px); box-shadow: 2px 5px 0 0 var(--tinta); }
        .btn:active { transform: translateY(2px) translateX(1px); box-shadow: 0 0 0 0 var(--tinta); }
        .btn-sm { padding: .3em 1em; }

        .btn-success, .btn-primary { background: var(--amarelo); color: var(--tinta); border: 1px solid var(--amarelo-escuro); }
        .btn-success:hover, .btn-primary:hover { background: var(--amarelo); color: var(--tinta); border-color: var(--amarelo-escuro); }
        .btn-warning { background: transparent; border-color: var(--azul); color: var(--azul); }
        .btn-warning:hover { background: var(--azul); border-color: var(--azul); color: #fff; }
        .btn-danger { background: var(--tinta); border-color: var(--tinta); color: #fff; }
        .btn-danger:hover { background: var(--azul-escuro); border-color: var(--tinta); color: #fff; }
        .navbar .btn:hover { box-shadow: 2px 5px 0 0 rgba(0, 0, 0, .28); }

        .page-link { color: var(--tinta); }
        .page-link:hover { color: var(--azul); }
        .page-item.active .page-link { background: var(--amarelo); border-color: var(--amarelo-escuro); color: var(--tinta); }
        nav .small.text-muted { color: var(--muted) !important; }
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

    <footer class="rodape">
        TapCine · Eric Zannini e Jasper Dearil · {{ date('Y') }}
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
