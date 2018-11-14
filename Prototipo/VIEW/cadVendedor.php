<?php
    session_start(); //inicia a sessão
    require '../CONT/connection.php';
    require '../CONT/database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SIGMA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                margin: 0%; /*espaço entre blocos e parede do site*/
                padding: 0                 font-family: sans-serif;
                text-align: center;
                background-color: #fff;
            }
            div#menu{
                width: auto;
                height: auto;
                text-align: center;
                background-color: deepskyblue;
            }
            ul{
                list-style: none; /*Remove simbolos da lista*/
                text-transform: uppercase;
                margin-top: 0px;
                
            }
            li{
                margin: 10px;
                text-align: left;
                display: inline-block;
            }
            li a{
                color: #ffffff;
                text-decoration: none;
                font-family: sans-serif;
                text-align: center;
                font-size: 20px;
            }
            div#corpo{
                margin-top: 10px;
                margin: auto;
                border: #006666 3px;
            }
            h1{
                color: #033336;
                text-align: center;
                font-size: 30px;
            }
            *{
                box-sizing: border-box;
            }
            .form-register{
                width: 95%;
                max-width: 1000px;
                margin: auto;
                border-radius: 5px;
            }
            .contenedor-inputs{
                padding: 5px 20px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                
            }
            .input-30{
                width: 30%;
            }
            .input-50{
                width: 49.8%;
            }
            .input-68{
                width: 68%;
            }
            .input-85{
                width: 85%;
            }
            .input-90{
                width: 90%;
            }
            .input-100{
                width: 100%;
            }
            .input-nota-100{
                width: 100%;
                height: 200px;
            }
           input{
                margin-bottom: 11px;
                padding: 12px;
                border-radius: 5px;
                border: 1px solid grey;
            }
            #direita{
                text-align: left;
            }
            #esquerda{
                text-align: right;
            }
            #test{
                margin-bottom: 11px;
                padding: 12px;
                border-radius: 5px;
                border: 1px solid grey;
            }
            textarea{
                margin-bottom: 11px;
                padding: 12px;
                border-radius: 5px;
                border: 1px solid grey;
            }
        </style>
    </head>
    <body>
        <div id="corpo">
            <h1>Cadastrar-se</h1>
            <form action="../CONT/comerciante.php" method="post" class="form-register" onsubmit="return">
                <div class="allInputs">
                    <input type="text" id="nome" name="nome" placeholder="Nome Completo" class="input-100" required>
                    <input type="email" id="email" name="email" placeholder="E-Mail" class="input-100" required>
                    <input type="text" id="estado" name="estado" placeholder="Estado" class="input-100" required>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade" class="input-50" required>
                    <input type="text" id="endereco" name="endereco" placeholder="Endereço" class="input-50" required>
                    <input type="text" id="complemento" name="complemento" placeholder="Complemento" class="input-100" required>
                    <input type="text" id="telefone" name="telefone" placeholder="Telefone Celular" class="input-100" required>
                    <input type="text" id="cep" name="cep" placeholder="CEP" class="input-50" required>
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" class="input-50" required>
                    <input type="password" id="senha" name="senha" placeholder="Senha" class="input-50" required>
                    <input type="password" id="senha1" name="senha1" placeholder="Confirmar Senha" class="input-50" required>
                    <input type="hidden" name="rota" value="1">
                    <div id="esquerda">
                        <input type="submit" value="Registrar"/>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
