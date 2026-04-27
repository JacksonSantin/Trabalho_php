<?php 

    if(isset($registro)) $acao = "vendas.php?acao=atualizar&id=".$registro['id_venda'];
    else $acao = "vendas.php?acao=gravar";

?>
    
    <div class="container form-vendas">
        <form action="<?php echo $acao; ?>" method="POST"> 
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="veiculo">Veículo</label>
                    <input type="text" class="form-control" id="veiculo" name="veiculo" value="<?php if(isset($registro)) echo $registro['veiculo']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="valor" name="valor" value="<?php if(isset($registro)) echo $registro['valor']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="ano">Ano</label>
                    <input type="number" class="form-control" id="ano" name="ano" value="<?php if(isset($registro)) echo $registro['ano']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="id_marca_veiculo">Marca</label>
                    <select class="form-control" name="id_marca_veiculo" required>
                        <option value="">Selecione a marca do veículo</option>
                        <?php foreach($lista_marcas as $item): ?>
                            <option value="<?php echo $item['id_marca']; ?>"
                                <?php if(isset($registro) && $registro['id_marca_veiculo']==$item['id_marca']) echo "selected";?>>
                                <?php echo $item['nome']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="potencia">Motor</label>
                    <select class="form-control" name="potencia">
                        <option value="">Selecione o motor</option>
                        <option value="1" <?php if(isset($registro) && $registro['potencia']=='1') echo "selected";?>>1.0</option>
                        <option value="2" <?php if(isset($registro) && $registro['potencia']=='2') echo "selected";?>>1.4</option>
                        <option value="3" <?php if(isset($registro) && $registro['potencia']=='3') echo "selected";?>>1.6</option>
                        <option value="4" <?php if(isset($registro) && $registro['potencia']=='4') echo "selected";?>>1.8</option>
                        <option value="5" <?php if(isset($registro) && $registro['potencia']=='5') echo "selected";?>>2.0</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cor">Cor</label>
                    <input type="text" class="form-control" id="cor" name="cor" value="<?php if(isset($registro)) echo $registro['cor']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="combustivel">Combustível</label>
                    <select class="form-control" name="combustivel">
                        <option value="">Selecione o combustível</option>
                        <option value="gasolina" <?php if(isset($registro) && $registro['combustivel']=='gasolina') echo "selected";?>>Gasolina</option>
                        <option value="etanol" <?php if(isset($registro) && $registro['combustivel']=='etanol') echo "selected";?>>Etanol</option>
                        <option value="gnv" <?php if(isset($registro) && $registro['combustivel']=='gnv') echo "selected";?>>Gás Natural Veicular</option>
                        <option value="eletrico" <?php if(isset($registro) && $registro['combustivel']=='eletrico') echo "selected";?>>Elétrico</option>
                        <option value="diesel" <?php if(isset($registro) && $registro['combustivel']=='diesel') echo "selected";?>>Diesel</option>
                        <option value="flex" <?php if(isset($registro) && $registro['combustivel']=='flex') echo "selected";?>>Flex</option>
                    </select>
                </div>
                <div class="form-check col-md-2 ml-4">
                    <input id="vidro_eletrico" class="form-check-input" type="checkbox" name="vidro_eletrico"
                        <?php if(isset($registro) && $registro['vidro_eletrico']==1) echo "checked"; ?>>
                    <label class="form-check-label" for="vidro_eletrico">  Vidro Elétrico? </label>
                </div>
                <div class="form-check col-md-2">
                    <input id="trava_eletrica" class="form-check-input" type="checkbox" name="trava_eletrica"
                        <?php if(isset($registro) && $registro['trava_eletrica']==1) echo "checked"; ?>>
                    <label class="form-check-label" for="trava_eletrica">  Trava Elétrica? </label>
                </div>
                <div class="form-check col-md-2">
                    <input id="ar_condicionado" class="form-check-input" type="checkbox" name="ar_condicionado"
                        <?php if(isset($registro) && $registro['ar_condicionado']==1) echo "checked"; ?>>
                    <label class="form-check-label" for="ar_condicionado">  Ar Condicionado? </label>
                </div>
                <div class="form-check col-md-2">
                    <input id="radio" class="form-check-input" type="checkbox" name="radio"
                        <?php if(isset($registro) && $registro['radio']==1) echo "checked"; ?>>
                    <label class="form-check-label" for="radio">  Rádio? </label>
                </div>
                <div class="form-group col-md-12">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php if(isset($registro)) echo $registro['descricao']; ?>" required>
                </div>
            </div>    
            <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save mr-2"></i> Salvar</button>
            <?php if(!isset($registro)){ ?>
                <button type="reset" class="btn btn-danger mb-2"><i class="fas fa-eraser mr-2"></i> Limpar</button>
            <?php } ?>
            <button class="btn btn-warning mb-2" onclick="JavaScript: window.history.back();"><i class="fa fa-times mr-2"></i> Cancelar</button>
        </form>
    </div>
