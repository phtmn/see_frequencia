@extends('layouts.userAI.app')
@section('content')
 


<div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
    
    <div class="row pt-sm-2 pt-lg-0">
        
        <div class="col-lg-12 pt-4 pb-1 mt-2 pb-sm-4">
            <div class="d-sm-flex align-items-center mb-4">
            </div>
            <nav aria-label="breadcrumb">
  <ol class="breadcrumb">

    <li class="breadcrumb-item "><a ><h5> Produtos Cadastrados</h5></a></li>    
  </ol>
</nav>
            <div class="card border-3 py-1 p-md-2 p-xl-3 p-xxl-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <div class="h4 mb-0">
                            <a class="btn btn-secondary bg text-dark  me-3 me-sm-4" type="button" href="{{ route('product.create') }}"><i class="ai-plus me-2 ms-n1 ">
                                </i> Cadastrar Produto</a>
                        </div>
                        <div class=" mb-0">
                            @if (session('error'))
                            <span id="alert" class="badge bg-secondary fs-sm">{{ session('error') }}!</span>
                            @endif
                        </div>
                    </div>
                    <img class="d-block  mb-2" src="{{ asset('assets/img/ab.png') }}" width="100%"> </span>  </a>  
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                {{--  <th class="text-center">Id.</th> --}}
                                    <th class="text-center">Produto</th>
                                     <th class="text-center">Quantidade</th>
                                     <th class="text-center">Unidade</th>                                                                   
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Mês Disponível</th>
                                    <th class="text-end"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($product as $product)
                                <tr>
                                  {{--  <td class="text-center"><b>[{{ $product->id }}]</b></td> --}}
                                    <td class="text-center"><b>{{ $product->product }} </b></td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-center">{{ $product->unit }}</td>
                                    <td class="text-center">{{ $product->type }}</td>
                                    <td class="text-center">{{ $product->availability }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <!-- Botão de editar -->
                                            <!-- Formulário de exclusão -->
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
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
                                    <td colspan="4" class="text-center">Nenhum produto cadastrado.</td>
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