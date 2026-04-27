<?php
  
    if(isset($registro['id_usuario'])) $acao = "usuario.php?acao=atualizar&id=".$registro['id_usuario'];
    else $acao = "usuario.php?acao=gravar";
?>

<div class="container form-usuario">
    <?php if (isset($message)) { ?>
        <div class="alert alert-danger" role="alert">
          <?= $message ?>
        </div>
      <?php } ?>
    <form action="<?php echo $acao; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="fone">Fone</label>
                <input type="text" class="form-control" id="fone" name="fone" value="<?php if(isset($registro)) echo $registro['fone']; ?>" required maxlength="25">
            </div>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($registro)) echo $registro['email']; ?>">
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="usuario">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?php if(isset($registro)) echo $registro['usuario']; ?>" required>
            </div>
            <?php if(!isset($registro)){ ?>
                <div class="form-group col-md-12">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" value="<?php if(isset($registro)) echo $registro['senha']; ?>" required>
                </div>
            <?php }?>
        </div>
        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save mr-2"></i> Salvar</button>
        <?php if(!isset($registro)){ ?>
            <button type="reset" class="btn btn-danger mb-2"><i class="fas fa-eraser mr-2"></i> Limpar</button>
        <?php } ?>
        <button class="btn btn-warning mb-2" onclick="JavaScript: window.history.back();"><i class="fa fa-times mr-2"></i> Cancelar</button>
    </form>
</div>