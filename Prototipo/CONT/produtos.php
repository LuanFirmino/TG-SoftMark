<?php
    session_start();
    /*Chammadas de arquivos*/
    require './connection.php';
    require './database.php';

    if(!isset($_POST['rota'])){
        $_SESSION['msg'] = "Erro - Preencha os campos*";
        header("Location: ../VIEW/comerciante/cadProdutos.php");
    }
    switch($_POST['rota']){
        //Cadastrar Produto
        case 1:
            if(strlen($_POST['img']) > 0){
                $produto = array(
                    'nomeProdu'         =>  @$_POST['nome'],
                    'descricaoProdu'    =>  @$_POST['descricao'],
                    'precoProdu'        =>  @$_POST['preco'],
                    'cecategoria'       =>  @$_POST['categoria'],
                    'cecomerciante'     =>  $_COOKIE['codComer'],
                    'imgProdu'          =>  $_POST['img']
                );
            } else {
                $produto = array(
                    'nomeProdu'         =>  @$_POST['nome'],
                    'descricaoProdu'    =>  @$_POST['descricao'],
                    'precoProdu'        =>  @$_POST['preco'],
                    'cecategoria'       =>  @$_POST['categoria'],
                    'cecomerciante'     =>  $_COOKIE['codComer'],
                );
            }
            $grava = DBCreate('produtos', $produto);
            if($grava){
                $_SESSION['msg'] = "Produto Cadastrado";
                header("Location: ../VIEW/comerciante/cadProdutos.php");
            }else{
                $_SESSION['msg'] = "Erro - Preencha os campos2*";
                echo "Erro - Preencha os campos2";
                header("Location: ../VIEW/comerciante/cadProdutos.php");
            }
        break;
        //Excluir Produto ou Produto e Promoção
        case 2:
            $comp = DBRead("promocoes", "where ceproduto = '$_POST[cpproduto]'");
            if(is_array($comp)){
                $info = DBExcluir("promocoes", "ceproduto = '$_POST[cpproduto]'");
            }
            $info = DBExcluir("produtos", "cpproduto = '$_POST[cpproduto]'");
            if($info){
                header("Location: ../VIEW/comerciante/listaProdutos.php");
            } else {
                header("Location: ../VIEW/comerciante/listaProdutos.php");
            }
        break;
        //Excluir Promoção
        case 3:
        $info = DBExcluir("promocoes", "ceproduto = '$_POST[cpproduto]'");
        if($info){
            header("Location: ../VIEW/comerciante/listaProdutos.php");
        } else {
            header("Location: ../VIEW/comerciante/listaProdutos.php");
        }
        break;
        //Atualizar Produto
        case 4:
            if(strlen($_POST['img']) > 0){
                $produto = array(
                    'nomeProdu'         =>  @$_POST['nome'],
                    'descricaoProdu'    =>  @$_POST['descricao'],
                    'precoProdu'        =>  @$_POST['preco'],
                    'cecategoria'       =>  @$_POST['categoria'],
                    'imgProdu'          =>  $_POST['img']
                );
            } else {
                $produto = array(
                    'nomeProdu'         =>  @$_POST['nome'],
                    'descricaoProdu'    =>  @$_POST['descricao'],
                    'precoProdu'        =>  @$_POST['preco'],
                    'cecategoria'       =>  @$_POST['categoria']
                );
            }
            $info = DBupdate('produtos', $produto, "cpproduto = '$_POST[cpproduto]'");
            if($info){
                header("Location: ../VIEW/comerciante/listaProdutos.php");
            } else {
                header("Location: ../VIEW/comerciante/listaProdutos.php");
            }
        break;
    }
?>
