@extends('layouts.userAI.app')
@section('content')
<div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">

    <div class="row pt-sm-2 pt-lg-0">
        <div class="col-lg-12 pt-4 pb-1 mt-2 pb-sm-4">
            <div class="d-sm-flex align-items-center mb-4">

            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item "><a>
                            <h5>Cadastrar Produto</h5>
                        </a></li>
                </ol>

            </nav>
            <section class="card border-3 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <h2 class="h4 mb-0"> <a class="btn btn-secondary bg text-dark me-3 me-sm-4" type="button"
                                href="{{ route('product.index') }}"><i class="ai-undo me-2 ms-n1"></i>Voltar</a></h2>

                    </div>
                    <img class="d-block  mb-2" src="{{ asset('assets/img/ab.png') }}" width="100%"> </span> </a>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3 container">
                            <br>
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <!-- Produto -->
                                <div class="col-md-4 col-12 p-1">
                                    <label class="form-label" for="description">Produto</label>
                                    <select id="product" class="form-control select" name="product" required>
                                        <div class="col-md-3 col-12 p-1">
                                            <label class="form-label" for="description">Produto</label>
                                            <option value="" disabled selected>Selecione</option>
                                            <option value="Abacate">Abacate</option>
                                            <option value="Abacaxi">Abacaxi</option>
                                            <option value="Abóbora Cabocla">Abóbora Cabocla</option>
                                            <option value="Abóbora Leite">Abóbora Leite</option>
                                            <option value="Abobrinha">Abobrinha</option>
                                            <option value="Acelga">Acelga</option>
                                            <option value="Acerola">Acerola</option>
                                            <option value="Alface Lisa">Alface Lisa</option>
                                            <option value="Alho">Alho</option>
                                            <option value="Arroz Vermelho">Arroz Vermelho ⁴ </option>
                                            <option value="Banana Pacovan">Banana Pacovan</option>
                                            <option value="Banana Prata">Banana Prata</option>
                                            <option value="Batata Doce">Batata Doce</option>
                                            <option value="Batata Inglesa">Batata Inglesa</option>
                                            <option value="Bebida Láctea">Bebida Láctea ¹</option>
                                            <option value="Berinjela">Berinjela</option>
                                            <option value="Beterraba">Beterraba</option>
                                            <option value="Bolos Diversos">Bolos Diversos ³</option>
                                            <option value="Brócolis Ramoso">Brócolis Ramoso</option>
                                            <option value="Caju">Caju</option>
                                            <option value="Carne Bovina (Dianteiro Com Osso)">Carne Bovina (Dianteiro Com Osso) ¹</option>
                                            <option value="Carne Bovina (Ponta De Agulha)">Carne Bovina (Ponta De Agulha) ¹</option>
                                            <option value="Carne Caprina">Carne Caprina ¹</option>
                                            <option value="Carne Ovina (Carcaça)">Carne Ovina (Carcaça) ¹</option>
                                            <option value="Carne Suína (Carcaça)">Carne Suína (Carcaça) ¹</option>
                                            <option value="Cebola Pera">Cebola Pera</option>
                                            <option value="Cebolinha">Cebolinha</option>
                                            <option value="Cenoura">Cenoura</option>
                                            <option value="Chuchu">Chuchu</option>
                                            <option value="Cocada De Leite">Cocada De Leite</option>
                                            <option value="Coco Seco">Coco Seco</option>
                                            <option value="Coco Verde">Coco Verde</option>
                                            <option value="Coentro">Coentro</option>
                                            <option value="Couve">Couve</option>
                                            <option value="Couve-Flor">Couve-Flor</option>
                                            <option value="Doce De Frutas (Compota)">Doce De Frutas (Compota) ¹</option>
                                            <option value="Doce De Leite (Compota)">Doce De Leite (Compota) ¹</option>
                                            <option value="Espinafre">Espinafre</option>
                                            <option value="Feijão Verde">Feijão Verde</option>
                                            <option value="Feijão Verde (À Vácuo)">Feijão Verde (À Vácuo)</option>
                                            <option value="Frango Caipira">Frango Caipira ¹</option>
                                            <option value="Frango De Granja">Frango De Granja ¹</option>
                                            <option value="Goiaba">Goiaba</option>
                                            <option value="Goma De Mandioca">Goma De Mandioca</option>
                                            <option value="Graviola">Graviola</option>
                                            <option value="Iogurte De Frutas (Leite De Cabra)">Iogurte De Frutas (Leite De Cabra) ¹</option>
                                            <option value="Iogurte De Frutas (Leite De Vaca)">Iogurte De Frutas (Leite De Vaca) ¹</option>
                                            <option value="Inhame Da Costa">Inhame Da Costa</option>
                                            <option value="Inhame São Tomé">Inhame São Tomé (cará)</option>
                                            <option value="Jaca">Jaca</option>
                                            <option value="Laranja Pera">Laranja Pera</option>
                                            <option value="Leite De Cabra Pasteurizado">Leite De Cabra Pasteurizado ¹</option>
                                            <option value="Leite De Vaca Pasteurizado">Leite De Vaca Pasteurizado ¹</option>
                                            <option value="Limão Tahiti">Limão Tahiti</option>
                                            <option value="Macaxeira">Macaxeira</option>
                                            <option value="Macaxeira À Vácuo">Macaxeira À Vácuo ¹</option>
                                            <option value="Mamão Formosa">Mamão Formosa</option>
                                            <option value="Mamão Havaí">Mamão Havaí</option>
                                            <option value="Manga Espada">Manga Espada</option>
                                            <option value="Manga Tommy">Manga Tommy</option>
                                            <option value="Manteiga Da Terra (De Garrafa)">Manteiga Da Terra (De Garrafa) ¹</option>
                                            <option value="Maracujá">Maracujá</option>
                                            <option value="Maxixe">Maxixe</option>
                                            <option value="Mel De Abelha (Pote 1kg)">Mel De Abelha (Pote 1kg) ¹</option>
                                            <option value="Melancia">Melancia</option>
                                            <option value="Melão Espanhol">Melão Espanhol</option>
                                            <option value="Milho Verde">Milho Verde</option>
                                            <option value="Nata">Nata ¹</option>
                                            <option value="Ovos Caipira">Ovos Caipira ¹</option>
                                            <option value="Pescado De Cativeiro (Beneficiado)">Pescado De Cativeiro (Beneficiado) ¹ ⁶ ⁸</option>
                                            <option value="Pescado De Cativeiro (In Natura)">Pescado De Cativeiro (In Natura) ¹ ⁵ ⁸</option>
                                            <option value="Pescado Artesanal (In Natura)">Pescado Artesanal (Beneficiado) ¹ ⁶ ⁹</option>
                                            <option value="Pescado Artesanal (In Natura)">Pescado Artesanal (In Natura) ¹ ⁵ ⁹</option>
                                            <option value="Pepino">Pepino</option>
                                            <option value="Pimentão Verde">Pimentão Verde</option>
                                            <option value="Pinha">Pinha</option>
                                            <option value="Polpa De Abacaxi">Polpa De Abacaxi ²</option>
                                            <option value="Polpa De Acerola">Polpa De Acerola ²</option>
                                            <option value="Polpa De Cajá">Polpa De Cajá ²</option>
                                            <option value="Polpa De Caju">Polpa De Caju ²</option>
                                            <option value="Polpa De Goiaba">Polpa De Goiaba ²</option>
                                            <option value="Polpa De Manga">Polpa De Manga ²</option>
                                            <option value="Polpa De Mangaba">Polpa De Mangaba ²</option>
                                            <option value="Polpa De Maracujá">Polpa De Maracujá ²</option>
                                            <option value="Polpa De Tamarindo">Polpa De Tamarindo ²</option>
                                            <option value="Polpa De Umbu">Polpa De Umbu ²</option>
                                            <option value="Polpa De Umbu-Cajá">Polpa De Umbu-Cajá ²</option>
                                            <option value="Queijo De Coalho">Queijo De Coalho ¹</option>
                                            <option value="Queijo Manteiga">Queijo Manteiga ¹</option>
                                            <option value="Quiabo">Quiabo</option>
                                            <option value="Rapadura (Inteira)">Rapadura (Inteira) ³</option>
                                            <option value="Repolho">Repolho</option>
                                            <option value="Rúcula">Rúcula</option>
                                            <option value="Tangerina">Tangerina</option>
                                            <option value="Tomate">Tomate</option>
                                            <option value="Uva Isabel">Uva Isabel</option>
                                            <option value="Vagem">Vagem</option>
                                    </select>
                                </div>
                                                                
                                <div class="col-md-2 col-12 p-1">
                                    <label class="form-label" for="fn">Quantidade</label>
                                    <input class="form-control" 
                                    name="quantity" 
                                    type="number" 
                                    step="1" 
                                    min="0" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    >                   
                                </div>
                                                                
                                <!-- Unidade -->
                                <div class="col-md-2 col-12 p-1">
                                    <label class="form-label" for="description">Unidade</label>
                                    <select class="form-control select" name="unit" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Ar">Arroba</option>
                                        <option value="Dz">Dúzia (Dz)</option>
                                        <option value="Kg">Quilo (Kg)</option>
                                        <option value="L">Litro (L)</option>
                                        <option value="T">Tonelada (T)</option>
                                        <option value="Un">Unidade (Un)</option>
                                    </select>
                                </div>
                                <!-- Tipo -->
                                <div class="col-md-2 col-12 p-1">
                                    <label class="form-label" for="description">Tipo</label>
                                    <select class="form-control select" name="type" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Beneficiado">Beneficiado</option>
                                        <option value="Congelado">Congelado</option>
                                        <option value="In natura">In natura</option>
                                        <option value="Processado">Processado</option>
                                        <option value="Refrigerado">Refrigerado</option>
                                    </select>
                                </div>


                                <div class="col-md-2 col-12 p-1">
                                    <label class="form-label" for="description">Mês Disponível</label>
                                    <select class="form-control select" name="availability" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Janeiro">Janeiro</option>
                                        <option value="Fevereiro">Fevereiro</option>
                                        <option value="Março">Março</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Maio">Maio</option>
                                        <option value="Junho">Junho</option>
                                        <option value="Julho">Julho</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Setembro">Setembro</option>
                                        <option value="Outubro">Outubro</option>
                                        <option value="Novembro">Novembro</option>
                                        <option value="Dezembro">Dezembro</option>
                                    </select>
                                </div>

                                <div class="col-md-12 col-12 p-1 mt-2">
                                    <!-- Default accordion -->
                                    <div class="accordion" id="accordionDefault">

                                        <!-- Item -->
                                        <div class="accordion-item">
                                            <h3 class="accordion-header" id="headingOne">
                                                <button class="accordion-button text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Importante!</button>
                                            </h3>
                                            <div class="accordion-collapse collapse " id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionDefault">
                                                <div class="accordion-body fs-sm">
                                                    <p> <b>(1) </b> Produtos de estabelecimentos que possuam registra no <b> SIF </b>- Serviço de Inspeção Federal ou <b> SIE </b> - Serviço de Inspeção Estadual ou <b> SIM </b> - Sistema de Inspeção Municipal ou ainda no SISEWPOA. </p>
                                                    <p> <b>(2) </b> O estabelecimento e a bebida devem ter registros no Ministério da Agricultura, Pecuária e Abastecimento - MAPA. </p>
                                                    <p> <b>(3) </b> O estabelecimento deve ter Alvará Sanitário ou Licença de Funcionamento, sendo que, alguns desses produtos devem também ter registros conforme os Anexos I e II da RDC N° 27.2010 da ANVISA. </p>
                                                    <p> <b>(4) </b> Produto devem estar embalados e com selo de Classificação do Ministério da Agricultura, Pecuária e Abastecimento - MAPA. </p>
                                                    <p> <b>(5) </b> Produtos in natura: quando o produto está em seu estado natural, sem qualquer beneficiado. </p>
                                                    <p> <b>(5) </b> Produto beneficiado: produto minimamente processado (eviscerado, embalado e com selo de qualidade sanitária). </p>
                                                    <p> <b>(7) </b> Pescados artesanais: atividade produtiva sem interferência tecnológica. </p>
                                                    <p> <b>(8) </b> Espécies de pescados de cativeiro: <b>Tilápia, Tarabaqui, Paru, Carpa e outros. </b></p>
                                                    <p> <b>(9) </b> Espécies de pescados artesanal: <b>Tucunaré, Traíra, Piau, Curimatã, Corró, Cascudo e outros.</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end pt-3">
                                <button class="btn btn-sm btn-outline-dark ms-3" type="submit"><i
                                        class="ai-check  me-2 ms-n1 "></i> Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection