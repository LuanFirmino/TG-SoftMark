<?php
//session_start();
/*Chammadas de arquivos*/
require './connection.php';
require './database.php';

if(!isset($_POST['rota'])){
    $_SESSION['msg'] = "Erro - Preencha os campos*";
    echo "n rota";
    echo "<script>javascript:history.back(-2)</script>";
}
switch(@$_POST['rota']){
    //switch(1){
    case 1:
        //Inserir na Tabela
        $produto = array(
            'ceproduto'         =>  @$_POST['cpproduto'],
            'datalimitePromo'   =>  @$_POST['data'],
            'descontoPromo'     =>  @$_POST['desconto'],
            'datacadPromo'      =>  date('Y-m-d')
        );
        $grava = DBCreate('promocoes', $produto);
        if($grava){
            $_SESSION['msg'] = "Produto Cadastrado";
            header("Location: ../VIEW/comerciante/cadPromocao.php");
        }else{
            $_SESSION['msg'] = "Erro - Favor, Preencha Novamente";
            header("Location: ../VIEW/comerciante/cadPromocao.php");
        }
        break;
}
?>