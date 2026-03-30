@extends('layouts.userAI.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="text-center mb-4">
        <h2 class="h4">Registrar Presença</h2>
        <p class="text-muted">Aulas disponíveis para o seu local atual</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger border-0 shadow-sm mb-4">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
    @endif

    <div class="row g-3">
        @forelse($aulasAbertas as $aula)
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex justify-content-between align-items-center p-4">
                        <div>
                            <h5 class="mb-1">{{ $aula->titulo }}</h5>
                            <p class="small text-muted mb-0">Prof: {{ $aula->professor->name }}</p>
                        </div>
                        
                        <form action="{{ route('aluno.registrar') }}" method="POST" class="aluno-form">
                            @csrf
                            <input type="hidden" name="aula_id" value="{{ $aula->id }}">
                            <input type="hidden" name="lat" class="al_lat">
                            <input type="hidden" name="lng" class="al_lng">
                            
                            <button type="button" onclick="confirmarPresenca(this)" class="btn btn-primary">
                                <i class="ai-check me-2"></i>Confirmar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="ai-info-circle fs-1 text-muted mb-3 d-block"></i>
                <p class="text-muted">Nenhuma aula com frequência aberta no momento.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
function confirmarPresenca(btn) {
    const form = btn.closest('.aluno-form');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Validando...';

    navigator.geolocation.getCurrentPosition((pos) => {
        form.querySelector('.al_lat').value = pos.coords.latitude;
        form.querySelector('.al_lng').value = pos.coords.longitude;
        form.submit();
    }, (err) => {
        alert("Ative seu GPS para confirmar a presença.");
        btn.disabled = false;
        btn.innerHTML = "Confirmar";
    }, { enableHighAccuracy: true });
}
</script>
@endsection