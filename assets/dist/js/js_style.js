$(document).ready(function(){
    // MÁSCARA
    $("#cpf").mask("000.000.000-00")
	$("#cnpj").mask("00.000.000/0000-00")
    $("#telefone").mask("(00) 0000-0000")
    $("#telefone1").mask("(00) 0000-0000")
    $("#telefone2").mask("(00) 0000-0000")
    $("#telefone3").mask("(00) 0000-0000")
    $("#cep").mask("00.000-000")
    $('#valor').mask('000.000.000.000.000,00', {reverse: true})
    
    $("#rg").mask("999.999.999-W", {
        translation: {
            'W': {
                pattern: /[X0-9]/
            }
        },
        reverse: true
    })
    $("#fone").mask("(00) 0000-00009")
    $("#celular1").mask("(00) 0000-00009")
    $("#celular2").mask("(00) 0000-00009")
    $("#celular3").mask("(00) 0000-00009")
			
    $("#fone").blur(function(event){
        if ($(this).val().length == 15){
            $("#fone").mask("(00) 00000-0009")
        }else{
            $("#fone").mask("(00) 0000-00009")
        }
    })
    $("#celular1").blur(function(event){
        if ($(this).val().length == 15){
            $("#celular1").mask("(00) 00000-0009")
        }else{
            $("#celular1").mask("(00) 0000-00009")
        }
    })
    $("#celular2").blur(function(event){
        if ($(this).val().length == 15){
            $("#celular2").mask("(00) 00000-0009")
        }else{
            $("#celular2").mask("(00) 0000-00009")
        }
    })
    $("#celular3").blur(function(event){
        if ($(this).val().length == 15){
            $("#celular3").mask("(00) 00000-0009")
        }else{
            $("#celular3").mask("(00) 0000-00009")
        }
    })


// BUSCA CEP CORREIOS
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
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

    //DATATABLES
    $('#myDataTable').DataTable( {
        "language": {
            "sEmptyTable":   "Não foi encontrado nenhum registo",
            "sLoadingRecords": "Carregando...",
            "sProcessing":   "Processando...",
            "sLengthMenu":   "Mostrar _MENU_ registros",
            "sZeroRecords":  "Não foram encontrados resultados",
            "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
            "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
            "sInfoPostFix":  "",
            "sSearch":       "Procurar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Seguinte",
                "sLast":     "Último"
            },
            "oAria": {
                "sSortAscending":  ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    } );
   
});
