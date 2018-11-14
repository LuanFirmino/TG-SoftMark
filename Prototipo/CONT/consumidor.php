<?php
    session_start();
    /*Chamada o Arquivo com as Funções de SQL*/
    require './connection.php';
    require './database.php';
    //Determina a rota especificada
    switch(@$_POST['rota']){
        //Primeiro Cadastro Consumidor (Parcial)
        case 1:
            //Procura Login (email) ja cadastrado
            $info = DBRead('consumidores', "where emailConsu='{$_POST[login]}'", 'emailConsu');
            //Caso tenha retorno retornar mensagem
            if(is_array($info)){
                foreach ($info as $inf){
                    if($_POST['login'] == $inf['emailConsu']){
                        $_SESSION['msg'] = "Email ja cadastrado";
                        header("Location: ../login.php");
                    }
                }
            }
            //Aloca em uma Array as informações recebidas pelo Form
            $consumidor = array(
                'emailConsu'         =>  @$_POST['login'],
                'senhaConsu'         =>  @$_POST['senha']
            );
            //Cadastra no Banco o novo Consumidor
            $grava = DBCreate('consumidores', $consumidor);
            //confirma se foi cadastrado ou não e emite resposta para o usuario
            if($grava){
                $_SESSION['msg'] = "Cadastro Efetuado!!!";
                //Redireciona a pagina
                header("Location: ../login.php");
            }else{
                $_SESSION['msg'] = "Falha ao Efetuar cadastro!!!";
                //Redireciona a pagina
                header("Location: ../login.php");
            }
        break;
        //Login Consumidor
        case 2:
            //Confirma se Login e Senha estão Confere
            $info = DBRead("consumidores", "where emailConsu='$_POST[login]' and senhaConsu='$_POST[senha]'", "cpconsumidor, emailConsu, senhaConsu");
            if(is_array($info)){
                foreach ($info as $inf){
                    if($inf['emailConsu'] == $_POST['login']){
                        if($inf['senhaConsu'] == $_POST['senha']){
                            //Foi necessario Destruir e Reconstruir a Session para que o Cookie fosse criado.
                            session_destroy();
                            //Cria um Cookie com a identificação do consumidor
                            setcookie('codConsu', "{$inf[cpconsumidor]}",time()+14400,'/');
                            session_start();
                            //Redireciona a pagina
                            header("Location: ../VIEW/consumidor/homeConsumidor.php");
                        }
                    }
                }
            } else {
                $_SESSION['msg'] = "Email e/ou Senha Invalida";
                //Redireciona a pagina
                header("Location: ../login.php");
            }
        break;
        //Termino Cadastro (Completo)
        case 3:
            //Atualizar Tabela
            $comerciante = array(
                'nomeConsu'          =>  @$_POST['nome'],
                'cepConsu'           =>  @$_POST['cep'],
                'cidadeConsu'        =>  @$_POST['cidade'],
                'estadoConsu'        =>  @$_POST['estado'],
                'enderecoConsu'      =>  @$_POST['endereco'],
                'complementoConsu'   =>  @$_POST['complemento'],
                'telefoneConsu'      =>  @$_POST['telefone'],
                'cpfConsu'           =>  @$_POST['cpf']
            );
            $grava = DBupdate('comerciante', $comerciante, "cpcomerciante = '$_COOKIE[codConsu]'" );
            if($grava){
                $_SESSION['msg'] = "Cadastro Efetuado";
                header("Location: ../VIEW/consumidor/cadConsumidor.php");
            }else{
                $_SESSION['msg'] = "Falha ao Efetuar Cadastro";
                header("Location: ../VIEW/consumidor/cadConsumidor.php");
            }
        break;
    }
?>