<h1>Cadastrar Fornecedor</h1>
<form action="?page=salvar-fornecedor" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label for="nome_fornecedor">Nome</label>
		<input type="text" id="nome_fornecedor" name="nome_fornecedor" class="form-control" required>
	</div>
	<div class="mb-3">
		<label for="cnpj_fornecedor">CNPJ</label>
		<input type="text" id="cnpj_fornecedor" name="cnpj_fornecedor" class="form-control">
	</div>
	<div class="mb-3">
		<label for="telefone_fornecedor">Telefone</label>
		<input type="text" id="telefone_fornecedor" name="telefone_fornecedor" class="form-control">
	</div>
	<div class="mb-3">
		<label for="endereco_fornecedor">Endereço</label>
		<input type="text" id="endereco_fornecedor" name="endereco_fornecedor" class="form-control">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>