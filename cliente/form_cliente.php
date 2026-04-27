<?php 

    if(isset($registro)) $acao = "cliente.php?acao=atualizar&id=".$registro['id_cliente'];
    else $acao = "cliente.php?acao=gravar";

?>
    
    <div class="container form-cliente">
        <form action="<?php echo $acao; ?>" method="POST"> 
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php if(isset($registro)) echo $registro['nome']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($registro)) echo $registro['email']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="dt_nascimento">Data Nascimento</label>
                    <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="<?php if(isset($registro)) echo $registro['dt_nascimento']; ?>" maxlength="10">
                </div>
                <div class="form-group col-md-8">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php if(isset($registro)) echo $registro['telefone']; ?>" maxlength="25" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nome_contatoFone">Nome do Contato</label>
                    <input type="text" class="form-control" id="nome_contatoFone" name="nome_contatoFone" value="<?php if(isset($registro)) echo $registro['nome_contatoFone']; ?>">
                </div>
                <div class="form-group col-md-8">
                    <label for="celular1">Celular</label>
                    <input type="text" class="form-control" id="celular1" name="celular1" value="<?php if(isset($registro)) echo $registro['celular1']; ?>" maxlength="25" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nome_contatoCelular1">Nome do Contato</label>
                    <input type="text" class="form-control" id="nome_contatoCelular1" name="nome_contatoCelular1" value="<?php if(isset($registro)) echo $registro['nome_contatoCelular1']; ?>" >
                </div>
                <div class="form-group col-md-8">
                    <label for="celular2">Celular 2</label>
                    <input type="text" class="form-control" id="celular2" name="celular2" value="<?php if(isset($registro)) echo $registro['celular2']; ?>" maxlength="25" >
                </div>
                <div class="form-group col-md-4">
                    <label for="nome_contatoCelular2">Nome do Contato</label>
                    <input type="text" class="form-control" id="nome_contatoCelular2" name="nome_contatoCelular2" value="<?php if(isset($registro)) echo $registro['nome_contatoCelular2']; ?>" >
                </div>
                <div class="form-group col-md-12">
                    <label for="obs_contato">Obs. Contato</label>
                    <input type="text" class="form-control" id="obs_contato" name="obs_contato" value="<?php if(isset($registro)) echo $registro['obs_contato']; ?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="<?php if(isset($registro)) echo $registro['facebook']; ?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="<?php if(isset($registro)) echo $registro['instagram']; ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="id_perfil_interesse">Pefil de Interesse</label>
                    <select class="form-control" name="id_perfil_interesse" required>
                        <option value="">Selecione o perfil de interesse</option>
                        <?php foreach($lista_perfil as $item): ?>
                            <option value="<?php echo $item['id_perfil']; ?>"
                                <?php if(isset($registro) && $registro['id_perfil_interesse']==$item['id_perfil']) echo "selected";?>>
                                <?php echo $item['tipo_perfil']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado_civil">Estado Civil</label>
                    <select class="form-control" name="estado_civil">
                        <option value="">Selecione o estado civil</option>
                        <option value="solteiro" <?php if(isset($registro) && $registro['estado_civil']=='solteiro') echo "selected";?>>Solteiro</option>
                        <option value="casado" <?php if(isset($registro) && $registro['estado_civil']=='casado') echo "selected";?>>Casado</option>
                        <option value="divorciado" <?php if(isset($registro) && $registro['estado_civil']=='divorciado') echo "selected";?>>Divorciado</option>
                        <option value="viuvo" <?php if(isset($registro) && $registro['estado_civil']=='viuvo') echo "selected";?>>Viuvo</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="sexo">Sexo</label>
                    <select class="form-control" name="sexo">
                        <option value="">Selecione o sexo</option>
                        <option value="masculino" <?php if(isset($registro) && $registro['sexo']=='masculino') echo "selected";?>>Masculino</option>
                        <option value="feminino" <?php if(isset($registro) && $registro['sexo']=='feminino') echo "selected";?>>Feminino</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="obs">Observações</label>
                    <input type="text" class="form-control" id="obs" name="obs" value="<?php if(isset($registro)) echo $registro['obs']; ?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="<?php if(isset($registro)) echo $registro['cep']; ?>" required maxlength="9">
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
                    <input type="text" class="form-control" id="uf" name="uf" value="<?php if(isset($registro)) echo $registro['uf']; ?>" required maxlength="2">
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
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php if(isset($registro)) echo $registro['cpf']; ?>" maxlength="20">
                </div>
                <div class="form-group col-md-4">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" value="<?php if(isset($registro)) echo $registro['rg']; ?>" maxlength="10" >
                </div>
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php if(isset($registro)) echo $registro['cnpj']; ?>" maxlength="20">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save mr-2"></i> Salvar</button>
            <?php if(!isset($registro)){ ?>
                <button type="reset" class="btn btn-danger mb-2"><i class="fas fa-eraser mr-2"></i> Limpar</button>
            <?php } ?>
            <button class="btn btn-warning mb-2" onclick="JavaScript: window.history.back();"><i class="fa fa-times mr-2"></i> Cancelar</button>
        </form>
    </div>
