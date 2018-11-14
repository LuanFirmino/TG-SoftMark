<?php
session_start();
if(@!isset($_COOKIE[codConsu])){
    if(@!isset($_COOKIE[codComer])){
        $_SESSION['msg'] = "Erro - Favor efetue o login novamente!";
        header("Location: ../../login.php");
}} ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        /* bootstrap dropdown hover menu*/
        /*Modificações By: Luan Firmino*/
        body {
            font-family: 'PT Sans', sans-serif;
            font-size: 13px;
            font-weight: 400;
            color: #4f5d6e;
            position: relative;
            background: url("../../IMG/shopping-cart-3679743_1920.jpg");
        }
        .body-wrap { /*corpo menu*/
            min-height: 100px;
        }
        .body-wrap {
            position: relative;
            z-index: 0;
        }
        .body-wrap:before,
        .body-wrap:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
            height: 100px;
        }
        .body-wrap:after {
            top: auto;
            bottom: 0;
        }
        nav {
            margin-top: 30px;
            box-shadow: 5px 4px 5px #000;
        }

        div iframe{
            align-items: center;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 auto;
            width: 75%;
            height: 625px;
            border-color: #202020;
            border-radius: 7px;
        }
        input.pesquisa {
            border-radius: 7px;
        }
        .corBarra{
            background-color: #ff992f;
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>
<!--betulsenger.com @betdream-->
<!--http://getbootstrap.com/components/#navbar-->
<div class="body-wrap">
    <div class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid corBarra">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="homeConsumidor.php" style="color: black;">Pague Pouco</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="listaProdutos.php" target="teste" style="color: black;">Home</a></li>
                        <li><a href="listaPromocao.php" target="teste" style="color: black;">Lista de Promoção</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="" style="color: black;">Minha Conta <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="./cadConsumidor.php" target="teste">Minha Conta</a></li>
                                <li class="divider"></li>
                                <li><a href="../../CONT/exit.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
</div>
<script type="text/javascript">
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<div><iframe src="listaProdutos.php" name="teste"></iframe></div>
</body>
</html>