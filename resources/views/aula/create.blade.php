@extends('layouts.userAI.app')

@section('content')
    <div class="container" style="margin-top: 120px; margin-bottom: 50px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Minhas Aulas</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovaAula">
                <i class="ai-plus me-2"></i>Nova Aula
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse($aulas as $aula)
                {{-- ... (Mantenha seu código dos cards aqui) ... --}}
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-lg">Nenhuma aula cadastrada ainda.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="modal fade" id="modalNovaAula" tabindex="-1" aria-labelledby="modalNovaAulaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovaAulaLabel">Cadastrar Nova Aula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('aula.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título da Aula ou Disciplina</label>
                            <input type="text" name="titulo" id="titulo" class="form-control"
                                placeholder="Ex: Cálculo I - Manhã" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Aula</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmarAtivacao(button) {
            const form = button.closest('.form-toggle');
            const latInput = form.querySelector('.input-lat');
            const lngInput = form.querySelector('.input-lng');

            // Se a aula estiver ATIVA, o professor quer ENCERRAR (Não precisa de GPS)
            if (button.classList.contains('btn-outline-danger')) {
                if (confirm("Deseja realmente encerrar a coleta de frequência desta aula?")) {
                    form.submit();
                }
                return;
            }

            // Se a aula estiver FECHADA, o professor quer HABILITAR (Precisa de GPS)
            if (navigator.geolocation) {
                const originalText = button.innerHTML;
                button.disabled = true;
                button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Localizando...';

                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        latInput.value = position.coords.latitude;
                        lngInput.value = position.coords.longitude;
                        form.submit();
                    },
                    (error) => {
                        alert("Erro: Para habilitar a aula, você deve permitir o acesso ao GPS nas configurações do seu navegador.");
                        button.disabled = false; // REABILITA o botão se houver erro
                        button.innerHTML = originalText;
                    },
                    { enableHighAccuracy: true, timeout: 5000 } // Adicionado para melhor precisão
                );
            } else {
                alert("Seu navegador não possui suporte para Geolocalização.");
            }
        }
    </script>
@endsection