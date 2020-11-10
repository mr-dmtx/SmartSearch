<div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>CNPJ:</label>
    <input type="text" class="form-control" name="cnpj" value="<?=$dados[0]['cd_cnpj']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>CEP:</label>
    <input type="text" onblur="pesquisacep(this.value)" class="form-control" name="cep" value="<?=$dados[0]['cd_cep']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Endereço:</label>
    <input type="text" class="form-control" name="rua" id="rua" value="<?=$dados[0]['nm_endereco']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Nº:</label>
    <input type="text" class="form-control" name="numero" value="<?=$dados[0]['cd_numero_endereco']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Cidade:</label>
    <input type="text" class="form-control" name="cidade" id="cidade" value="<?=$dados[0]['nm_cidade']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Bairro:</label>
    <input type="text" class="form-control" name="bairro" id="bairro" value="<?=$dados[0]['nm_bairro']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Complemento:</label>
    <input type="text" class="form-control" name="complemento" value="<?=$dados[0]['cd_complemento']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>UF:</label>
    <input type="text" class="form-control" name="uf" id="uf" value="<?=$dados[0]['sg_uf']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Telefone:</label>
    <input type="text" class="form-control" name="telefone" value="<?=$dados[0]['cd_telefone']?>">
  </div>
  <script>
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            //document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementsByName('rua').value="...";
                document.getElementsByName('bairro').value="...";
                document.getElementsByName('cidade').value="...";
                document.getElementsByName('uf').value="...";
                //document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

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
    };
  </script>