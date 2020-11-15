<div class="container print">
    <h2 class="text-center">Usuários</h2>
    <a class="btn btn-info mb-2" href="usuario.php?acao=novo"> <i class="fa fa-plus mr-2"></i> Novo</a>
    <a href="../relatorio/usuario/geraPdf.php" target="_blank" class="btn btn-success mb-2"> <i class="nav-icon fas fa-file-pdf mr-2"></i> Relatório de Usuários </a>
    <?php if (count($registros)==0): ?>
        <p>Nenhum registro encontrado.</p>
    <?php else: ?>
        <table id="myDataTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Fone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Usuário</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $linha): ?>
                    <tr>
                        <td><?= $linha['id_usuario']; ?></td>
                        <td><?= $linha['nome']; ?></td>
                        <td><?= $linha['fone']; ?></td> 
                        <td><?= $linha['email']; ?></td> 
                        <td><?= $linha['usuario']; ?></td> 
                        <td class="text-center">
                            <a class="btn btn-warning btn-sm" href="usuario.php?acao=buscar&id=<?php echo $linha['id_usuario']; ?>"> <i class="fas fa-pen"></i> </a>
                            <a class="btn btn-danger btn-sm" href="usuario.php?acao=excluir&id=<?php echo $linha['id_usuario']; ?>"> <i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
