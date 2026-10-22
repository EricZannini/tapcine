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
            --laranja: #f36b2e;
            --manga: #f59a1e;
            --agua: #c4e7e5;
            --azul: #253c96;
            --marinho: #19244e;
            --ground: #c4e7e5;
            --card: #ffffff;
            --stripe: #eaf6f5;
            --ink: #19244e;
            --muted: #4a5580;
            --line: #cfe3e2;
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
            background: var(--marinho) !important;
            border-bottom: 3px solid var(--laranja) !important;
            box-shadow: 0 3px 14px -7px rgba(25, 36, 78, .55);
        }
        .navbar .navbar-brand { color: #fff !important; font-weight: 700; letter-spacing: -.01em; }
        .navbar .navbar-brand i { color: var(--laranja); }
        .navbar .nav-link { color: rgba(255, 255, 255, .85) !important; }
        .navbar .nav-link:hover { color: var(--manga) !important; }
        .navbar-text { color: rgba(255, 255, 255, .9) !important; }

        main.container { margin-top: 26px; }
        h3, h4 { color: var(--ink); font-weight: 700; }
        a { color: var(--laranja); }

        /* ===== Cards com sombra sólida deslocada (efeito Uiverse) ===== */
        .card {
            background: var(--card); color: var(--ink);
            border: 2px solid var(--laranja); border-radius: 14px;
            box-shadow: 6px 6px 0 var(--marinho); transition: all .2s ease;
        }
        .card:hover { transform: translate(-2px, -2px); box-shadow: 8px 8px 0 var(--marinho); }

        .table {
            background: var(--card); color: var(--ink); border-radius: 12px; overflow: hidden;
            box-shadow: 0 1px 2px rgba(28, 30, 42, .04), 0 14px 30px -20px rgba(28, 30, 42, .25);
        }
        .table > :not(caption) > * > * { border-color: var(--line); }
        .table thead th { color: var(--azul); text-transform: uppercase; font-size: 12px; letter-spacing: .04em; }
        .table.table-striped > tbody > tr:nth-of-type(odd) > * { background: var(--stripe); }

        .form-control:focus, .form-select:focus {
            border-color: var(--laranja); box-shadow: 0 0 0 .2rem rgba(243, 107, 46, .18);
        }

        /* ===== Efeito Uiverse (pílula + "salto" no hover) em TODOS os botões ===== */
        .btn {
            border-radius: 10em; font-weight: 600; padding: .5em 1.4em;
            transition: all .3s ease-in-out; box-shadow: 0 0 0 0 var(--marinho);
        }
        .btn:hover { transform: translateY(-4px) translateX(-2px); box-shadow: 2px 5px 0 0 var(--marinho); }
        .btn:active { transform: translateY(2px) translateX(1px); box-shadow: 0 0 0 0 var(--marinho); }
        .btn-sm { padding: .3em 1em; }

        .btn-success, .btn-primary { background: var(--laranja); color: #fff; border: 1px solid var(--marinho); }
        .btn-success:hover, .btn-primary:hover { background: var(--laranja); color: #fff; border-color: var(--marinho); }
        .btn-warning { background: transparent; border-color: var(--azul); color: var(--azul); }
        .btn-warning:hover { background: var(--azul); border-color: var(--azul); color: #fff; }
        .btn-danger { background: var(--marinho); border-color: var(--marinho); color: #fff; }
        .btn-danger:hover { background: var(--azul); border-color: var(--marinho); color: #fff; }
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
