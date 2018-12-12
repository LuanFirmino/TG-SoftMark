<?php
require '../../CONT/connection.php';
require '../../CONT/database.php';
$info = DBRead('produtos, comerciantes',
    "where produtos.cecomerciante = comerciantes.cpcomerciante and
                           cpproduto = $_POST[cpproduto]");
$info5 = DBRead('promocoes', "where promocoes.ceproduto = $_POST[cpproduto]");
/*$info = DBRead("promocoes", "where ceproduto = '$_POST[cpproduto]'");*/
if(is_array($info)){
    foreach ($info as $inf){
        if(is_array($info5)){
            foreach ($info5 as $inf5){
                $preçoProduto = floatval(str_replace("," , "." , str_replace("." , "" , $inf['precoProdu'])));
                $desconto = $preçoProduto - ($preçoProduto * ($inf5['descontoPromo']/100));
            }
        }?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Document</title>
            <!-- Estilo Bootstrap -->
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <style>
                /*
                Estilo Bootstrap Fonte:
                Alterado por: Luan Firmino */
                .btnn{
                    width: 100%;
                }
                /**/
                /*****************globals*************/
                body {
                    font-family: 'open sans';
                    overflow-x: hidden; }

                img {
                    max-width: 100%; }

                .preview {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column; }
                @media screen and (max-width: 996px) {
                    .preview {
                        margin-bottom: 20px; } }

                .preview-pic {
                    -webkit-box-flex: 1;
                    -webkit-flex-grow: 1;
                    -ms-flex-positive: 1;
                    flex-grow: 1; }

                .preview-thumbnail.nav-tabs {
                    border: none;
                    margin-top: 15px; }
                .preview-thumbnail.nav-tabs li {
                    width: 18%;
                    margin-right: 2.5%; }
                .preview-thumbnail.nav-tabs li img {
                    max-width: 100%;
                    display: block; }
                .preview-thumbnail.nav-tabs li a {
                    padding: 0;
                    margin: 0; }
                .preview-thumbnail.nav-tabs li:last-of-type {
                    margin-right: 0; }

                .tab-content {
                    overflow: hidden; }
                .tab-content img {
                    width: 100%;
                    -webkit-animation-name: opacity;
                    animation-name: opacity;
                    -webkit-animation-duration: .3s;
                    animation-duration: .3s; }

                .card {
                    margin-top: 50px;
                    background: #eee;
                    padding: 3em;
                    line-height: 1.5em; }

                @media screen and (min-width: 997px) {
                    .wrapper {
                        display: -webkit-box;
                        display: -webkit-flex;
                        display: -ms-flexbox;
                        display: flex; } }

                .details {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                    flex-direction: column; }

                .colors {
                    -webkit-box-flex: 1;
                    -webkit-flex-grow: 1;
                    -ms-flex-positive: 1;
                    flex-grow: 1; }

                .product-title, .price, .sizes, .colors {
                    text-transform: UPPERCASE;
                    font-weight: bold; }

                .checked, .price span {
                    color: #ff9f1a; }

                .product-title, .rating, .product-description, .price, .vote, .sizes {
                    margin-bottom: 15px; }

                .product-title {
                    margin-top: 0; }

                .size {
                    margin-right: 10px; }
                .size:first-of-type {
                    margin-left: 40px; }

                .color {
                    display: inline-block;
                    vertical-align: middle;
                    margin-right: 10px;
                    height: 2em;
                    width: 2em;
                    border-radius: 2px; }
                .color:first-of-type {
                    margin-left: 20px; }

                .add-to-cart, .like {
                    background: #ff9f1a;
                    padding: 1.2em 1.5em;
                    border: none;
                    text-transform: UPPERCASE;
                    font-weight: bold;
                    color: #fff;
                    -webkit-transition: background .3s ease;
                    transition: background .3s ease; }
                .add-to-cart:hover, .like:hover {
                    background: #b36800;
                    color: #fff; }

                .not-available {
                    text-align: center;
                    line-height: 2em; }
                .not-available:before {
                    font-family: fontawesome;
                    content: "\f00d";
                    color: #fff; }

                .orange {
                    background: #ff9f1a; }

                .green {
                    background: #85ad00; }

                .blue {
                    background: #0076ad; }

                .tooltip-inner {
                    padding: 1.3em; }

                @-webkit-keyframes opacity {
                    0% {
                        opacity: 0;
                        -webkit-transform: scale(3);
                        transform: scale(3); }
                    100% {
                        opacity: 1;
                        -webkit-transform: scale(1);
                        transform: scale(1); } }

                @keyframes opacity {
                    0% {
                        opacity: 0;
                        -webkit-transform: scale(3);
                        transform: scale(3); }
                    100% {
                        opacity: 1;
                        -webkit-transform: scale(1);
                        transform: scale(1); } }
                /*# sourceMappingURL=style.css.map */
            </style>
            <!-- Estilo Bootstrap -->
            <!-- Google Maps -->
            <script type="text/javascript" src=https://maps.googleapis.com/maps/api/js?key=AIzaSyAqWlqXT44tXf65hp7VK7flrnRXaTtsB2E&callback=initMap></script>
            <script type="text/javascript" src="jquery.min.js"></script>
            <script src="http://code.jquery.com/jquery-1.5.js"></script>
            <style type="text/css">
                #map_content {
                    width: 100%;
                    height: 100%;
                }
                #content {
                    width: 100%;
                    height: 300px;
                }
                #map_content{
                    text-align: center;
                }
                .btnn{
                    background-color: #ff992f;
                    color: white;
                    border-color: #ff992f;
                }
            </style>
            <?php
            //Geocode: https://developer.here.com/signup/geocoding?cid=Geocoding-Google-MM-T4-Dev-Brand-E&utm_source=Google&utm_medium=ppc&utm_campaign=Dev_PaidSearch_DevPortal_AlwaysOn
            $geo = array();
            $cep = str_replace("-", "+-+", $inf['cepComer']);
            $endereco = "$inf[enderecoComer] - $inf[bairroComer], $inf[cidadeComer] - $inf[estadoComer], $cep";
            $enderecoN = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $endereco));
            $addres = str_replace(" ", "+", $enderecoN);
            $address = utf8_encode($addres);
            //$geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key=AIzaSyBwTnJAp-YLRazsMSdNu5DZ1RRBPDJSYJk');
            $app_id = 'mjE0oL5hM4jgM1DCJAgt';
            $app_code = 'TPJXy2my47PzzQV4EPqf6w';
            $geocode = file_get_contents('https://geocoder.cit.api.here.com/6.2/geocode.json?searchtext='.$address.'&app_id='.$app_id.'&app_code='.$app_code.'&gen=8');
            $output = json_decode($geocode, false);
            $geo['lati'] = $output->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
            $geo['long'] = $output->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;
            $geo['loca'] = $output->Response->View[0]->Result[0]->Location->Address->Label;
            ?>
            <!-- Google Maps -->
        </head>
        <body onload="initialize()">
        <div class="container">
            <div class="card" style="margin-top: 0px">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="<?php if(isset($inf['imgProdu'])){ echo "../../IMG/$inf[imgProdu]"; } else { echo "../../IMG/índice.png"; } ?>"/></div>
                            </div>
                            <div class="preview-pic tab-content" style="margin-top: 10px">
                                <div class="tab-pane active" id="pic-1"><div id="content"><div id="map_content"></div></div></div>
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo $inf['nomeProdu']; ?></h3>
                            <p class="product-description"><?php echo $inf['descricaoProdu']; ?></p>
                            <?php if(is_array($info5)){ ?>
                                <h4 class="price">Valor do Produto: <span><?php echo "R$".$desconto; ?></span></h4>
                            <?php } else {?>
                                <h4 class="price">Valor do Produto: <span><?php echo "R$".$inf['precoProdu']; ?></span></h4>
                            <?php }?>
                            <div class="action">
                                <a href="listaProdutos.php"><button class="add-to-cart btn btn-default btnn" type="button" style="float: right;">Voltar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Google Maps -->
        <script type="text/javascript">
            var map;
            var directionsService = new google.maps.DirectionsService();
            var info = new google.maps.InfoWindow({maxWidth: 240});

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng('<?php echo "$geo[lati]"; ?>', '<?php echo "$geo[long]"; ?>')
            });
            function initialize() {
                var options = {
                    zoom: 15,
                    center: marker.position,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map($('#map_content')[0], options);
                marker.setMap(map);
                google.maps.event.addListener(marker, 'click', function() {
                    info.setContent("<?php echo "$inf[nomeEmpComer]<br/>$geo[loca]<br/>$inf[complementoComer]<br/>$inf[telefoneEmpComer]" ; ?>");
                    info.open(map, marker);
                });
            }
            $(document).ready(function() {
                $('#form_route').submit(function() {
                    info.close();
                    marker.setMap(null);
                    var directionsDisplay = new google.maps.DirectionsRenderer();
                    var request = {
                        origin: $("#route_from").val(),
                        destination: marker.position,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    };
                    directionsService.route(request, function(response, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(response);
                            directionsDisplay.setMap(map);
                        }
                    });
                    return false;
                });
            });
        </script>
        <!-- Google Maps -->
        </body>
        </html>
<?php }} ?>