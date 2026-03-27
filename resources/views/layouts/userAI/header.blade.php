<header class="navbar navbar-expand-lg fixed-top bg-light border-bottom">
    <div class="container">

        {{-- <a href="{{ route('dashboard') }}" class="navbar-brand pe-sm-0">
            <span class="text-primary flex-shrink-0">
                <img class="d-block mb-2" src="{{ asset('assets/img/SEAFDS.png') }}" width="325" alt="Logo">
            </span>
        </a> --}}

        <div class="dropdown nav d-none d-sm-block order-lg-3">
            <a class="nav-link d-flex align-items-center p-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="ps-2 text-end">
                    <div class="fs-sm dropdown-toggle fw-bold text-dark">{{ strtok(Auth::user()->name, ' ') }}</div>
                    <div class="fs-xs lh-1 opacity-60 text-uppercase">{{ Auth::user()->role }}</div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end my-1">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="ai-user fs-lg opacity-70 me-2"></i>Perfil
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="ai-logout fs-lg opacity-70 me-2"></i>Sair
                    </a>
                </form>
            </div>
        </div>

        <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">

                {{-- Links Comuns
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                </li> --}}

                {{-- Menu exclusivo para PROFESSOR --}}

                <li class="nav-item">
                    <a href="{{ route('aula.index') }}"
                        class="nav-link {{ request()->routeIs('aula.*') ? 'active' : '' }}">Minhas Aulas</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('report.index') }}"
                        class="nav-link {{ request()->routeIs('report.*') ? 'active' : '' }}">Relatórios de Presença</a>
                </li>
                @if(Auth::user()->role == 'professor')
                    <li class="nav-item">
                        <a href="{{ route('aula.index') }}"
                            class="nav-link {{ request()->routeIs('aula.*') ? 'active' : '' }}">Minhas Aulas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('report.index') }}"
                            class="nav-link {{ request()->routeIs('report.*') ? 'active' : '' }}">Relatórios de Presença</a>
                    </li>
                @endif

                {{-- Menu exclusivo para ALUNO --}}
                @if(Auth::user()->role == 'aluno')
                    <li class="nav-item">
                        <a href="{{ route('frequencia.create', 0) }}"
                            class="nav-link {{ request()->routeIs('frequencia.*') ? 'active' : '' }}">Registrar Presença</a>
                    </li>
                @endif

                <li class="nav-item d-sm-none border-top mt-2 pt-2">
                    <div class="px-3 mb-2">
                        <div class="fs-sm fw-bold">{{ Auth::user()->name }}</div>
                        <div class="fs-xs opacity-60">{{ Auth::user()->email }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="ai-logout fs-lg opacity-70 me-2"></i>Sair
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>

{{-- Banner de espaçamento ou institucional abaixo do menu fixed-top --}}
<div style="margin-top: 100px;">
    <img class="d-block mb-2" src="https://ceasapb.ctlc.org.br/assets/img/aa.png" width="100%">
</div>