<?php
    require '../../CONT/connection.php';
    require '../../CONT/database.php';
    $info = DBRead('produtos', "where cpproduto = $_POST[cpproduto]");
    if(is_array($info)){
        foreach ($info as $inf){
            $info2 = DBRead('comerciantes', "where cpcomerciante = $_POST[cpproduto]");

/*$info = DBRead('produtos', "where cpproduto = 4"); if(is_array($info)){ foreach ($info as $inf){*/
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <!--  -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
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
    <!--  -->
    <!-- Google Maps -->
    <script type="text/javascript" src=https://maps.googleapis.com/maps/api/js?key=AIzaSyAqWlqXT44tXf65hp7VK7flrnRXaTtsB2E&callback=initMap></script>
    <script type="text/javascript" src="jquery.min.js"></script>
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
    </style>
    <script type="text/javascript">
        var map;
        var directionsService = new google.maps.DirectionsService();
        var info = new google.maps.InfoWindow({maxWidth: 100});

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng('-22.9782128', '-49.8688477')
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
                info.setContent('Ourinhos, Centro, São Paulo, Brasil');
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
                    destination: $("#route_from2").val(),
                    /*destination: marker.position,*/
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
</head>
<body onload="initialize()">
    <div class="container">
        <div class="card" style="margin-top: 0px">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="<?php echo $inf['imgProdu']; ?>"/></div>
                        </div>
                        <div class="preview-pic tab-content" style="margin-top: 10px">
                            <div class="tab-pane active" id="pic-1"><div id="content"><div id="map_content"></div></div></div>
                        </div>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $inf['nomeProdu']; ?></h3>
                        <p class="product-description"><?php echo $inf['descricaoProdu']; ?></p>
                        <h4 class="price">Valor do Produto: <span><?php echo "R$".$inf['precoProdu']; ?></span></h4>
                        <!--<p class="vote">Promoção de <strong><?php //echo $inf['descricaoProdu']; ?></strong> ate dia <strong><?php //echo $inf['descricaoProdu']; ?></strong></p>-->
                        <div class="action">
                            <a href="listaProdutos.php"><button class="add-to-cart btn btn-default" type="button" style="float: right;">Voltar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>
</body>
</html>