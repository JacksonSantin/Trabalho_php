<?php 

    if(isset($registro)) $acao = "empresa.php?acao=atualizar&id=".$registro['id_empresa'];
    else $acao = "empresa.php?acao=gravar";

?>
    
    <div class="container form-empresa">
        <form action="<?php echo $acao; ?>" method="POST"> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php if(isset($registro)) echo $registro['cnpj']; ?>" maxlength="18">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone1">Telefone</label>
                    <input type="text" class="form-control" id="telefone1" name="telefone1" value="<?php if(isset($registro)) echo $registro['telefone1']; ?>" maxlength="25" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone2">Telefone 2</label>
                    <input type="text" class="form-control" id="telefone2" name="telefone2" value="<?php if(isset($registro)) echo $registro['telefone2']; ?>" maxlength="25">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone3">Telefone 3</label>
                    <input type="text" class="form-control" id="telefone3" name="telefone3" value="<?php if(isset($registro)) echo $registro['telefone3']; ?>" maxlength="25">
                </div>
                <div class="form-group col-md-4">
                    <label for="celular1">Celular</label>
                    <input type="text" class="form-control" id="celular1" name="celular1" value="<?php if(isset($registro)) echo $registro['celular1']; ?>" maxlength="25" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="celular2">Celular 2</label>
                    <input type="text" class="form-control" id="celular2" name="celular2" value="<?php if(isset($registro)) echo $registro['celular2']; ?>" maxlength="25" >
                </div>
                <div class="form-group col-md-4">
                    <label for="celular3">Celular 3</label>
                    <input type="text" class="form-control" id="celular3" name="celular3" value="<?php if(isset($registro)) echo $registro['celular3']; ?>" maxlength="25" >
                </div>
                <div class="form-group col-md-4">
                    <label for="email1">E-mail</label>
                    <input type="email" class="form-control" id="email1" name="email1" value="<?php if(isset($registro)) echo $registro['email1']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="email2">E-mail 2</label>
                    <input type="email" class="form-control" id="email2" name="email2" value="<?php if(isset($registro)) echo $registro['email2']; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="email3">E-mail 3</label>
                    <input type="email" class="form-control" id="email3" name="email3" value="<?php if(isset($registro)) echo $registro['email3']; ?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="<?php if(isset($registro)) echo $registro['cep']; ?>" required size="10" maxlength="9">
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php if(isset($registro)) echo $registro['cidade']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php if(isset($registro)) echo $registro['bairro']; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="uf">UF</label>
                    <input type="text" class="form-control" id="uf" name="uf" value="<?php if(isset($registro)) echo $registro['uf']; ?>" required size="2">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="<?php if(isset($registro)) echo $registro['rua']; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" id="numero" name="numero" value="<?php if(isset($registro)) echo $registro['numero']; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="<?php if(isset($registro)) echo $registro['complemento']; ?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php if(isset($registro)) echo $registro['facebook']; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php if(isset($registro)) echo $registro['instagram']; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="<?php if(isset($registro)) echo $registro['twitter']; ?>" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save mr-2"></i> Salvar</button>
            <?php if(!isset($registro)){ ?>
                <button type="reset" class="btn btn-danger mb-2"><i class="fas fa-eraser mr-2"></i> Limpar</button>
            <?php } ?>
            <button class="btn btn-warning mb-2" onclick="JavaScript: window.history.back();"><i class="fa fa-times mr-2"></i> Cancelar</button>
        </form>
    </div>