<div class="container print">
    <h2 class="text-center">Veículos</h2>
    <a class="btn btn-info mb-2" href="vendas.php?acao=novo"> <i class="fa fa-plus mr-2"></i> Novo</a>
    <a href="../relatorio/vendas/geraPdf.php" target="_blank" class="btn btn-success mb-2"> <i class="nav-icon fas fa-file-pdf mr-2"></i> Relatório de Veículos </a>
    <?php if (count($registros)==0): ?>
        <p>Nenhum registro encontrado.</p>
    <?php else: ?>
        <table id="myDataTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Veículo</th>
                <th scope="col">Valor (R$)</th>
                <th scope="col">Ano</th>
                <th scope="col">Marca</th>
                <th scope="col">Cor</th>
                <th scope="col">Vidro Elétrico?</th>
                <th scope="col">Trava Elétrica?</th>
                <th scope="col">Ar Condicionado?</th>
                <th scope="col">Rádio?</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $linha): ?>
                    <tr>
                        <td><?= $linha['id_venda']; ?></td>
                        <td><?= $linha['veiculo']; ?></td>
                        <td><?= $linha['valor']; ?></td>
                        <td><?= $linha['ano']; ?></td>
                        <td><?= $linha['marca']; ?></td>
                        <td><?= $linha['cor']; ?></td> 
                        <td><?php if($linha['vidro_eletrico']==1) echo "Sim";
                                    else echo "Não"; ?></td> 
                        <td><?php if($linha['trava_eletrica']==1) echo "Sim";
                                    else echo "Não"; ?></td> 
                        <td><?php if($linha['ar_condicionado']==1) echo "Sim";
                                    else echo "Não"; ?></td> 
                        <td><?php if($linha['radio']==1) echo "Sim";
                                    else echo "Não"; ?></td> 
                        <td><?= $linha['descricao']; ?></td> 
                        <td class="text-center"> 
                            <a class="btn btn-warning btn-sm" href="vendas.php?acao=buscar&id=<?php echo $linha['id_venda']; ?>"> <i class="fas fa-pen"></i> </a>
                            <a class="btn btn-danger btn-sm" href="vendas.php?acao=excluir&id=<?php echo $linha['id_venda']; ?>"> <i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>