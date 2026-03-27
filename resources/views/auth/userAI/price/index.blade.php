@extends('layouts.userAI.app')
@section('content')
<div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
    <div class="row pt-sm-2 pt-lg-0">
        <div class="col-lg-12 pt-4 pb-1 mt-2 pb-sm-4">
            <div class="d-sm-flex align-items-center mb-4">
            </div>
             <ol class="breadcrumb"> 
    
    <li class="breadcrumb-item "><a ><h5>Cotações Cadastradas</h5></a></li>    
  </ol>
            <div class="card border-3 py-1 p-md-2 p-xl-3 p-xxl-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <div class="h4 mb-0">
                            <a class="btn btn-secondary bg text-dark me-3 me-sm-4" type="button" href="{{ route('price.create') }}"><i class="ai-plus me-2 ms-n1 ">
                                </i> Cadastrar Preço</a>
                        </div>
                        <div class=" mb-0">
                            @if (session('error'))
                            <span id="alert" class="badge bg-secondary  fs-sm">{{ session('error') }}! </span>
                            @endif
                        </div>
                    </div>
                    <img class="d-block  mb-2" src="{{ asset('assets/img/ab.png') }}" width="100%"> </span>  </a>  
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Data da Cotação</th>
                                    <th class="text-center">Produto</th>                                  
                                    <th class="text-center">Preço (R$)</th>
                                {{--   <th class="text-center">Preço Máximo (R$)</th> --}}
                                  <th class="text-center">Disponível para Aquisição</th> 
                                    <th class="text-end"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($price as $price)
                                <tr>
                                    <td class="text-center"><b>{{ \Carbon\Carbon::parse($price->datatime)->format('d/m/Y') }} </b></td>
                                    <td class="text-center"><b>{{  $price->product->product ?? 'Produto não encontrado' }} ({{ $price->product->quantity }} {{ $price->product->unit }})</b>                                    
                                    </td>                                    
                                    <td class="text-center">R$ {{ number_format($price->price, 2, ',', '.') }}</td>
                                  {{--  <td class="text-center">{{ number_format($price->pricemax, 2, ',', '.') }}</td> --}}
                                    <td class="text-center">{{ $price->acquisition == 'S' ? 'Sim' : 'Não' }}</td> 
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <!-- Botão de editar -->
                                            <!-- Formulário de exclusão -->
                                            <form action="{{ route('price.destroy', $price->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-secondary btn-sm" title="Excluir">
                                                    <i class="ai-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhuma cotação cadastrada.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
       
    </div>
</div>


@endsection

<script>
    setTimeout(function() {
        let alert = document.getElementById('alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000);
</script>