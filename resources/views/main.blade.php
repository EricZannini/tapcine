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
            --vermelho: #d52122;
            --vermelho-escuro: #a3181a;
            --baunilha: #fff7e5;
            --tinta: #5c1112;
            --ground: #fff7e5;
            --card: #ffffff;
            --stripe: #fff7e5;
            --ink: #d52122;
            --muted: rgba(213, 33, 34, .75);
            --line: #f3dcc8;
        }

        /* Plano de fundo em ondas (From Uiverse.io by romeo_3200) */
        body {
            background:
                repeating-radial-gradient(circle at 0% 50%,
                    rgba(213, 33, 34, .05) 0px, rgba(213, 33, 34, .05) 2px,
                    transparent 2px, transparent 30px),
                var(--ground);
            background-attachment: fixed;
            color: var(--ink);
        }

        .navbar { background: var(--vermelho) !important; }
        .navbar .navbar-brand { color: var(--baunilha) !important; font-weight: 700; letter-spacing: -.01em; }
        .navbar .nav-link { color: rgba(255, 247, 229, .8) !important; }
        .navbar .nav-link:hover { color: var(--baunilha) !important; }
        .navbar .nav-link.active { color: var(--baunilha) !important; font-weight: 700; text-decoration: underline; text-underline-offset: 6px; }

        .navbar .dropdown-menu {
            --bs-dropdown-bg: #fff;
            --bs-dropdown-link-color: var(--tinta);
            --bs-dropdown-link-hover-bg: var(--baunilha);
            --bs-dropdown-link-hover-color: var(--tinta);
            --bs-dropdown-link-active-bg: var(--vermelho);
            --bs-dropdown-link-active-color: var(--baunilha);
            --bs-dropdown-divider-bg: var(--line);
            border: 2px solid var(--vermelho); border-radius: 12px; box-shadow: 4px 4px 0 var(--vermelho);
        }
        .navbar .dropdown-item i { width: 18px; }
        .navbar-text { color: var(--baunilha) !important; }
        .navbar .btn-outline-light, .navbar .btn-outline-light:hover { background: var(--baunilha); color: var(--vermelho); border-color: var(--baunilha); }

        main.container { margin-top: 26px; }
        h3, h4 { color: var(--ink); font-weight: 700; }

        .rodape { text-align: center; color: var(--muted); font-size: 13px; padding: 40px 0 24px; }
        a { color: var(--vermelho); }

        /* ===== Cards com sombra sólida deslocada (efeito Uiverse) ===== */
        .card {
            background: var(--card); color: var(--tinta);
            border: 2px solid var(--vermelho); border-radius: 14px;
            box-shadow: 6px 6px 0 var(--vermelho); transition: all .2s ease;
        }
        .card:hover { transform: translate(-2px, -2px); box-shadow: 8px 8px 0 var(--vermelho); }

        .table {
            background: var(--card); color: var(--tinta); border-radius: 12px; overflow: hidden;
            box-shadow: 0 14px 30px -18px rgba(92, 17, 18, .4);
        }
        .table > :not(caption) > * > * { border-color: var(--line); }
        .table thead th { color: var(--vermelho); text-transform: uppercase; font-size: 12px; letter-spacing: .04em; }
        .table.table-striped > tbody > tr:nth-of-type(odd) > * { background: var(--stripe); }

        .form-control:focus, .form-select:focus {
            border-color: var(--vermelho); box-shadow: 0 0 0 .2rem rgba(213, 33, 34, .2);
        }

        /* ===== Efeito Uiverse (pílula + "salto" no hover) em TODOS os botões ===== */
        .btn {
            border-radius: 10em; font-weight: 600; padding: .5em 1.4em;
            transition: all .3s ease-in-out; box-shadow: 0 0 0 0 var(--vermelho-escuro);
        }
        .btn:hover { transform: translateY(-4px) translateX(-2px); box-shadow: 2px 5px 0 0 var(--vermelho-escuro); }
        .btn:active { transform: translateY(2px) translateX(1px); box-shadow: 0 0 0 0 var(--vermelho-escuro); }
        .btn-sm { padding: .3em 1em; }

        .btn-success, .btn-primary { background: var(--vermelho); color: var(--baunilha); border: 1px solid var(--vermelho-escuro); }
        .btn-success:hover, .btn-primary:hover { background: var(--vermelho); color: var(--baunilha); border-color: var(--vermelho-escuro); }
        .btn-warning { background: transparent; border-color: var(--vermelho); color: var(--vermelho); }
        .btn-warning:hover { background: var(--vermelho); border-color: var(--vermelho); color: var(--baunilha); }
        .btn-danger { background: var(--tinta); border-color: var(--tinta); color: var(--baunilha); }
        .btn-danger:hover { background: var(--vermelho-escuro); border-color: var(--tinta); color: var(--baunilha); }
        .navbar .btn:hover { box-shadow: 2px 5px 0 0 rgba(0, 0, 0, .25); }

        .page-link { color: var(--vermelho); }
        .page-link:hover { color: var(--vermelho-escuro); }
        .page-item.active .page-link { background: var(--vermelho); border-color: var(--vermelho); color: var(--baunilha); }
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
        TapCine · Eric Zannini e Gabriela Neckel · {{ date('Y') }}
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
