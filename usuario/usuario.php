<?php
    require_once '../conf/conexao.php';

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];


    /**
    * Ação de listar
    */
    if($acao=="listar"){
        $sql   = "SELECT * FROM usuario";
        $query = $con->query($sql);
        $registros = $query->fetchAll();
 
        require_once '../includes/cabecalho.php';
        require_once 'lista_usuario.php';
        require_once '../includes/rodape.php';
     }
     /**
    * Ação Novoi
    **/
    else if($acao == "novo"){
        require_once '../includes/cabecalho.php';
        require_once 'form_usuario.php';
        require_once '../includes/rodape.php';
      }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $sql = "INSERT INTO usuario(nome, fone, email, usuario, senha)
                        VALUES(:nome, :fone, :email, :usuario, :senha)";
        $query = $con->prepare($sql);
        $query->bindParam('nome', $_POST['nome']);
        $query->bindParam('fone', $_POST['fone']);
        $query->bindParam('email', $_POST['email']);
        $query->bindParam('usuario', $_POST['usuario']);
        if(isset($_POST['usuario']) && isset($_POST['senha'])){
            $senha = md5($_POST['senha']);
            $query->bindParam('senha', $senha);
  
            $query->execute();

            if($query){
                header('Location: usuario.php');
            }else{
                $msg = "Erro ao tentar inserir o registro";
            }
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $query = $con->prepare($sql);

        $query->bindParam(':id_usuario', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./usuario.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Buscar
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $query = $con->prepare($sql);
        $query->bindParam(':id_usuario', $id);

        $query->execute();
        $registro = $query->fetch();

        require_once '../includes/cabecalho.php';
        require_once 'form_usuario.php';
        require_once '../includes/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){

        $sql   = "UPDATE usuario SET nome = :nome, fone = :fone, email = :email, usuario = :usuario WHERE id_usuario = :id_usuario";
        $query = $con->prepare($sql);

        $query->bindParam(':id_usuario', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':fone', $_POST['fone']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':usuario', $_POST['usuario']);

        $result = $query->execute();

        if($result){
            header('Location: ./usuario.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }      
    }
    
 ?>
