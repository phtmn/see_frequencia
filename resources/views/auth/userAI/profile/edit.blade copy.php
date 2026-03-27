@extends('layouts.userAI.app')

@section('content')
<div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5 ">
    <div class="row pt-sm-2 pt-lg-0">

        <div class="col-lg-12 pt-4 pb-1 mt-2 pb-sm-4 ">
            <div class="d-sm-flex align-items-center mb-4">
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-dark">
                            <h5> Cadastrar Perfil do Produtor </h5>
                        </a></li>
                    {{-- <li class="breadcrumb-item "><a>Atualizar Perfil</a></li> --}}
                </ol>

                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <section class="card border-3 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                {{-- <div class="dropdown">
                                <a id="img" class="d-flex flex-column justify-content-end position-relative overflow-hidden rounded-circle bg-size-cover bg-position flex-shrink-0" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100px; height: 100px; background-image: url( @if (isset($user->image)) {{ asset('assets/img/userAI-image') }}/{{ $user->image }}@else {{ asset('assets/img/user.png') }} @endif );">
                                <span class="d-block text-light text-center lh-1 pb-1" style="background-color: rgba(0,0,0,.5)">
                                    <i class="ai-camera"></i></span>
                                </a>
                                <div class="dropdown-menu my-1">
                                    <a class="dropdown-item fw-normal" href="#">
                                        <input onchange="previewImagem()" type="file" id="image" name="image" value="{{ asset('assets/img/userAI-image') }}/{{ $user->image }}">

                                    </a>
                                </div>
                            </div>--}}

                            <div class="ps-3">
                                <div class="text-muted fw-medium d-flex flex-wrap flex-sm-nowrap align-iteems-center">
                                    <div class="d-flex align-items-center me-3"><i class="ai-mail me-1"></i>{{ $user->email }} </div>
                                    {{-- <div class="d-flex align-items-center text-nowrap"><i class="ai-map-pin me-1"></i>USA, $</div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">
                            <div class="col-sm-6">
                                <label class="form-label" for="fn">Nome Completo</label>
                                <input class="form-control" name="name" type="text" value="{{ $user->name }}" id="fn" placeholder="Nome Completo Produtor">
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label" for="fn">CPF</label>
                                <input class="form-control" name="cpf" type="text" value="{{ $user->cpf }}" id="cpf">
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label" for="fn">Data de Nascimento</label>
                                <input class="form-control" name="birthdate" type="text" value="{{ $user->birthdate }}" id="birthdate">
                            </div>
                            <div class="col-sm-2">
                                <label class="form-label" for="fn">Contato</label>
                                <input class="form-control" name="whatsapp" type="text" value="{{ $user->whatsapp }}" id="whatsapp" placeholder="WhatsApp">
                            </div>
                            <!-- Endereço, Bairro -->
                            <div class="col-md-6">
                                <label class="form-label" for="address_street">Endereço</label>
                                <input id="address_street" name="address_street" type="text" class="form-control" placeholder="Rua, nº, complemento"
                                    value="{{ old('address_street', $user->address_street ?? '') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="address_district">Bairro</label>
                                <input id="address_district" name="address_district" type="text" class="form-control" placeholder="Bairro"
                                    value="{{ old('address_district', $user->address_district ?? '') }}">
                            </div>
                            <!-- CEP e Município -->
                            <div class="col-md-2">
                                <label class="form-label" for="zipcode">CEP</label>
                                <input id="zipcode" name="zipcode" type="text" class="form-control" placeholder="00000-000"
                                    value="{{ old('zipcode', $user->zipcode ?? '') }}">
                            </div>
                           {{--  <div class="col-md-2 col-12">
                                    <label class="form-label" for="description">Município</label>
                                    <select class="form-control select" name="address_city" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="Água Branca">Água Branca</option>
                                        <option value="Aguiar">Aguiar</option>
                                        <option value="Alagoa Grande">Alagoa Grande</option>
                                        <option value="Alagoa Nova">Alagoa Nova</option>
                                        <option value="Alagoinha">Alagoinha</option>
                                        <option value="Alcantil">Alcantil</option>
                                        <option value="Algodão de Jandaíra">Algodão de Jandaíra</option>
                                        <option value="Alhandra">Alhandra</option>
                                        <option value="Amparo">Amparo</option>
                                        <option value="Aparecida">Aparecida</option>
                                        <option value="Araçagi">Araçagi</option>
                                        <option value="Arara">Arara</option>
                                        <option value="Araruna">Araruna</option>
                                        <option value="Areia">Areia</option>
                                        <option value="Areia de Baraúnas">Areia de Baraúnas</option>
                                        <option value="Areial">Areial</option>
                                        <option value="Aroeiras">Aroeiras</option>
                                        <option value="Assunção">Assunção</option>
                                        <option value="Baía da Traição">Baía da Traição</option>
                                        <option value="Bananeiras">Bananeiras</option>
                                        <option value="Baraúna">Baraúna</option>
                                        <option value="Barra de Santa Rosa">Barra de Santa Rosa</option>
                                        <option value="Barra de Santana">Barra de Santana</option>
                                        <option value="Barra de São Miguel">Barra de São Miguel</option>
                                        <option value="Bayeux">Bayeux</option>
                                        <option value="Belém">Belém</option>
                                        <option value="Belém do Brejo do Cruz">Belém do Brejo do Cruz</option>
                                        <option value="Bernardino Batista">Bernardino Batista</option>
                                        <option value="Boa Ventura">Boa Ventura</option>
                                        <option value="Boa Vista">Boa Vista</option>
                                        <option value="Bom Jesus">Bom Jesus</option>
                                        <option value="Bom Sucesso">Bom Sucesso</option>
                                        <option value="Bonito de Santa Fé">Bonito de Santa Fé</option>
                                        <option value="Boqueirão">Boqueirão</option>
                                        <option value="Borborema">Borborema</option>
                                        <option value="Brejo do Cruz">Brejo do Cruz</option>
                                        <option value="Brejo dos Santos">Brejo dos Santos</option>
                                        <option value="Caaporã">Caaporã</option>
                                        <option value="Cabaceiras">Cabaceiras</option>
                                        <option value="Cabedelo">Cabedelo</option>
                                        <option value="Cachoeira dos Índios">Cachoeira dos Índios</option>
                                        <option value="Cacimba de Areia">Cacimba de Areia</option>
                                        <option value="Cacimba de Dentro">Cacimba de Dentro</option>
                                        <option value="Cacimbas">Cacimbas</option>
                                        <option value="Caiçara">Caiçara</option>
                                        <option value="Cajazeiras">Cajazeiras</option>
                                        <option value="Cajazeirinhas">Cajazeirinhas</option>
                                        <option value="Caldas Brandão">Caldas Brandão</option>
                                        <option value="Camalaú">Camalaú</option>
                                        <option value="Campina Grande">Campina Grande</option>
                                        <option value="Capim">Capim</option>
                                        <option value="Caraúbas">Caraúbas</option>
                                        <option value="Carrapateira">Carrapateira</option>
                                        <option value="Casserengue">Casserengue</option>
                                        <option value="Catingueira">Catingueira</option>
                                        <option value="Catolé do Rocha">Catolé do Rocha</option>
                                        <option value="Caturité">Caturité</option>
                                        <option value="Conceição">Conceição</option>
                                        <option value="Condado">Condado</option>
                                        <option value="Conde">Conde</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Coremas">Coremas</option>
                                        <option value="Coxixola">Coxixola</option>
                                        <option value="Cruz do Espírito Santo">Cruz do Espírito Santo</option>
                                        <option value="Cubati">Cubati</option>
                                        <option value="Cuité">Cuité</option>
                                        <option value="Cuité de Mamanguape">Cuité de Mamanguape</option>
                                        <option value="Cuitegi">Cuitegi</option>
                                        <option value="Curral de Cima">Curral de Cima</option>
                                        <option value="Curral Velho">Curral Velho</option>
                                        <option value="Damião">Damião</option>
                                        <option value="Desterro">Desterro</option>
                                        <option value="Diamante">Diamante</option>
                                        <option value="Dona Inês">Dona Inês</option>
                                        <option value="Duas Estradas">Duas Estradas</option>
                                        <option value="Emas">Emas</option>
                                        <option value="Esperança">Esperança</option>
                                        <option value="Fagundes">Fagundes</option>
                                        <option value="Frei Martinho">Frei Martinho</option>
                                        <option value="Gado Bravo">Gado Bravo</option>
                                        <option value="Guarabira">Guarabira</option>
                                        <option value="Gurinhém">Gurinhém</option>
                                        <option value="Gurjão">Gurjão</option>
                                        <option value="Ibiara">Ibiara</option>
                                        <option value="Igaracy">Igaracy</option>
                                        <option value="Imaculada">Imaculada</option>
                                        <option value="Ingá">Ingá</option>
                                        <option value="Itabaiana">Itabaiana</option>
                                        <option value="Itaporanga">Itaporanga</option>
                                        <option value="Itapororoca">Itapororoca</option>
                                        <option value="Itatuba">Itatuba</option>
                                        <option value="Jacaraú">Jacaraú</option>
                                        <option value="Jericó">Jericó</option>
                                        <option value="João Pessoa">João Pessoa</option>
                                        <option value="Joca Claudino">Joca Claudino</option>
                                        <option value="Juarez Távora">Juarez Távora</option>
                                        <option value="Juazeirinho">Juazeirinho</option>
                                        <option value="Junco do Seridó">Junco do Seridó</option>
                                        <option value="Juripiranga">Juripiranga</option>
                                        <option value="Juru">Juru</option>
                                        <option value="Lagoa">Lagoa</option>
                                        <option value="Lagoa de Dentro">Lagoa de Dentro</option>
                                        <option value="Lagoa Seca">Lagoa Seca</option>
                                        <option value="Lastro">Lastro</option>
                                        <option value="Livramento">Livramento</option>
                                        <option value="Logradouro">Logradouro</option>
                                        <option value="Lucena">Lucena</option>
                                        <option value="Mãe d'Água">Mãe d'Água</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Mamanguape">Mamanguape</option>
                                        <option value="Manaíra">Manaíra</option>
                                        <option value="Marcação">Marcação</option>
                                        <option value="Mari">Mari</option>
                                        <option value="Marizópolis">Marizópolis</option>
                                        <option value="Massaranduba">Massaranduba</option>
                                        <option value="Mataraca">Mataraca</option>
                                        <option value="Matinhas">Matinhas</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Matureia">Matureia</option>
                                        <option value="Mogeiro">Mogeiro</option>
                                        <option value="Montadas">Montadas</option>
                                        <option value="Monte Horebe">Monte Horebe</option>
                                        <option value="Monteiro">Monteiro</option>
                                        <option value="Mulungu">Mulungu</option>
                                        <option value="Natuba">Natuba</option>
                                        <option value="Nazarezinho">Nazarezinho</option>
                                        <option value="Nova Floresta">Nova Floresta</option>
                                        <option value="Nova Olinda">Nova Olinda</option>
                                        <option value="Nova Palmeira">Nova Palmeira</option>
                                        <option value="Olho d'Água">Olho d'Água</option>
                                        <option value="Olivedos">Olivedos</option>
                                        <option value="Ouro Velho">Ouro Velho</option>
                                        <option value="Parari">Parari</option>
                                        <option value="Passagem">Passagem</option>
                                        <option value="Patos">Patos</option>
                                        <option value="Paulista">Paulista</option>
                                        <option value="Pedra Branca">Pedra Branca</option>
                                        <option value="Pedra Lavrada">Pedra Lavrada</option>
                                        <option value="Pedras de Fogo">Pedras de Fogo</option>
                                        <option value="Pedro Régis">Pedro Régis</option>
                                        <option value="Piancó">Piancó</option>
                                        <option value="Picuí">Picuí</option>
                                        <option value="Pilar">Pilar</option>
                                        <option value="Pilões">Pilões</option>
                                        <option value="Pilõezinhos">Pilõezinhos</option>
                                        <option value="Pirpirituba">Pirpirituba</option>
                                        <option value="Pitimbu">Pitimbu</option>
                                        <option value="Pocinhos">Pocinhos</option>
                                        <option value="Poço Dantas">Poço Dantas</option>
                                        <option value="Poço de José de Moura">Poço de José de Moura</option>
                                        <option value="Pombal">Pombal</option>
                                        <option value="Prata">Prata</option>
                                        <option value="Princesa Isabel">Princesa Isabel</option>
                                        <option value="Puxinanã">Puxinanã</option>
                                        <option value="Queimadas">Queimadas</option>
                                        <option value="Quixaba">Quixaba</option>
                                        <option value="Remígio">Remígio</option>
                                        <option value="Riachão">Riachão</option>
                                        <option value="Riachão do Bacamarte">Riachão do Bacamarte</option>
                                        <option value="Riachão do Poço">Riachão do Poço</option>
                                        <option value="Riacho de Santo Antônio">Riacho de Santo Antônio</option>
                                        <option value="Riacho dos Cavalos">Riacho dos Cavalos</option>
                                        <option value="Rio Tinto">Rio Tinto</option>
                                        <option value="Salgadinho">Salgadinho</option>
                                        <option value="Salgado de São Félix">Salgado de São Félix</option>
                                        <option value="Santa Cecília">Santa Cecília</option>
                                        <option value="Santa Cruz">Santa Cruz</option>
                                        <option value="Santa Helena">Santa Helena</option>
                                        <option value="Santa Inês">Santa Inês</option>
                                        <option value="Santa Luzia">Santa Luzia</option>
                                        <option value="Santa Rita">Santa Rita</option>
                                        <option value="Santa Terezinha">Santa Terezinha</option>
                                        <option value="Santana de Mangueira">Santana de Mangueira</option>
                                        <option value="Santana dos Garrotes">Santana dos Garrotes</option>
                                        <option value="Santo André">Santo André</option>
                                        <option value="São Bentinho">São Bentinho</option>
                                        <option value="São Bento">São Bento</option>
                                        <option value="São Domingos">São Domingos</option>
                                        <option value="São Domingos do Cariri">São Domingos do Cariri</option>
                                        <option value="São Francisco">São Francisco</option>
                                        <option value="São João do Cariri">São João do Cariri</option>
                                        <option value="São João do Rio do Peixe">São João do Rio do Peixe</option>
                                        <option value="São João do Tigre">São João do Tigre</option>
                                        <option value="São José da Lagoa Tapada">São José da Lagoa Tapada</option>
                                        <option value="São José de Caiana">São José de Caiana</option>
                                        <option value="São José de Espinharas">São José de Espinharas</option>
                                        <option value="São José de Piranhas">São José de Piranhas</option>
                                        <option value="São José de Princesa">São José de Princesa</option>
                                        <option value="São José do Bonfim">São José do Bonfim</option>
                                        <option value="São José do Brejo do Cruz">São José do Brejo do Cruz</option>
                                        <option value="São José do Sabugi">São José do Sabugi</option>
                                        <option value="São José dos Cordeiros">São José dos Cordeiros</option>
                                        <option value="São José dos Ramos">São José dos Ramos</option>
                                        <option value="São Mamede">São Mamede</option>
                                        <option value="São Miguel de Taipu">São Miguel de Taipu</option>
                                        <option value="São Sebastião de Lagoa de Roça">São Sebastião de Lagoa de Roça</option>
                                        <option value="São Sebastião do Umbuzeiro">São Sebastião do Umbuzeiro</option>
                                        <option value="São Vicente do Seridó">São Vicente do Seridó</option>
                                        <option value="Sapé">Sapé</option>
                                        <option value="Serra Branca">Serra Branca</option>
                                        <option value="Serra da Raiz">Serra da Raiz</option>
                                        <option value="Serra Grande">Serra Grande</option>
                                        <option value="Serra Redonda">Serra Redonda</option>
                                        <option value="Serraria">Serraria</option>
                                        <option value="Sertãozinho">Sertãozinho</option>
                                        <option value="Sobrado">Sobrado</option>
                                        <option value="Solânea">Solânea</option>
                                        <option value="Soledade">Soledade</option>
                                        <option value="Sossêgo">Sossêgo</option>
                                        <option value="Sousa">Sousa</option>
                                        <option value="Sumé">Sumé</option>
                                        <option value="Tacima">Tacima</option>
                                        <option value="Taperoá">Taperoá</option>
                                        <option value="Tavares">Tavares</option>
                                        <option value="Teixeira">Teixeira</option>
                                        <option value="Tenório">Tenório</option>
                                        <option value="Triunfo">Triunfo</option>
                                        <option value="Uiraúna">Uiraúna</option>
                                        <option value="Umbuzeiro">Umbuzeiro</option>
                                        <option value="Várzea">Várzea</option>
                                        <option value="Vieirópolis">Vieirópolis</option>
                                        <option value="Vista Serrana">Vista Serrana</option>
                                        <option value="Zabelê">Zabelê</option>
                                    </select>
                                </div>    --}}                        
                            <div class="col-md-6">
                                <label class="form-label" for="num_caf">Nº do CAF</label>
                                <input id="num_caf" name="num_caf" type="text" class="form-control"
                                    placeholder="PB000000.00.000000000CAF" value="{{ old('num_caf', $user->num_caf ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="num_car">Nº do CAR</label>
                                <input id="num_car" name="num_car" type="text" class="form-control"
                                    placeholder="PB-0000000-0000.0000.0000.0000.0000.0000.0000.0000">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Anexar CAF</label>
                                <div class="custom-file-wrapper">
                                    <input type="file" name="caf_file" accept=".pdf,.jpg,.jpeg,.png" class="form-control" id="cafFileInput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Anexar CAR</label>
                                <div class="custom-file-wrapper">
                                    <input type="file" name="car_file" accept=".pdf,.jpg,.jpeg,.png" class="form-control" id="carFileInput">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end pt-3">
                            <button class="btn btn-sm btn-outline-dark ms-3" type="submit"><i class="ai-check  me-2 ms-n1 "></i> Salvar
                            </button>
                        </div>
        </div>
    </div>
    </section>
    </form>
</div>

</div>
</div>

@endsection