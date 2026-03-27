@extends('layouts.userAI.app')

@section('content')
<div class="container py-5 mt-5">
    <a href="{{ route('aula.index') }}" class="btn btn-link p-0 mb-3"><i class="ai-arrow-left me-2"></i>Voltar</a>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Relatório: {{ $aula->titulo }}</h4>
            <small class="text-muted">Total de presenças: {{ $aula->frequencias->count() }}</small>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Aluno</th>
                        <th>Data/Hora</th>
                        <th>Status GPS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aula->frequencias as $frequencia)
                    <tr>
                        <td>{{ $frequencia->aluno->name }}</td>
                        <td>{{ $frequencia->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <span class="badge bg-info">Presente</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Nenhum aluno registrou presença ainda.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection