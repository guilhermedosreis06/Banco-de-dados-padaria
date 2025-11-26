<h1>Editar Fornecedor</h1>
<?php
    $sql = "SELECT * FROM fornecedor WHERE id_fornecedor=".$_REQUEST['id_fornecedor'];

    $res = $conn->query($sql);

    $row = $res->fetch_object();
?>

<form action="?page=salvar-fornecedor" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_fornecedor" value="<?php print $row->id_fornecedor; ?>">
    
    <div class="mb-3">
        <label for="nome_fornecedor">Nome do Fornecedor</label>
        <input 
            type="text" 
            id="nome_fornecedor" 
            name="nome_fornecedor" 
            class="form-control" 
            value="<?php print $row->nome_fornecedor; ?>" 
            required
        >
    </div>
    
    <div class="mb-3">
        <label for="cnpj_fornecedor">CNPJ</label>
        <input 
            type="text" 
            id="cnpj_fornecedor" 
            name="cnpj_fornecedor" 
            class="form-control" 
            value="<?php print $row->cnpj_fornecedor; ?>"
        >
    </div>
    
    <div class="mb-3">
        <label for="telefone_fornecedor">Telefone</label>
        <input 
            type="text" 
            id="telefone_fornecedor" 
            name="telefone_fornecedor" 
            class="form-control" 
            value="<?php print $row->telefone_fornecedor; ?>"
        >
    </div>
    
    <div class="mb-3">
        <label for="endereco_fornecedor">Endereço</label>
        <input 
            type="text" 
            id="endereco_fornecedor" 
            name="endereco_fornecedor" 
            class="form-control" 
            value="<?php print $row->endereco_fornecedor; ?>"
        >
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>