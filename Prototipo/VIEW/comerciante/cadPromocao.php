<?php
    session_start();
    require '../../CONT/connection.php';
    require '../../CONT/database.php';
    $info = DBRead("produtos","where cecomerciante = '$_COOKIE[codComer]'");
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
        .x140{
            width: 140px;
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
    <form class="form-horizontal" action="../../CONT/promocao.php" method="post" onsubmit="return">
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
            <legend style="margin: 20px;">Codastrar Promoção</legend>
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Produto:</label>
                <div class="col-md-4">
                    <div class="x500">
                        <select id="selectbasic" name="cpproduto" class="form-control" required>
                            <?php if(is_array($info)){ foreach ($info as $reg){?>
                                <option value="<?php echo $reg['cpproduto'];?>"><?php echo $reg['nomeProdu'] . ' - ' . $reg['descricaoProdu']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Text Input Desconto -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="desconto">Desconto:</label>
                <div class="col-md-4">
                    <input id="desconto" name="desconto" type="text" placeholder="Ex.: 70%" class="form-control input-md x500" required>
                    <span class="help-block">Este campo é obrigatorio</span>
                </div>
            </div>
            <!-- Data Input Final -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="data">Termino da Promoção:</label>
                <div class="col-md-4">
                    <input id="data" name="data" type="date" placeholder="Ex.: 50.00" class="form-control input-md x140" required>
                    <span class="help-block">Este campo é obrigatorio</span>
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