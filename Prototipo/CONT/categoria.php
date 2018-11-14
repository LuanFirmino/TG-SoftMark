<?php
//session_start();
/*Chammadas de arquivos*/
require './connection.php';
require './database.php';
switch(@$_POST['rota']){
//switch(1){
    case 1:
        //Inserir na Tabela
        $categoria = array(
            'nomeCateg'      =>  @$_POST['categoria'],
            'descricaoCateg' =>  @$_POST['descricao']
        );
        $grava = DBCreate('categorias', $categoria);
        if($grava){
            header("Location: ../VIEW/comerciante/cadProdutos.php");
        }else{
            echo "Não Foi";
        }
    break;
}
?>