@extends('layouts.userAI.app')

@section('content')
    <div class="container py-5 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0">Minhas Aulas</h2>
            <a href="{{ route('aula.create') }}" class="btn btn-primary btn-sm">Nova Aula</a>
        </div>

        <div class="row g-3">
            @foreach($aulas as $aula)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title text-truncate">{{ $aula->titulo }}</h5>
                                <span class="badge {{ $aula->is_ativa ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $aula->is_ativa ? 'Aberta' : 'Fechada' }}
                                </span>
                            </div>

                            <p class="small text-muted mb-4">Criada em: {{ $aula->created_at->format('d/m H:i') }}</p>

                            <div class="d-grid gap-2">
                                <form action="{{ route('aula.toggle', $aula->id) }}" method="POST" class="geo-form">
                                    @csrf
                                    <input type="hidden" name="lat" class="lat">
                                    <input type="hidden" name="lng" class="lng">

                                    <button type="button" onclick="ativarAula(this)"
                                        class="btn w-100 {{ $aula->is_ativa ? 'btn-outline-danger' : 'btn-success' }}">
                                        <i class="ai-power me-2"></i>
                                        {{ $aula->is_ativa ? 'Encerrar Frequência' : 'Habilitar Frequência' }}
                                    </button>
                                </form>

                                <a href="{{ route('aula.relatorio', $aula->id) }}" class="btn btn-outline-dark">
                                    <i class="ai-list me-2"></i>Ver Relatório
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function ativarAula(btn) {
            const form = btn.closest('.geo-form');
            // Se for para encerrar, não precisa de GPS
            if (btn.classList.contains('btn-outline-danger')) { form.submit(); return; }

            btn.disabled = true;
            btn.innerHTML = "Obtendo GPS...";

            navigator.geolocation.getCurrentPosition((pos) => {
                form.querySelector('.lat').value = pos.coords.latitude;
                form.querySelector('.lng').value = pos.coords.longitude;
                form.submit();
            }, (err) => {
                alert("Erro: Ative o GPS para habilitar a aula.");
                btn.disabled = false;
                btn.innerHTML = "Habilitar Frequência";
            });
        }
    </script>
@endsection