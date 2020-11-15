<?php
    require_once '../conf/conexao.php';

    //epsodio/epsodio.php?acao=listar

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];


    /**
    * Ação de listar
    */
    if($acao=="listar"){
        $sql   = "SELECT * FROM empresa";
        $query = $con->query($sql);
        $registros = $query->fetchAll();
 
        require_once '../includes/cabecalho.php';
        require_once 'lista_empresa.php';
        require_once '../includes/rodape.php';
     }
     /**
    * Ação Novo
    **/
    else if($acao == "novo"){
        require_once '../includes/cabecalho.php';
        require_once 'form_empresa.php';
        require_once '../includes/rodape.php';
      }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $sql = "INSERT INTO empresa(nome, cnpj, telefone1, telefone2, telefone3, celular1, celular2, celular3, email1, email2, email3, cep, cidade, bairro, uf,
                                    rua, numero, complemento, facebook, instagram, twitter)
                  VALUES(:nome, :cnpj, :telefone1, :telefone2, :telefone3, :celular1, :celular2, :celular3, :email1, :email2, :email3, :cep, :cidade, :bairro, :uf,
                         :rua, :numero, :complemento, :facebook, :instagram, :twitter)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./empresa.php');
        }else{
            print_r($registro);
            echo "Erro ao tentar inserir o registro, msg: " . print_r($query->errorInfo());
        }
    }
    /**
    * Ação Excluir
    **/
    else if($acao == "excluir"){
        $id    = $_GET['id'];
        $sql   = "DELETE FROM empresa WHERE id_empresa = :id_empresa";
        $query = $con->prepare($sql);

        $query->bindParam(':id_empresa', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./empresa.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Buscar
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM empresa WHERE id_empresa = :id_empresa";
        $query = $con->prepare($sql);
        $query->bindParam(':id_empresa', $id);

        $query->execute();
        $registro = $query->fetch();

        require_once '../includes/cabecalho.php';
        require_once 'form_empresa.php';
        require_once '../includes/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE empresa SET nome = :nome, cnpj = :cnpj, telefone1 = :telefone1, telefone2 = :telefone2, telefone3 = :telefone3, celular1 = :celular1, 
                                     celular2 = :celular2, celular3 = :celular3, email1 = :email1, email2 = :email2, email3 = :email3, cep = :cep,
                                     cidade = :cidade, bairro = :bairro, uf = :uf, rua = :rua, numero = :numero, complemento = :complemento, facebook = :facebook,
                                     instagram = :instagram, twitter = :twitter WHERE id_empresa = :id_empresa";
        $query = $con->prepare($sql);

        $query->bindParam(':id_empresa', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':cnpj', $_POST['cnpj']);
        $query->bindParam(':telefone1', $_POST['telefone1']);
        $query->bindParam(':telefone2', $_POST['telefone2']);
        $query->bindParam(':telefone3', $_POST['telefone3']);
        $query->bindParam(':celular1', $_POST['celular1']);
        $query->bindParam(':celular2', $_POST['celular2']);
        $query->bindParam(':celular3', $_POST['celular3']);
        $query->bindParam(':email1', $_POST['email1']);
        $query->bindParam(':email2', $_POST['email2']);
        $query->bindParam(':email3', $_POST['email3']);
        $query->bindParam(':cep', $_POST['cep']);
        $query->bindParam(':cidade', $_POST['cidade']);
        $query->bindParam(':bairro', $_POST['bairro']);
        $query->bindParam(':uf', $_POST['uf']);
        $query->bindParam(':rua', $_POST['rua']);
        $query->bindParam(':numero', $_POST['numero']);
        $query->bindParam(':complemento', $_POST['complemento']);
        $query->bindParam(':facebook', $_POST['facebook']);
        $query->bindParam(':instagram', $_POST['instagram']);
        $query->bindParam(':twitter', $_POST['twitter']);

        $result = $query->execute();

        if($result){
            header('Location: ./empresa.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
    
 ?>
