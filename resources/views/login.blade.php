<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - TapCine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        /* Paleta TapCine: Rojo #DE1A1A + Ghost White #E8EBF7 */
        /* Plano de fundo em ondas (From Uiverse.io by romeo_3200) + brilho vermelho */
        body.login-cine {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                repeating-radial-gradient(circle at 0% 50%,
                    rgba(0, 0, 0, .04) 0px, rgba(0, 0, 0, .04) 2px,
                    transparent 2px, transparent 30px),
                radial-gradient(900px 500px at 50% -10%, rgba(222, 26, 26, .16), transparent 60%),
                #e8ebf7;
        }

        .login-box { width: 100%; max-width: 380px; }

        .login-box .card {
            border-radius: 16px;
            border: 2px solid #de1a1a;
            box-shadow: 6px 6px 0 #b81414;
            transition: all .2s ease;
        }
        .login-box .card:hover {
            transform: translate(-2px, -2px);
            box-shadow: 8px 8px 0 #b81414;
        }

        .cine-brand { text-align: center; margin-bottom: 20px; }
        .cine-brand .mark {
            display: inline-grid; place-items: center; width: 46px; height: 46px;
            border-radius: 12px; margin-bottom: 10px; color: #fff;
            background: linear-gradient(150deg, #de1a1a, #b81414);
            box-shadow: 0 0 0 1px rgba(222, 26, 26, .3), 0 10px 22px -10px rgba(222, 26, 26, .5);
        }
        .cine-brand h3 { color: #1c1e2a; font-weight: 700; letter-spacing: -.01em; margin: 0; }
        .cine-brand p { color: #6b7080; font-size: 12px; letter-spacing: .16em; text-transform: uppercase; margin: 4px 0 0; }

        .form-control:focus { border-color: #de1a1a; box-shadow: 0 0 0 .2rem rgba(222, 26, 26, .16); }

        /* Botão Uiverse adaptado à paleta: pílula com salto no hover */
        .btn-cine {
            background: #de1a1a; color: #fff; border: 1px solid #b81414;
            border-radius: 10em; font-weight: 600; padding: .6em 1.6em;
            transition: all .3s ease-in-out; box-shadow: 0 0 0 0 #b81414;
        }
        .btn-cine:hover { background: #de1a1a; color: #fff; transform: translateY(-4px) translateX(-2px); box-shadow: 2px 5px 0 0 #b81414; }
        .btn-cine:active { transform: translateY(2px) translateX(1px); box-shadow: 0 0 0 0 #b81414; }
    </style>
</head>

<body class="login-cine">
    <div class="login-box">
        <div class="card">
            <div class="card-body" style="padding: 28px 26px 26px">
                <div class="cine-brand">
                    <span class="mark" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="16" rx="2" />
                            <path d="M7 4v16M17 4v16M3 9h4M17 9h4M3 15h4M17 15h4" />
                        </svg>
                    </span>
                    <h3>TapCine</h3>
                    <p>Painel do administrador</p>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.autenticar') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="login" class="form-label"><i class="fa-solid fa-user"></i> Login</label>
                        <input type="text" name="login" class="form-control" value="{{ old('login') }}">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-cine w-100"><i class="fa-solid fa-right-to-bracket"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
