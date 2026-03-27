@extends('layouts.userAI.app')

@section('content')
<div class="container py-3 py-lg-5 mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <span class="fs-5 fw-bold text-dark">Perfil</span>
                    </li>
                </ol>
            </nav>

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <section class="card border-0 shadow-sm p-3 p-md-4 mb-4">
                    <div class="card-body p-0">
                        <div class="row g-3">
                            
                            <div class="col-12 col-md-7">
                                <label class="form-label fw-semibold" for="name">Nome Completo</label>
                                <input class="form-control" name="name" type="text" 
                                       value="{{ Auth::user()->name }}" id="name" required>
                            </div>

                            <div class="col-12 col-md-5">
                                <label class="form-label fw-semibold" for="email">E-mail (Contato)</label>
                                <input class="form-control bg-light" name="email" type="email" 
                                       value="{{ Auth::user()->email }}" id="email" readonly>
                                <div class="form-text fs-xs">O e-mail não pode ser alterado.</div>
                            </div>                           

                        </div>

                        <div class="d-grid d-sm-flex justify-content-sm-end pt-4">
                            <button class="btn btn-primary" type="submit">
                                <i class="ai-check me-2"></i> Salvar
                            </button>
                        </div>
                    </div>
                </section>
            </form>
            
        </div>
    </div>
</div>
@endsection