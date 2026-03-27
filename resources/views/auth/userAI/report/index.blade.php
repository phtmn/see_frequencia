@extends('layouts.userAI.app')
@section('content')



<div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">

    <div class="row pt-sm-2 pt-lg-0">

        <div class="col-lg-12 pt-4 pb-1 mt-2 pb-sm-4">
            <div class="d-sm-flex align-items-center mb-4">
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-dark">Relatórios</a></li>

                </ol>
            </nav>
            <div class="card border-3 py-1 p-md-2 p-xl-3 p-xxl-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <div class="h4 mb-0">
                          {{--  <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-bs-toggle="tab" role="tab">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-bs-toggle="tab" role="tab">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-bs-toggle="tab" role="tab">Home</a>
                                </li>
                                 
                            </ul>

                            <a class="btn btn-secondary bg text-dark  me-3 me-sm-4" type="button" href="{{ route('product.create') }}"><i class="ai-plus me-2 ms-n1 ">
                                </i> Cadastrar </a> --}}
                        </div>
                        <div class=" mb-0">

                        </div>
                    </div>
                    <img class="d-block  mb-2" src="{{ asset('assets/img/ab.png') }}" width="100%"> </span> </a>
                    <div class="table-responsive">
                         <iframe 
                         width="600" 
                         height="750" 
                         src="https://lookerstudio.google.com/embed/reporting/65c3b006-ad3c-4002-89a1-f07d61593b6e/page/DaieE" 
                         frameborder="0" style="border:0" 
                         allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                        </iframe>
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