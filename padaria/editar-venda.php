<h1>Editar Venda</h1>
<?php
    $sql_venda = "SELECT * FROM venda WHERE id_venda=".$_REQUEST['id_venda'];
    $res_venda = $conn->query($sql_venda);
    $row_venda = $res_venda->fetch_object();

    $sql_cliente = "SELECT * FROM cliente ORDER BY nome_cliente";
    $res_cliente = $conn->query($sql_cliente);
    
    $sql_func = "SELECT * FROM funcionario ORDER BY nome_funcionario";
    $res_func = $conn->query($sql_func);
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row_venda->id_venda; ?>">
    
    <div class="mb-3">
        <label for="data_venda">Data e Hora da Venda</label>
        <?php
            $datetime_local_format = date('Y-m-d\TH:i', strtotime($row_venda->data_venda));
        ?>
        <input 
            type="datetime-local" 
            id="data_venda" 
            name="data_venda" 
            class="form-control" 
            value="<?php print $datetime_local_format; ?>" 
            required
        >
    </div>
    
    <div class="mb-3">
        <label for="valor_total">Valor Total (R$)</label>
        <input 
            type="number" 
            step="0.01" 
            id="valor_total" 
            name="valor_total" 
            class="form-control" 
            value="<?php print $row_venda->valor_total; ?>" 
            required
        >
    </div>

    <div class="mb-3">
        <label for="cliente_id_cliente">Cliente </label>
        <select id="cliente_id_cliente" name="cliente_id_cliente" class="form-control" required>
            <option value="">Selecione um Cliente</option>
            <?php
                if($res_cliente->num_rows > 0) {
                    while($row_cliente = $res_cliente->fetch_object()){
                        $selected = ($row_cliente->id_cliente == $row_venda->cliente_id_cliente) ? 'selected' : '';
                        print "<option value='{$row_cliente->id_cliente}' {$selected}>{$row_cliente->nome_cliente}</option>";
                    }
                }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="funcionario_id_funcionario">Funcionário Responsável</label>
        <select id="funcionario_id_funcionario" name="funcionario_id_funcionario" class="form-control" required>
            <option value="">Selecione um Funcionário</option>
            <?php
                if($res_func->num_rows > 0) {
                    while($row_func = $res_func->fetch_object()){
                        $selected = ($row_func->id_funcionario == $row_venda->funcionario_id_funcionario) ? 'selected' : '';
                        print "<option value='{$row_func->id_funcionario}' {$selected}>{$row_func->nome_funcionario}</option>";
                    }
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações da Venda</button>
    </div>
</form>