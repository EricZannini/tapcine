<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="{{ url('/') }}"><i class="fa-solid fa-clapperboard"></i> TapCine</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Início</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is('filme*', 'sessao*', 'ficha*', 'ator*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-film"></i> Cinema</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ request()->is('filme*') ? 'active' : '' }}" href="{{ url('filme') }}"><i class="fa-solid fa-film"></i> Filmes</a></li>
            <li><a class="dropdown-item {{ request()->is('sessao*') ? 'active' : '' }}" href="{{ url('sessao') }}"><i class="fa-solid fa-clock"></i> Sessões</a></li>
            <li><a class="dropdown-item {{ request()->is('ficha*') ? 'active' : '' }}" href="{{ url('ficha') }}"><i class="fa-solid fa-clipboard-list"></i> Fichas</a></li>
            <li><a class="dropdown-item {{ request()->is('ator*') ? 'active' : '' }}" href="{{ url('ator') }}"><i class="fa-solid fa-user-tie"></i> Atores</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is('ingresso*', 'produto*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-cash-register"></i> Vendas</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ request()->is('ingresso*') ? 'active' : '' }}" href="{{ url('ingresso') }}"><i class="fa-solid fa-ticket"></i> Ingressos</a></li>
            <li><a class="dropdown-item {{ request()->is('produto*') ? 'active' : '' }}" href="{{ url('produto') }}"><i class="fa-solid fa-cookie-bite"></i> Produtos</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is('graficos*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-chart-pie"></i> Relatórios</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item {{ request()->is('graficos*') ? 'active' : '' }}" href="{{ url('graficos') }}"><i class="fa-solid fa-chart-pie"></i> Gráficos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('relatorio.produtos') }}"><i class="fa-solid fa-file-pdf"></i> PDF de Produtos</a></li>
            <li><a class="dropdown-item" href="{{ route('relatorio.ingressos') }}"><i class="fa-solid fa-file-pdf"></i> PDF de Ingressos</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->is('quiz*') ? 'active' : '' }}" href="{{ url('quiz') }}"><i class="fa-solid fa-circle-question"></i> Quiz</a>
        </li>
      </ul>
      @if (session()->has('usuario_id'))
        <span class="navbar-text me-3">Olá, {{ session('usuario_nome') }}</span>
        <a class="btn btn-outline-light btn-sm" href="{{ url('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
      @endif
    </div>
  </div>
</nav>
