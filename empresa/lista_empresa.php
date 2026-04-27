<div class="container print">
    <h2 class="text-center">Dados Empresariais</h2>
    <a class="btn btn-info mb-2" href="empresa.php?acao=novo"> <i class="fa fa-plus mr-2"></i> Novo</a>
    <a href="../relatorio/empresa/geraPdf.php" target="_blank" class="btn btn-success mb-2"> <i class="nav-icon fas fa-file-pdf mr-2"></i> Relatório de Empresa</a>
    <?php if (count($registros)==0): ?>
        <p>Nenhum registro encontrado.</p>
    <?php else: ?>
        <table id="myDataTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Celular</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $linha): ?>
                    <tr>
                        <td><?= $linha['id_empresa']; ?></td>
                        <td><?= $linha['nome']; ?></td>
                        <td><?= $linha['cnpj']; ?></td>
                        <td><?= $linha['telefone1']; ?></td> 
                        <td><?= $linha['celular1']; ?></td> 
                        <td><?= $linha['email1']; ?></td> 
                        <td class="text-center">
                            <a class="btn btn-warning btn-sm" href="empresa.php?acao=buscar&id=<?php echo $linha['id_empresa']; ?>"> <i class="fas fa-pen"></i> </a>
                            <a class="btn btn-danger btn-sm" href="empresa.php?acao=excluir&id=<?php echo $linha['id_empresa']; ?>"> <i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
