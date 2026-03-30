@extends('layouts.userAI.app')

@section('content')
    <style>
        /* Estilos extras para harmonização */
        .card-title {
            min-height: 48px;
            /* Garante que o título sempre tenha o mesmo espaço */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-weight: 700;
            line-height: 1.2;
        }

        .badge-status {
            padding: 0.5em 1em;
            border-radius: 50rem;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .soft-success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .soft-secondary {
            background-color: #e2e3e5;
            color: #41464b;
        }

        .btn-action {
            transition: all 0.2s;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }
    </style>

    <div class="container py-5 mt-5">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
            <div>
                <h2 class="h3 mb-1">Minhas Aulas</h2>
                <p class="text-muted small mb-0">Gerencie a frequência e relatórios das suas turmas.</p>
            </div>
            <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalNovaAula">
                <i class="ai-plus me-2"></i>Cadastrar Aula
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="ai-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            @foreach($aulas as $aula)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100 btn-action">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title h6 mb-0 pe-2" title="{{ $aula->titulo }}">
                                    {{ $aula->titulo }}
                                </h5>
                                <span class="badge-status {{ $aula->is_ativa ? 'soft-success' : 'soft-secondary' }}">
                                    <i class="ai-circle-fill fs-xs me-1"></i> {{ $aula->is_ativa ? 'Aberta' : 'Fechada' }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <div class="text-muted small d-flex align-items-center mb-1">
                                    <i class="ai-calendar me-2"></i>
                                    <span>Data da Aula:
                                        <strong>{{ \Carbon\Carbon::parse($aula->data_aula)->format('d/m/Y') }}</strong></span>
                                </div>
                                <div class="text-muted style" style="font-size: 0.7rem;">
                                    <i class="ai-clock me-2"></i>Registrada: {{ $aula->created_at->format('d/m ') }}
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                {{-- Botão Principal: Habilitar/Encerrar --}}
                                <form action="{{ route('aula.toggle', $aula->id) }}" method="POST" class="geo-form">
                                    @csrf
                                    <input type="hidden" name="lat" class="lat">
                                    <input type="hidden" name="lng" class="lng">
                                    <button type="button" onclick="ativarAula(this)"
                                        class="btn w-100 btn-sm {{ $aula->is_ativa ? 'btn-danger' : 'btn-success' }}">
                                        <i class="ai-power me-2"></i>
                                        {{ $aula->is_ativa ? 'Encerrar Frequência' : 'Habilitar Frequência' }}
                                    </button>
                                </form>

                                {{-- Botões Secundários Lado a Lado --}}
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="{{ route('aula.relatorio', $aula->id) }}"
                                            class="btn btn-sm btn-outline-dark w-100">
                                            <i class="ai-list me-2"></i>Relatório
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('aula.destroy', $aula->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100"
                                                onclick="return confirm('Excluir esta aula e todas as suas presenças?')">
                                                <i class="ai-trash me-2"></i>Remover
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Nova Aula (Sem alterações de lógica, apenas limpeza visual) --}}
    <div class="modal fade" id="modalNovaAula" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title">Criar Nova Aula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('aula.store') }}" method="POST">
                    @csrf
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold text-uppercase">Professor</label>
                            <input type="text" class="form-control bg-light border-0" value="{{ Auth::user()->name }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-bold">Título da Disciplina</label>
                            <input type="text" name="titulo" id="titulo" class="form-control shadow-sm"
                                placeholder="Ex: Matemática Financeira" required>
                        </div>
                        <div class="mb-0">
                            <label for="data_aula" class="form-label fw-bold">Data da Aula</label>
                            <input type="date" name="data_aula" id="data_aula" class="form-control shadow-sm"
                                value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary px-4">Salvar Aula</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function ativarAula(btn) {
            const form = btn.closest('.geo-form');
            if (btn.classList.contains('btn-danger')) {
                if (confirm('Deseja encerrar a chamada agora?')) form.submit();
                return;
            }

            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>GPS...';

            navigator.geolocation.getCurrentPosition((pos) => {
                form.querySelector('.lat').value = pos.coords.latitude;
                form.querySelector('.lng').value = pos.coords.longitude;
                form.submit();
            }, (err) => {
                alert("Erro: É necessário permitir o GPS para habilitar a aula.");
                btn.disabled = false;
                btn.innerHTML = '<i class="ai-power me-2"></i>Habilitar Frequência';
            }, { enableHighAccuracy: true });
        }
    </script>
@endsection