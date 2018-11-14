<?php
require '../../CONT/connection.php';
require '../../CONT/database.php';
@$info = DBRead("consumidores", "where cpconsumidor = '$_COOKIE[codConsu]'");
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
        .mensagens{
            background-color: brown;
            border-color: black;
            position: absolute;
            margin-top: -65px;
            margin-left: 10px;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
        .x500{
            width: 500px;
        }
        .btnn{
            background-color: #ff992f;
            color: white;
            border-color: #ff992f;
            float: right;
        }
    </style>
    <!-- -->
</head>
<body>
<?php if(isset($_SESSION['msg'])){ echo "<div class='mensagens'>".@$_SESSION['msg']."</div>";}?>
<div style="width: 1100px">
    <form class="form-horizontal" action="../../CONT/comerciante.php" method="post" onsubmit="return">
        <input type="hidden" name="rota" value="3">
        <fieldset>
            <!-- Form Name -->
            <legend style="margin: 20px;">Minha Conta<br/></legend>
            <!-- Text Input Nome -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Nome:</label>
                <div class="col-md-4">
                    <input id="textinput" name="nome" type="text" placeholder="Nome Completo" class="form-control input-md x500" <?php if(!is_null($inf['nomeConsu'])){echo "value='$inf[nomeConsu]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Telefone -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Telefone:</label>
                <div class="col-md-4">
                    <input id="textinput" name="telefone" type="text" placeholder="Ex.: DD 9NNNN NNNN" class="form-control input-md x500" <?php if(!is_null($inf['telefoneConsu'])){echo "value='$inf[telefoneConsu]'";}?>>
                    <span class="help-block">Este campo não é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Endereco -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Endereço:</label>
                <div class="col-md-4">
                    <input id="textinput" name="endereco" type="text" placeholder="Ex.: Rua Augusta 446" class="form-control input-md x500" <?php if(!is_null($inf['enderecoConsu'])){echo "value='$inf[enderecoConsu]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input CEP -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">CEP:</label>
                <div class="col-md-4">
                    <input id="textinput" name="cep" type="text" placeholder="CEP" class="form-control input-md x500" <?php if(!is_null($inf['cepConsu'])){echo "value='$inf[cepConsu]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Cidade -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Cidade:</label>
                <div class="col-md-4">
                    <input id="textinput" name="cidade" type="text" placeholder="Ex.: Ourinhos" class="form-control input-md x500" <?php if(!is_null($inf['cidadeConsu'])){echo "value='$inf[cidadeConsu]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Estado -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Estado:</label>
                <div class="col-md-4">
                    <input id="textinput" name="estado" type="text" placeholder="Ex.: SP, RJ" class="form-control input-md x500" <?php if(!is_null($inf['estadoConsu'])){echo "value='$inf[estadoConsu]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Bairro -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Bairro:</label>
                <div class="col-md-4">
                    <input id="textinput" name="estado" type="text" placeholder="Ex.: Bairro Centro" class="form-control input-md x500" <?php if(!is_null($inf['estadoConsu'])){echo "value='$inf[estadoConsu]'";}?> required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"><br/></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary btnn" style="float: left">Confirmar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
    </html><?php }} ?>