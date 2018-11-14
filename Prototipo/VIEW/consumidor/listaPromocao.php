<?php
    session_start();
    /*Select * from (select cpproduto from produtos) as A where A.cpproduto Not in (select ceproduto from promocoes)*/
    require '../../CONT/connection.php';
    require '../../CONT/database.php';
    $veri  = true;
    if(!isset($_POST['rota'])){
        $info1 = DBRead('promocoes, produtos', "where promocoes.ceproduto = produtos.cpproduto");
    } else {
        $info1 = DBRead('promocoes, produtos',
                        "where (promocoes.ceproduto = produtos.cpproduto) and 
                        ((UPPER(produtos.nomeProdu) LIKE UPPER('%$_POST[pesquisa]%')) or (UPPER(produtos.descricaoProdu) LIKE UPPER('%$_POST[pesquisa]%')))");
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Bloco de Barra de Pesquisa -->
    <!-- // -->
    <!-- Blocos do Produto -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- -->
    <style>
        /* -- */
        body{
            font-family: 'PT Sans', sans-serif;
            font-weight: 400;
            border-top:0;
            background-color: #f2ecef;
        }
        .barraPesquisa{
            background-color: #ff9f16;
            border-bottom-color: black;
            width: 100%;
            float: right;
        }
        .barraPesquisa2{
            float: right;
        }
        .barraPesquisa2 label{
            padding: 10px;
            font-size: 18px;
        }
        .barraPesquisa2 input{
            margin: 10px;
        }
        /* -- */
        button.botao{float: left; padding: 3px; margin: 5px; border-radius: 5px;}
        button.botaoConsu{float: right; padding: 3px; margin-top: 45px;: 120px, 0px, 0px; border-radius: 5px;}
        div.falta{
            width: 600px;
            height: 400px;
            margin: auto;
            text-align: center;
            color: white;
            border-radius: 7px;
            background-color: brown;
        }
        div.falta h3{
            padding: 60px;
        }
        /* Global */
        img { max-width:100%; }
        a {-webkit-transition: all 150ms ease;-moz-transition: all 150ms ease;-ms-transition: all 150ms ease;-o-transition: all 150ms ease; transition: all 150ms ease;}
        a:hover {-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)"; /* IE 8 */filter: alpha(opacity=50); /* IE7 */opacity: 0.6;text-decoration: none;}
        .thumbnails li> .fff .caption { background:#fff !important;padding:10px;}
        /* Page Header */
        .page-header {background: #f9f9f9;margin: -30px -40px 40px;padding: 20px 40px;border-top: 4px solid #ccc;color: #999;text-transform: uppercase;}
        .page-header h3 {line-height: 0.88rem;color: #000;}
        ul.thumbnails {margin-bottom: 0px;}
        /* Thumbnail Box */
        .caption h4 {color: #444;}
        .caption p {color: #999;}
        /* Carousel Control */
        .control-box {text-align: right;width: 100%;}
        .carousel-control{ background: #666; border: 0px; border-radius: 0px; display: inline-block; font-size: 34px; font-weight: 200; line-height: 18px; opacity: 0.5; padding: 4px 10px 0px; position: static; height: 30px; width: 15px;}
        /* Mobile Only */
        @media (max-width: 767px) { .page-header, .control-box { text-align: center; }}
        @media (max-width: 479px) { .caption { word-break: break-all;}}
        li { list-style-type:none;}
        ::selection { background: #4f5d6e; color: #FFFFFF; }
        ::-moz-selection { background: #4f5d6e; color: #FFFFFF; }
    </style>
</head>
<body>
<form action="./listaPromocao.php" method="post" class="form-register" onsubmit="return">
    <input type="hidden" name="rota" value="1">
    <div class="barraPesquisa"><div class="barraPesquisa2"><input type="text" name="pesquisa"><input type="submit" value="Pesquisar"></div></div>
</form>
<div class="container" style=" float: left; width: 100%;">
    <div class="col-xs-12" style="padding: 30px;width: 100%;">
        <div class="carousel slide" id="myCarousel" style="width: 100%;">
            <div class="carousel-inner" style="margin-left: -35px; margin-top: -15px; width: 1110px;">
                <div class="item active" style="width: 1125px;margin-left: -40px;">
                    <ul class="thumbnails" style="width: 100%;">
                        <?php if(is_array($info1)){ $veri=false; foreach ($info1 as $inf1){?>
                        <li class="col-sm-3" style="padding-top: 15px;">
                            <div class="fff">
                                <div class="thumbnail" style="max-height: 240px; height: 240px; display:inline-block;">
                                    <a type="submit"><img src="<?php if(isset($inf1['imgProdu'])){ echo "../../IMG/$inf1[imgProdu]"; } else { echo "../../IMG/índice.png"; } ?>" align="center" style="width: 260px; height: 230px; object-fit: cover; object-position: center;"></a>
                                </div>
                                <div class="caption" style=" height: 170px;">
                                    <h4><?php echo $inf1['nomeProdu'];?></h4>
                                    <?php $desconto = $inf1['precoProdu'] - ($inf1['precoProdu'] * ($inf1['descontoPromo']/100));?>
                                    <p><?php echo "Por: R$ <strike>".$inf1['precoProdu']."</strike> ".$desconto." com ".$inf1['descontoPromo']."% de desconto!";?></p>
                                    <div style="float: bottom; background-color: black; text-align: center">
                                        <form action="./exibProduto.php" method="post" class="form-register" onsubmit="return">
                                            <input type="hidden" name="cpproduto" value="<?php echo $inf1['cpproduto'];?>">
                                            <button type="submit" class="botao">Mais Informações</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php }}
                        if(isset($_POST['rota'])){if($veri){ ?>
                            <div class="faltaPesquisa">
                                <h3>Produto: "<?php echo $_POST['pesquisa']; ?>" não encontrado!</h3>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>