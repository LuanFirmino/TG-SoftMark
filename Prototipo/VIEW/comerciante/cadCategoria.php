<?php
session_start();
require '../../CONT/connection.php';
require '../../CONT/database.php';
?>
<!DOCTYPE html>
<html>
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
</head>
<body>
<div style="width: 1100px;">
    <form class="form-horizontal" action="../../CONT/categoria.php" method="post" onsubmit="return">
        <input type="hidden" name="rota" value="1">
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
            <legend style="margin: 20px;">Codastrar Categoria</legend>
            <!-- Text Input Nome -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nomeCateg">Nome categoria:</label>
                <div class="col-md-4">
                    <input id="nomeCateg" name="categoria" type="text" placeholder="Digite a categoria" class="form-control input-md x500" required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Text Input Nome -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricaoCateg">Descrição:</label>
                <div class="col-md-4">
                    <input id="descricaoCateg" name="descricao" type="text" placeholder="Descrição comum da Categoria" class="form-control input-md x500">
                    <span class="help-block">Este campo não é obrigatorio</span>
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"><br/></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary btnn">Confirmar</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>