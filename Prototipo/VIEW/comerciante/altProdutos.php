<?php
    session_start();
    require '../../CONT/connection.php';
    require '../../CONT/database.php';
    $info = DBRead("produtos", "where cpproduto = '$_POST[cpproduto]'");
    if(is_array($info)){ foreach ($info as $inf){ ?>
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
    <script>
        $('.dinheiro').mask('#.##0,00', {reverse: true});
    </script>
    <!-- -->
</head>
<body>
<div style="width: 1100px;">
    <form class="form-horizontal" action="../../CONT/produtos.php" method="post" onsubmit="return">
        <input type="hidden" name="rota" value="4">
        <input type="hidden" name="cpproduto" value="<?php echo $_POST['cpproduto']; ?>">
        <fieldset>
            <?php if(isset($_SESSION['msg'])){ ?>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput"> </label>
                    <div class="col-md-4" style="background-color: brown; padding: 10px; border-radius: 5px; color: white; margin-left: 15px; width: 500px">
                        <?php echo @$_SESSION['msg']; session_destroy();?>
                    </div>
                </div>
            <?php } ?>
            <!-- Form Name -->
            <legend style="margin: 20px;">Alterar Produto<br/></legend>
            <!-- Text Input Nome -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome do Produto:</label>
                <div class="col-md-4">
                    <input id="nome" name="nome" type="text" placeholder="Digite o nome de seu produto" class="form-control input-md x500" value="<?php echo $inf['nomeProdu']; ?>" required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Descrição -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição:</label>
                <div class="col-md-4">
                    <input id="descricao" name="descricao" type="text" placeholder="Descrição do Produto" class="form-control input-md x500" value="<?php echo $inf['descricaoProdu']; ?>" required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Preço -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="preco">Preço:</label>
                <div class="col-md-4">
                    <input id="preco" name="preco" type="text" placeholder="Ex.: 50.00" class="dinheiro form-control input-md x500" value="<?php echo $inf['precoProdu']; ?>" required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- IMG -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="img">Imagem:</label>
                <div class="col-md-4">
                    <input id="img" name="img" type="file" class="input-md x500">
                    <span class="help-block">Este campo não é obrigatorio</span>
                </div>
            </div>
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Categoria do Produto:</label>
                <div class="col-md-4">
                    <div class="x500">
                        <select id="selectbasic" name="categoria" class="form-control" style="float: left; width: 371px; margin-right: 4px" required>
                            <?php $info = DBRead("categorias"); foreach ($info as $reg){?>
                            <option value="<?php echo $reg['cpcategoria'];?>"><?php echo $reg['nomeCateg'] . ' - ' . $reg['descricaoCateg']; ?></option>
                            <?php } ?>
                        </select>
                        <a class="btn btn-primary btnn" style="float: left" href="./cadCategoria.php">Cadastrar Novo</a>
                    </div>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"><br/></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary btnn">Confirmar Alteração</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>
<?php }} ?>