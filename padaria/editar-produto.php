<h1>Editar Produto</h1>
<?php
    $sql_prod = "SELECT * FROM produto WHERE id_produto=".$_REQUEST['id_produto'];
    $res_prod = $conn->query($sql_prod);
    $row_prod = $res_prod->fetch_object();

    $sql_forn = "SELECT * FROM fornecedor ORDER BY nome_fornecedor";
    $res_forn = $conn->query($sql_forn);
?>

<form action="?page=salvar-produto" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_produto" value="<?php print $row_prod->id_produto; ?>">
    
    <div class="mb-3">
        <label for="nome_produto">Nome do Produto</label>
        <input 
            type="text" 
            id="nome_produto" 
            name="nome_produto" 
            class="form-control" 
            value="<?php print $row_prod->nome_produto; ?>" 
            required
        >
    </div>
    
    <div class="mb-3">
        <label for="tipo_produto">Tipo / Categoria</label>
        <input 
            type="text" 
            id="tipo_produto" 
            name="tipo_produto" 
            class="form-control" 
            value="<?php print $row_prod->tipo_produto; ?>"
        >
    </div>
    
    <div class="mb-3">
        <label for="preco_venda">Preço de Venda (R$)</label>
        <input 
            type="number" 
            step="0.01" 
            id="preco_venda" 
            name="preco_venda" 
            class="form-control" 
            value="<?php print $row_prod->preco_venda; ?>" 
            required
        >
    </div>

    <div class="mb-3">
        <label for="estoque_atual">Estoque Atual</label>
        <input 
            type="number" 
            id="estoque_atual" 
            name="estoque_atual" 
            class="form-control" 
            value="<?php print $row_prod->estoque_atual; ?>" 
            required
        >
    </div>
    
    <div class="mb-3">
        <label for="fornecedor_id_fornecedor">Fornecedor</label>
        <select id="fornecedor_id_fornecedor" name="fornecedor_id_fornecedor" class="form-control" required>
            <option value="">Selecione um Fornecedor</option>
            <?php
                if($res_forn->num_rows > 0) {
                    while($row_forn = $res_forn->fetch_object()){
                        $selected = ($row_forn->id_fornecedor == $row_prod->fornecedor_id_fornecedor) ? 'selected' : '';
                        print "<option value='{$row_forn->id_fornecedor}' {$selected}>{$row_forn->nome_fornecedor}</option>";
                    }
                }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>