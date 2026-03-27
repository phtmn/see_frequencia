@extends('layouts.userAI.app')
@section('content')
<div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
    <div class="row pt-sm-2 pt-lg-0">
        <div class="col-lg-12 pt-4 pb-1 mt-2 pb-sm-4">
            <div class="d-sm-flex align-items-center mb-4">
            </div>
            <ol class="breadcrumb">

                <li class="breadcrumb-item "><a>
                        <h5> Cadastrar Cotação </h5>
                    </a></li>
            </ol>
            <section class="card border-3 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <h2 class="h4 mb-0"> <a class="btn btn-secondary bg text-dark me-3 me-sm-4" type="button"
                                href="{{ route('price.index') }}"><i class="ai-undo me-2 ms-n1"></i>Voltar</a></h2>
                    </div>
                    <img class="d-block  mb-2" src="{{ asset('assets/img/ab.png') }}" width="100%"> </span> </a>
                    <form action="{{ route('price.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3 container">
                            <br>
                            <div class="row">
                                <div class="col-md-3 col-12 p-1">
                                    <label class="form-label" for="fn">Cotado em</label>
                                    <!-- Campo exibido (somente leitura) -->
                                    <input class="form-control" type="text"
                                        value="{{ now()->format('m/Y') }}" readonly>

                                    <!-- Campo real que vai para o BD -->
                                    <input type="hidden" name="datetime"
                                        value="{{ now()->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-4 col-12 p-1">
                                    <label class="form-label" for="product">Produto</label>
                                    <select class="form-control" name="product_id" id="product" required>
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product }} ({{ $product->quantity }} {{ $product->unit }})</option>
                                        @endforeach
                                    </select>
                                </div>      
                                <div class="col-md-2 col-12 p-1">
                                    <label class="form-label" for="description">Preço Mínimo (R$)</label>
                                    <input class="form-control" 
                                    type="text" 
                                    name="price" 
                                    id="price" 
                                    required 
                                    placeholder="R$" 
                                    oninput="moeda(this, '.', ',', event)">
                                </div>
                                <div class="col-md-3 col-12 p-1">
                                    <label class="form-label" for="description">Disponível para Aquisição</label>
                                    <select class="form-control" name="acquisition" id="acquisition" required>
                                        <option value="" disabled selected>Selecione</option>                                        
                                        <option value="S">Sim</option>
                                        <option value="N">Não</option>                                       
                                    </select>
                                </div>

                            </div>
                            <div class="col-12 d-flex justify-content-end pt-3">
                                <button class="btn btn-sm btn-outline-dark ms-3" type="submit"><i
                                        class="ai-check me-2 ms-n1"></i>Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
<script>
function moeda(a, e, r, t) {
    let v = a.value.replace(/\D/g, "");
    v = (v / 100).toFixed(2) + "";
    v = v.replace(".", r);
    v = v.replace(/\B(?=(\d{3})+(?!\d))/g, e);
    a.value = v;
    return false;
}
</script>
