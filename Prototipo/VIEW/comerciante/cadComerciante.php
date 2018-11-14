<?php
    session_start();
    require '../../CONT/connection.php';
    require '../../CONT/database.php';
    @$info = DBRead("comerciantes", "where cpcomerciante = '$_COOKIE[codComer]'");
    if(is_array($info)){ foreach ($info as $inf){
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- -->
    <style>
        .x500{
            width: 500px;
        }
        .btnn{
            background-color: #ff992f;
            color: white;
            border-color: #ff992f;
        }
    </style>
    <!-- -->
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" >
        //$('.telefone').mask('(##) #####-##00', {reverse: true});
        //$('.telefoneE').mask('(##) #####-##00', {reverse: true});

        // -- telefone Mask --

        function fMasc(objeto,mascara) {
            obj=objeto
            masc=mascara
            setTimeout("fMascEx()",1)
        }
        function fMascEx() {
            obj.value=masc(obj.value)
        }
        function mTel(tel) {
            tel=tel.replace(/\D/g,"")
            tel=tel.replace(/^(\d)/,"($1")
            tel=tel.replace(/(.{3})(\d)/,"$1) $2")
            if(tel.length == 9) {
                tel=tel.replace(/(.{1})$/,"-$1")
            } else if (tel.length == 10) {
                tel=tel.replace(/(.{2})$/,"-$1")
            } else if (tel.length == 11) {
                tel=tel.replace(/(.{3})$/,"-$1")
            } else if (tel.length == 12) {
                tel=tel.replace(/(.{4})$/,"-$1")
            } else if (tel.length > 12) {
                tel=tel.replace(/(.{4})$/,"-$1")
            }
            return tel;
        }
        function mCEP(cep){
            cep=cep.replace(/\D/g,"")
            cep=cep.replace(/^(\d{5})(\d)/,"$1-$2")
            return cep
        }

        // -- Auto CEP --
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('endereco').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('estado').value=(conteudo.uf);
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
                    document.getElementById('endereco').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('estado').value="...";
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
</head>
<body>
    <div style="width: 1100px">
        <form class="form-horizontal" action="../../CONT/comerciante.php" method="post" onsubmit="return">
            <input type="hidden" name="rota" value="3">
            <fieldset>
                <?php if(isset($_SESSION['msg'])){ ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput"> </label>
                        <div class="col-md-4" style="background-color: green; padding: 10px; border-radius: 5px; color: white; margin-left: 15px; width: 500px">
                            <?php echo @$_SESSION['msg']; session_destroy();?>
                        </div>
                    </div>
                <?php } ?>
                <!-- Form Name -->
                <legend style="margin: 20px;">Minha Conta<br/></legend>
                <!-- Text Input Nome Usuario -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome Usuario:</label>
                    <div class="col-md-4">
                        <input id="nome" name="nome" type="text" placeholder="Nome Completo" class="form-control input-md x500" <?php if(!is_null($inf['nomeComer'])){echo "value='$inf[nomeComer]'";}?> required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input Telefone -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="telefone">Telefone Pessoal:</label>
                    <div class="col-md-4">
                        <input id="telefone" name="telefone" type="text" placeholder="Ex.: DDD NNNNN NNNN" class="form-control input-md x500" <?php if(!is_null($inf['telefoneComer'])){echo "value='$inf[telefoneComer]'";}?> size="15" onkeydown="javascript: fMasc( this, mTel );" maxlength="15">
                        <span class="help-block">Este campo não é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input CPF -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cpf">CPF:</label>
                    <div class="col-md-4">
                        <input id="cpf" name="cpf" type="text" placeholder="Sem Caracteres especiais" class="form-control input-md x500" <?php if(!is_null($inf['cpfComer'])){echo "value='$inf[cpfComer]'";}?> size="14">
                        <span class="help-block">Este campo não é obrigatorio</span>
                    </div>
                </div>
                <legend style="margin: 20px;">Minha Empresa<br/></legend>
                <!-- Text Input Nome Empresa -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nomeE">Nome Empresa:</label>
                    <div class="col-md-4">
                        <input id="nomeE" name="nomeE" type="text" placeholder="Nome Completo da Empresa" class="form-control input-md x500" <?php if(!is_null($inf['nomeEmpComer'])){echo "value='$inf[nomeEmpComer]'";}?> required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input Telefone Empresa-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="telefoneE">Telefone Comercial:</label>
                    <div class="col-md-4">
                        <input id="telefoneE" name="telefoneE" type="text" placeholder="Ex.: DDD NNNNN NNNN" class="form-control input-md x500" <?php if(!is_null($inf['telefoneEmpComer'])){echo "value='$inf[telefoneEmpComer]'";}?> size="15" onkeydown="javascript: fMasc( this, mTel );" maxlength="15">
                        <span class="help-block">Este campo não é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input CEP -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cep">CEP:</label>
                    <div class="col-md-4">
                        <input id="cep" name="cep" type="text" size="10" placeholder="CEP de Sua Empresa" class="form-control input-md x500" <?php if(!is_null($inf['cepComer'])){echo "value='$inf[cepComer]'";}?> onblur="pesquisacep(this.value);" size="9" onkeydown="javascript: fMasc( this, mCEP );" maxlength="9" required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input Endereco -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="endereco">Endereço:</label>
                    <div class="col-md-4">
                        <input id="endereco" name="endereco" type="text" placeholder="Ex.: Rua Augusta 446" class="form-control input-md x500" <?php if(!is_null($inf['enderecoComer'])){echo "value='$inf[enderecoComer]'";}?> required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input bairro -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="bairro">Bairro:</label>
                    <div class="col-md-4">
                        <input id="bairro" name="bairro" type="text" placeholder="Ex.: Centro" class="form-control input-md x500" <?php if(!is_null($inf['bairroComer'])){echo "value='$inf[bairroComer]'";}?> required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input Cidade -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cidade">Cidade:</label>
                    <div class="col-md-4">
                        <input id="cidade" name="cidade" type="text" placeholder="Ex.: Ourinhos" class="form-control input-md x500" <?php if(!is_null($inf['cidadeComer'])){echo "value='$inf[cidadeComer]'";}?> required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input Estado -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="estado">Estado:</label>
                    <div class="col-md-4">
                        <input id="estado" name="estado" type="text" placeholder="Ex.: SP, RJ" size="2" class="form-control input-md x500" <?php if(!is_null($inf['estadoComer'])){echo "value='$inf[estadoComer]'";}?> required>
                        <span class="help-block">Este campo é obrigatorio</span>
                    </div>
                </div>
                <!-- Text Input Complemento -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="complemento">Complemento:</label>
                    <div class="col-md-4">
                        <input id="complemento" name="complemento" type="text" placeholder="Ex.: Frente a, Ao lado de" class="form-control input-md x500" <?php if(!is_null($inf['complementoComer'])){echo "value='$inf[complementoComer]'";}?>>
                        <span class="help-block">Este campo não é obrigatorio</span>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"><br/></label>
                    <div class="col-md-4">
                        <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary btnn" style="float: left">Confirmar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html><?php }} ?>