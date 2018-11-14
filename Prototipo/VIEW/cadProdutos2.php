<?php
    session_start();
    require '../CONT/connection.php';
    require '../CONT/database.php';
    @$info = DBRead("produtos", "where cecomerciante = '$_COOKIE[codComer]' and cpproduto = '$_GET[cpproduto]'");
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
    </style>
    <!-- -->
</head>
<body>
<div style="width: 1100px">
    <form class="form-horizontal" action="../CONT/comerciante.php" method="post" onsubmit="return">
        <input type="hidden" name="rota" value="3">
        <fieldset>
            <?php if(isset($_SESSION['msg'])){ ?>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput"> </label>
                    <div class="col-md-4" style="background-color: brown; padding: 10px; border-radius: 5px; color: white; margin-left: 15px; width: 500px">
                        <?php echo @$_SESSION['msg'];?>
                    </div>
                </div>
            <?php } ?>
            <!-- Form Name -->
            <legend style="margin: 20px;">Minha Conta<br/></legend>
            <!-- Text Input Nome -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome do Produto:</label>
                <div class="col-md-4">
                    <input id="nome" name="nome" type="text" placeholder="Digite o nome de seu produto" class="form-control input-md x500" <?php if(!is_null($inf['nomeComer'])){echo "value='$inf[nomeComer]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input CEP -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição:</label>
                <div class="col-md-4">
                    <input id="descricao" name="descricao" type="text" placeholder="Descrição do Produto" class="form-control input-md x500" <?php if(!is_null($inf['cepComer'])){echo "value='$inf[cepComer]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Endereco -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Endereço:</label>
                <div class="col-md-4">
                    <input id="textinput" name="endereco" type="text" placeholder="Ex.: Rua Augusta 446" class="form-control input-md x500" <?php if(!is_null($inf['enderecoComer'])){echo "value='$inf[enderecoComer]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Cidade -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Cidade:</label>
                <div class="col-md-4">
                    <input id="textinput" name="cidade" type="text" placeholder="Ex.: Ourinhos" class="form-control input-md x500" <?php if(!is_null($inf['cidadeComer'])){echo "value='$inf[cidadeComer]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Estado -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Estado:</label>
                <div class="col-md-4">
                    <input id="textinput" name="estado" type="text" placeholder="Ex.: SP, RJ" class="form-control input-md x500" <?php if(!is_null($inf['estadoComer'])){echo "value='$inf[estadoComer]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Telefone -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Telefone:</label>
                <div class="col-md-4">
                    <input id="textinput" name="telefone" type="text" placeholder="Ex.: DD 9NNNN NNNN" class="form-control input-md x500" <?php if(!is_null($inf['telefoneComer'])){echo "value='$inf[telefoneComer]'";}?>>
                    <span class="help-block">Este campo não é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input CPF -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">CPF:</label>
                <div class="col-md-4">
                    <input id="textinput" name="cpf" type="text" placeholder="Sem Caracteres especiais" class="form-control input-md x500" <?php if(!is_null($inf['cpfComer'])){echo "value='$inf[cpfComer]'";}?>>
                    <span class="help-block">Este campo não é obrigatorio</span>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"><br/></label>
                <div class="col-md-4">
                    <input id="singlebutton" name="singlebutton" class="btn btn-primary">Confirmar</input>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html><?php }} ?>