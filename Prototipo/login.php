<?php
    session_start();
    if(isset($_COOKIE['codComer']) and isset($_COOKIE['codComer'])){
    if(@$_COOKIE['codComer']){
        header("Location: ./VIEW/comerciante/homeComerciante.php");
    } else if(@$_COOKIE['codConsu']) {
        header("Location: ./VIEW/consumidor/homeConsumidor.php");
    } else {
        session_destroy();
    }}
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
      <div class="container" style="margin-top: 5%;">
          <div class="row">
              <div class="col-sm-4"></div>
              <div class="col-md-4" style="background-color: #606060; border-radius: 8px;">
    <!-- Titulo da Pagina -->
                  <h1 class="tab-pane fade in active" style="color: #fff; text-align: center; text-decoration: none;">Sua Conta:</h1><br/>
                  <div class="col-sm-12">
                      <ul class="nav nav-pills" >
                          <li class="" style="width:50%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#home">Comerciante</a></li>
                          <li class="" style="width:48%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#menu1">Consumidor</a></li>
                      </ul><br/>
                      <div class="tab-content">
    <!-- ponto de referencia LogComerciante -->
                          <div id="home"    class="tab-pane fade in active">
                              <form action="./CONT/comerciante.php" method="post" onsubmit="return">
                                  <div class="form-group">
                                      <label for="login" style="color: #fff;">Login:</label>
                                      <input id="login" type="email" name="login" placeholder="Email" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="senha" style="color: #fff;">Password:</label>
                                      <input id="senha" type="password" name="senha" placeholder="Senha" class="form-control" required>
                                  </div>
                                  <input type="hidden" name="rota" value="2">
                                  <button type="submit" class="btn btn-default btn-lg">Entrar</button>
                                  <a style="float: right" href="altSenhaComer.php">Esqueci minha senha</a><br/><br/>
                              </form>
                              <a class="pull-right btn btn-block btn-success btnn" data-toggle="tab" href="#cadCom">Cadastrar-se</a><br/>.
                          </div>
    <!-- Ponto de Referencia LogConsumidor -->
                          <div id="menu1"   class="tab-pane fade">
                              <form action="./CONT/consumidor.php" method="post" onsubmit="return">
                                  <div class="form-group">
                                      <label for="email" style="color: #fff;">Login:</label>
                                      <input id="email" type="email" name="login" placeholder="Email" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="pwd" style="color: #fff;">Password:</label>
                                      <input id="pwd" type="password" name="senha" placeholder="Senha" class="form-control" required>
                                  </div>
                                  <input type="hidden" name="rota" value="2">
                                  <button type="submit" class="btn btn-default btn-lg">Entrar</button>
                                  <a style="float: right" href="altSenhaConsu.php">Esqueci minha senha</a><br/><br/>
                              </form>
                              <a class="pull-right btn btn-block btn-success btnn" data-toggle="tab" href="#cadCon">Cadastrar-se</a><br/>.
                          </div>
    <!-- Ponto de Referencia CadComerciante -->
                          <div id="cadCom"  class="tab-pane fade">
    <!-- Ponto de Referencia FORM-->
                              <form action="CONT/comerciante.php" method="post" onsubmit="return">
                                  <div class="form-group">
                                      <h3 class="tab-pane fade in active" style="color: #fff; text-align: left; margin: -5px">Cadastro Comerciante:</h3>
                                  </div>
                                  <div class="form-group">
                                      <label for="email" style="color: #fff;">Login:</label>
                                      <input id="email" type="email" name="login" placeholder="Email" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="pwd" style="color: #fff;">Password:</label>
                                      <input id="pwd" type="password" name="senha" placeholder="Senha" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <input class="check" type="checkbox" name="termos" required>
                                      <label style="color: #fff;"><a class="check" href="VIEW/USET/term.php" target="_blank"> Termos e Condições</a></label><br/>
                                      <input class="check" type="checkbox" name="termos" required>
                                      <label style="color: #fff;"><a class="check" href="VIEW/USET/priv.php" target="_blank"> Política de Privacidade</a></label>
                                  </div>
                                  <input type="hidden" name="rota" value="1">
                                  <button type="submit" class="pull-right btn btn-block btn-success btnn" style="width: 100%">Criar Conta</button><br/>.
                              </form>
                          </div>
    <!-- Ponto de Referencia CadConsumidor -->
                          <div id="cadCon"  class="tab-pane fade">
    <!-- Ponto de Referencia FORM-->
                              <form action="CONT/consumidor.php" method="post" onsubmit="return">
                                  <div class="form-group">
                                      <h3 class="tab-pane fade in active" style="color: #fff; text-align: left; margin: -5px">Cadastro Consumidor:</h3>
                                  </div>
                                  <div class="form-group">
                                      <label for="email" style="color: #fff;">Login:</label>
                                      <input id="email" type="email" name="login" placeholder="Email" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="pwd" style="color: #fff;">Password:</label>
                                      <input id="pwd" type="password" name="senha" placeholder="Senha" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                      <input type="checkbox" name="termos" required>
                                      <label style="color: #fff;"><a class="check" href="VIEW/USET/term.php" target="_blank"> Termos e Condições</a></label><br/>
                                      <input type="checkbox" name="termos" required>
                                      <label style="color: #fff;"><a class="check" href="VIEW/USET/priv.php" target="_blank"> Política de Privacidade</a></label>
                                  </div>
                                  <input type="hidden" name="rota" value="1">
                                  <button type="submit" class="pull-right btn btn-block btn-success btnn">Criar Conta</button><br/>.
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </body>
</html>