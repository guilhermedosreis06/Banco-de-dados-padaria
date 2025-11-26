<h1>Cadastrar Nova Venda</h1>
<form action="?page=salvar-venda" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label for="data_venda">Data e Hora da Venda</label>
		<input type="datetime-local" id="data_venda" name="data_venda" class="form-control" value="<?php print date('Y-m-d\TH:i'); ?>" required>
	</div>
	
	<div class="mb-3">
		<label for="valor_total">Valor Total</label>
		<input type="number" step="0.01" id="valor_total" name="valor_total" class="form-control" value="0.00" required>
	</div>

	<div class="mb-3">
		<label for="cliente_id_cliente">Cliente</label>
		<select id="cliente_id_cliente" name="cliente_id_cliente" class="form-control" required>
			<option value="">Selecione um Cliente</option>
			<?php
				$sql_cliente = "SELECT * FROM cliente ORDER BY nome_cliente";
				$res_cliente = $conn->query($sql_cliente);
				
				if($res_cliente->num_rows > 0) {
					while($row_cliente = $res_cliente->fetch_object()){
						print "<option value='{$row_cliente->id_cliente}'>{$row_cliente->nome_cliente}</option>";
					}
				} else {
					print "<option value=''>Nenhum cliente encontrado</option>";
				}
			?>
		</select>
	</div>
	
	<div class="mb-3">
		<label for="funcionario_id_funcionario">Funcionário Responsável</label>
		<select id="funcionario_id_funcionario" name="funcionario_id_funcionario" class="form-control" required>
			<option value="">Selecione um Funcionário</option>
			<?php
				$sql_func = "SELECT * FROM funcionario ORDER BY nome_funcionario";
				$res_func = $conn->query($sql_func);
				
				if($res_func->num_rows > 0) {
					while($row_func = $res_func->fetch_object()){
						print "<option value='{$row_func->id_funcionario}'>{$row_func->nome_funcionario}</option>";
					}
				} else {
					print "<option value=''>Nenhum funcionário encontrado</option>";
				}
			?>
		</select>
	</div>

	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Registrar Venda</button>
	</div>
</form>