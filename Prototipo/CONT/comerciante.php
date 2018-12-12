<?php
    session_start();
    /*Chammadas de arquivos*/
    require './connection.php';
    require './database.php';
    switch(@$_POST['rota']){
        //Primeiro Cadastro Comerciante
        case 1:
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
        case 4:
            $info = DBRead('comerciantes', "where emailComer='$_POST[login]'");
            if(is_array($info)) {
                foreach ($info as $inf){
                    $cod = 1011;
                    $_SESSION['msg'] = "Codigo Enviado para seu Email";
                    $_SESSION['cod'] = $cod;
                    $_SESSION['NcodComer'] = $inf['cpcomerciante'];
                    header("Location: ../altSenhaComerS.php");
                }
            } else {
                $_SESSION['msg'] = "Email não cadastrado";
                header("Location: ../altSenhaComer.php");
            }
        break;
        case 5:
            //Alterar Senha Comerciante
            $info = DBRead('comerciantes', "where cpcomerciante='$_POST[codComer]'");
            if(is_array($info)){
                if($_POST['senha'] == $_POST['senhas'] && $_POST['cod'] == $_POST['codi']){
                    foreach ($info as $inf){
                        $comerciante = array(
                            'senhaComer'  =>  $_POST['senha']
                        );
                        $update = DBupdate('comerciantes', $comerciante, "cpcomerciante = '$inf[cpcomerciante]'");
                        if($update){
                            $_SESSION['msg'] = "Alteração Efetuada";
                            header("Location: ../login.php");
                        }
                    }
                } else { $_SESSION['msg'] = "Senha e / ou Codigo incorreto"; header("Location: ../login.php"); }
            } else {
                $_SESSION['msg'] = "Erro, tente novamente mais tarde!";
                header("Location: ../login.php");
            }
        break;
    }
?>