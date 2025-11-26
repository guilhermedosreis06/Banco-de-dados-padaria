<h1>Cadastrar Produto</h1>
<form action="?page=salvar-produto" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label for="nome_produto">Nome</label>
		<input type="text" id="nome_produto" name="nome_produto" class="form-control" required>
	</div>
	
	<div class="mb-3">
		<label for="tipo_produto">Tipo</label>
		<input type="text" id="tipo_produto" name="tipo_produto" class="form-control">
	</div>
	
	<div class="mb-3">
		<label for="preco_venda">Preço de Venda</label>
		<input type="number" step="0.01" id="preco_venda" name="preco_venda" class="form-control" required>
	</div>

    <div class="mb-3">
		<label for="estoque_atual">Estoque Inicial</label>
		<input type="number" id="estoque_atual" name="estoque_atual" class="form-control" value="0" required>
	</div>
	
	<div class="mb-3">
		<label for="fornecedor_id_fornecedor">Fornecedor</label>
		<select id="fornecedor_id_fornecedor" name="fornecedor_id_fornecedor" class="form-control" required>
			<option value="">Selecione um Fornecedor</option>
			<?php
				$sql_fornecedor = "SELECT * FROM fornecedor ORDER BY nome_fornecedor";
				$res_fornecedor = $conn->query($sql_fornecedor);
				
				if($res_fornecedor->num_rows > 0) {
					while($row_fornecedor = $res_fornecedor->fetch_object()){
						print "<option value='{$row_fornecedor->id_fornecedor}'>{$row_fornecedor->nome_fornecedor}</option>";
					}
				} else {
					print "<option value=''>Nenhum fornecedor encontrado</option>";
				}
			?>
		</select>
	</div>

	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Cadastrar Produto</button>
	</div>
</form>