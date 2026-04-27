<?php
    require_once '../conf/conexao.php';

    //epsodio/epsodio.php?acao=listar

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];


    /**
    * Ação de listar
    */
    if($acao == "listar"){
        $sql   = "SELECT c.id_cliente, c.nome, c.email, c.dt_nascimento, c.telefone, c.nome_contatoFone, c.celular1, c.nome_contatoCelular1, c.celular2, c.nome_contatoCelular2, c.obs_contato, c.facebook, c.instagram,
                    c.estado_civil, c.sexo, c.obs, c.cep, c.cidade, c.bairro, c.uf, c.rua, c.numero, c.complemento, c.cpf, c.rg, c.cnpj, p.tipo_perfil as perfil
                    FROM cliente c
                    INNER JOIN perfil p ON p.id_perfil=c.id_perfil_interesse";
        $query = $con->query($sql);
        if($query==false) print_r($con->errorInfo());
        $registros = $query->fetchAll();
 
        require_once '../includes/cabecalho.php';
        require_once 'lista_cliente.php';
        require_once '../includes/rodape.php';
     }
     /**
    * Ação Novo
    **/
    else if($acao == "novo"){
        $lista_perfil = getPerfil();

        require_once '../includes/cabecalho.php';
        require_once 'form_cliente.php';
        require_once '../includes/rodape.php';
      }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $sql = "INSERT INTO cliente(nome, email, dt_nascimento, telefone, nome_contatoFone, celular1, nome_contatoCelular1, celular2, nome_contatoCelular2, obs_contato, id_perfil_interesse, facebook, instagram, 
                                    estado_civil, sexo, obs, cep, cidade, bairro, uf, rua, numero, complemento, cpf, rg, cnpj)
                  VALUES(:nome, :email, :dt_nascimento, :telefone, :nome_contatoFone, :celular1, :nome_contatoCelular1, :celular2, :nome_contatoCelular2, :obs_contato, :id_perfil_interesse, :facebook, :instagram, 
                                    :estado_civil, :sexo, :obs, :cep, :cidade, :bairro, :uf, :rua, :numero, :complemento, :cpf, :rg, :cnpj)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./cliente.php');
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
        $sql   = "DELETE FROM cliente WHERE id_cliente = :id_cliente";
        $query = $con->prepare($sql);

        $query->bindParam(':id_cliente', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./cliente.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Buscar
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
        $query = $con->prepare($sql);
        $query->bindParam(':id_cliente', $id);

        $query->execute();
        $registro = $query->fetch();

        $lista_perfil = getPerfil();
        require_once '../includes/cabecalho.php';
        require_once 'form_cliente.php';
        require_once '../includes/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE cliente SET nome = :nome, email = :email, dt_nascimento = :dt_nascimento, telefone = :telefone, nome_contatoFone = :nome_contatoFone, celular1 = :celular1, 
                                     nome_contatoCelular1 = :nome_contatoCelular1, celular2 = :celular2, nome_contatoCelular2 = :nome_contatoCelular2, obs_contato = :obs_contato, id_perfil_interesse = :id_perfil_interesse, facebook = :facebook, 
                                     instagram = :instagram, estado_civil = :estado_civil, sexo = :sexo, obs = :obs, cep = :cep, cidade = :cidade, bairro = :bairro, uf = :uf,
                                     rua = :rua, numero = :numero, complemento = :complemento, cpf = :cpf, rg = :rg, cnpj = :cnpj WHERE id_cliente = :id_cliente";
        $query = $con->prepare($sql);

        $query->bindParam(':id_cliente', $_GET['id']);
        $query->bindParam(':nome', $_POST['nome']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':dt_nascimento', $_POST['dt_nascimento']);
        $query->bindParam(':telefone', $_POST['telefone']);
        $query->bindParam(':nome_contatoFone', $_POST['nome_contatoFone']);
        $query->bindParam(':celular1', $_POST['celular1']);
        $query->bindParam(':nome_contatoCelular1', $_POST['nome_contatoCelular1']);
        $query->bindParam(':celular2', $_POST['celular2']);
        $query->bindParam(':nome_contatoCelular2', $_POST['nome_contatoCelular2']);
        $query->bindParam(':obs_contato', $_POST['obs_contato']);
        $query->bindParam(':id_perfil_interesse', $_POST['id_perfil_interesse']);
        $query->bindParam(':facebook', $_POST['facebook']);
        $query->bindParam(':instagram', $_POST['instagram']);
        $query->bindParam(':estado_civil', $_POST['estado_civil']);
        $query->bindParam(':sexo', $_POST['sexo']);
        $query->bindParam(':obs', $_POST['obs']);
        $query->bindParam(':cep', $_POST['cep']);
        $query->bindParam(':cidade', $_POST['cidade']);
        $query->bindParam(':bairro', $_POST['bairro']);
        $query->bindParam(':uf', $_POST['uf']);
        $query->bindParam(':rua', $_POST['rua']);
        $query->bindParam(':numero', $_POST['numero']);
        $query->bindParam(':complemento', $_POST['complemento']);
        $query->bindParam(':cpf', $_POST['cpf']);
        $query->bindParam(':rg', $_POST['rg']);
        $query->bindParam(':cnpj', $_POST['cnpj']);

        $result = $query->execute();

        if($result){
            header('Location: ./cliente.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
    //função que retorna a lista de perfis cadastradas no banco
    function getPerfil(){
        $sql   = "SELECT * FROM perfil";
        $query = $GLOBALS['con']->query($sql);
        $lista_perfil = $query->fetchAll();
        return $lista_perfil;
    }
    
 ?>
