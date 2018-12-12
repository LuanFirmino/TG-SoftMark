<?php
session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <title>Pagina de Login</title>
    <link rel="stylesheet" href="./MODE/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-image: url(IMG/shopping-cart-3679743_1920.jpg);
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
        }
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
        .check{
            color: #ffa75a;
        }
        .btnn{
            width: 100%;
            background-color: #ff992f;
            color: white;
            border-color: #ff992f;
        }
    </style>
</head>
<body>
<?php if(isset($_SESSION['msg'])){ echo "<div class='mensagens'>".@$_SESSION[msg]."</div>"; session_destroy();}?>
<div class="container" style="margin-top: 15%;">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-md-4" style="background-color: #606060; border-radius: 8px;">
            <!-- Titulo da Pagina -->
            <h1 class="tab-pane fade in active" style="color: #fff; text-align: center; text-decoration: none;">Digite seu Email:</h1>
            <div class="col-sm-12">
                <div class="tab-content">
                    <!-- ponto de referencia LogComerciante -->
                    <div id="home"    class="tab-pane fade in active">
                        <form action="./CONT/comerciante.php" method="post" onsubmit="return">
                            <div class="form-group">
                                <label for="login" style="color: #fff;">Login:</label>
                                <input id="login" type="email" name="login" placeholder="Email" class="form-control" required>
                            </div>
                            <input type="hidden" name="rota" value="4">
                            <button type="submit" class="btn btn-default btn-lg btnn">Enviar</button><br/>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>