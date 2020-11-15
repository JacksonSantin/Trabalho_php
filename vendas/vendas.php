<?php
    require_once '../conf/conexao.php';

    //epsodio/epsodio.php?acao=listar

    if(!isset($_GET['acao'])) $acao="listar";
    else $acao = $_GET['acao'];


    /**
    * Ação de listar
    */
    if($acao == "listar"){
        $sql   = "SELECT v.id_venda, v.veiculo, v.valor, v.ano, v.potencia, v.cor, v.combustivel, v.vidro_eletrico, v.trava_eletrica, v.ar_condicionado, v.radio, v.descricao, m.nome as marca
                    FROM vendas v
                    INNER JOIN marca m ON m.id_marca=v.id_marca_veiculo";
        $query = $con->query($sql);
        if($query==false) print_r($con->errorInfo());
        $registros = $query->fetchAll();
 
        require_once '../includes/cabecalho.php';
        require_once 'lista_vendas.php';
        require_once '../includes/rodape.php';
     }
     /**
    * Ação Novo
    **/
    else if($acao == "novo"){
        $lista_marcas = getMarcas();

        require_once '../includes/cabecalho.php';
        require_once 'form_vendas.php';
        require_once '../includes/rodape.php';
      }
    /**
    * Ação Gravar
    **/
    else if($acao == "gravar"){
        $registro = $_POST;

        $registro['vidro_eletrico'] = (isset($registro['vidro_eletrico']))? 1 : 0;
        $registro['trava_eletrica'] = (isset($registro['trava_eletrica']))? 1 : 0;
        $registro['ar_condicionado'] = (isset($registro['ar_condicionado']))? 1 : 0;
        $registro['radio'] = (isset($registro['radio']))? 1 : 0;

        $sql = "INSERT INTO vendas(veiculo, valor, ano, id_marca_veiculo, potencia, cor, combustivel, vidro_eletrico, trava_eletrica, ar_condicionado, radio, descricao)
                  VALUES(:veiculo, :valor, :ano, :id_marca_veiculo, :potencia, :cor, :combustivel, :vidro_eletrico, :trava_eletrica, :ar_condicionado, :radio, :descricao)";
        $query = $con->prepare($sql);
        $result = $query->execute($registro);
        if($result){
            header('Location: ./vendas.php');
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
        $sql   = "DELETE FROM vendas WHERE id_venda = :id_venda";
        $query = $con->prepare($sql);

        $query->bindParam(':id_venda', $id);

        $result = $query->execute();
        if($result){
            header('Location: ./vendas.php');
        }else{
            echo "Erro ao tentar remover o resgitro de id: " . $id;
        }
    }
    /**
    * Ação Buscar
    **/
    else if($acao == "buscar"){
        $id    = $_GET['id'];
        $sql   = "SELECT * FROM vendas WHERE id_venda = :id_venda";
        $query = $con->prepare($sql);
        $query->bindParam(':id_venda', $id);

        $query->execute();
        $registro = $query->fetch();

        $lista_marcas = getMarcas();
        require_once '../includes/cabecalho.php';
        require_once 'form_vendas.php';
        require_once '../includes/rodape.php';

    }
    /**
    * Ação Atualizar
    **/
    else if($acao == "atualizar"){
        $sql   = "UPDATE vendas SET veiculo = :veiculo, valor = :valor, ano = :ano, id_marca_veiculo = :id_marca_veiculo, potencia = :potencia, cor = :cor, combustivel = :combustivel, vidro_eletrico = :vidro_eletrico, 
        trava_eletrica = :trava_eletrica, ar_condicionado = :ar_condicionado, radio = :radio,  descricao = :descricao WHERE id_venda = :id_venda";
        $query = $con->prepare($sql);

        $_POST['vidro_eletrico'] = (isset($_POST['vidro_eletrico']))? 1 : 0;
        $_POST['trava_eletrica'] = (isset($_POST['trava_eletrica']))? 1 : 0;
        $_POST['ar_condicionado'] = (isset($_POST['ar_condicionado']))? 1 : 0;
        $_POST['radio'] = (isset($_POST['radio']))? 1 : 0;

        $query->bindParam(':id_venda', $_GET['id']);
        $query->bindParam(':veiculo', $_POST['veiculo']);
        $query->bindParam(':valor', $_POST['valor']);
        $query->bindParam(':ano', $_POST['ano']);
        $query->bindParam(':id_marca_veiculo', $_POST['id_marca_veiculo']);
        $query->bindParam(':potencia', $_POST['potencia']);
        $query->bindParam(':cor', $_POST['cor']);
        $query->bindParam(':combustivel', $_POST['combustivel']);
        $query->bindParam(':vidro_eletrico', $_POST['vidro_eletrico']);
        $query->bindParam(':trava_eletrica', $_POST['trava_eletrica']);
        $query->bindParam(':ar_condicionado', $_POST['ar_condicionado']);
        $query->bindParam(':radio', $_POST['radio']);
        $query->bindParam(':descricao', $_POST['descricao']);

        $result = $query->execute();

        if($result){
            header('Location: ./vendas.php');
        }else{
            echo "Erro ao tentar atualizar os dados" . print_r($query->errorInfo());
        }
    }
    //função que retorna a lista de marcas cadastradas no banco
    function getMarcas(){
        $sql   = "SELECT * FROM marca";
        $query = $GLOBALS['con']->query($sql);
        $lista_marcas = $query->fetchAll();
        return $lista_marcas;
    }
    
 ?>
