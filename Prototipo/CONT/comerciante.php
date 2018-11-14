<?php
    session_start();
    /*Chammadas de arquivos*/
    require './connection.php';
    require './database.php';
    switch(@$_POST['rota']){
        //Primeiro Cadastro Comerciante
        case 1:
            session_start();
            $info = DBRead('comerciantes', "where emailComer='{$_POST[login]}'", 'emailComer');
            foreach ($info as $inf){
                if($_POST['login'] == $inf['emailComer']){
                    $_SESSION['msg'] = "Email ja cadastrado";
                    header("Location: ../login.php");
                }
            }
            $comerciante = array(
                'emailComer'         =>  @$_POST['login'],
                'senhaComer'         =>  @$_POST['senha']
            );
            $grava = DBCreate('comerciantes', $comerciante);
            if($grava){
                $_SESSION['msg'] = "Cadastro Efetuado!!!";
                header("Location: ../login.php");
            }else{
                $_SESSION['msg'] = "Falha ao Efetuar cadastro!!!";
                header("Location: ../login.php");
            }
        break;
        //Login Comerciante
        case 2:
            $info = DBRead("comerciantes", "where emailComer='$_POST[login]' and senhaComer='$_POST[senha]'", "cpcomerciante, emailComer, senhaComer");
            if(is_array($info)){
                foreach ($info as $inf){
                    if($inf['emailComer'] == $_POST['login']){
                        if($inf['senhaComer'] == $_POST['senha']){
                            session_destroy();
                            $aux = $inf['cpcomerciante'];
                            setcookie('codComer', $aux,time()+7200, '/');
                            session_start();
                            header("Location: ../VIEW/comerciante/homeComerciante.php");
                        }
                    }
                }
            } else {
                $_SESSION['msg'] = "Email e/ou Senha Invalida";
                header("Location: ../login.php");
            }
        break;
        //Cadastro Completo
        case 3:
            //Atualizar Tabela
            $comerciante = array(
                'nomeComer'         =>  @$_POST['nome'],
                'telefoneComer'     =>  @$_POST['telefone'],
                'cpfComer'          =>  @$_POST['cpf'],
                'nomeEmpComer'      =>  @$_POST['nomeE'],
                'telefoneEmpComer'  =>  @$_POST['telefoneE'],
                'cepComer'          =>  @$_POST['cep'],
                'enderecoComer'     =>  @$_POST['endereco'],
                'bairroComer'       =>  @$_POST['bairro'],
                'cidadeComer'       =>  @$_POST['cidade'],
                'estadoComer'       =>  @$_POST['estado'],
                'complementoComer'  =>  @$_POST['complemento']
            );
            $grava = DBupdate('comerciantes', $comerciante, "cpcomerciante = '$_COOKIE[codComer]'");
            if($grava){
                $_SESSION['msg'] = "Cadastro Efetuado";
                header("Location: ../VIEW/comerciante/cadComerciante.php");
            }else{
                $_SESSION['msg'] = "Falha ao Efetuar Cadastro";
                header("Location: ../VIEW/comerciante/cadComerciante.php");
            }
        break;
    }
?>