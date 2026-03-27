$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#address").val("");
        $("#district").val("");
        // $("#city").val("");
        // $("#state").val("");
    }

  function limpa_formulário_cep_contabilidade() {
    // Limpa valores do formulário de cep.
    $("#contabilidade_rua").val("");
    $("#contabilidade_bairro").val("");
    $("#contabilidade_cidade").val("");
    // $("#contabilidade_uf").val("");
  }
            
    //Quando o campo cep perde o foco.
    $("#zipcode").blur(function() {

        //Nova variável "cep" somente com dígitos.
        let cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP.
            let validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#address").val("carregando...");
                $("#district").val("carregando...");
                $("#city").val("carregando...");
                // $("#state").val("carregando...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#address").val(dados.logradouro);
                        $("#district").val(dados.bairro);
                        $("#city").val(dados.localidade);console.log(dados)
                        // $("#state").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    //Quando o campo cep perde o foco.
    $("#contabilidade_cep").blur(function() {

    //Nova variável "cep" somente com dígitos.
    let cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep !== "") {

    //Expressão regular para validar o CEP.
    let validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        $("#contabilidade_rua").val("carregando...");
        $("#contabilidade_bairro").val("carregando...");
        $("#contabilidade_cidade").val("carregando...");
        $("#contabilidade_uf").val("carregando...");

        //Consulta o webservice viacep.com.br/
        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $("#contabilidade_rua").val(dados.logradouro);
                $("#contabilidade_bairro").val(dados.bairro);
                $("#contabilidade_cidade").val(dados.localidade);
                $("#contabilidade_uf").val(dados.uf);

            } //end if.
            else {
                //CEP pesquisado não foi encontrado.
                limpa_formulário_cep_contabilidade();
                alert("CEP não encontrado.");
            }
        });
    } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep_contabilidade();
        alert("Formato de CEP inválido.");
      }
    } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep_contabilidade();
        }
    });
  });
