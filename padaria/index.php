<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Padaria</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Pão Quentinho</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?page">Home</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Funcionários
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-funcionario">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-funcionario">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Clientes
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-cliente">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-cliente">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Fornecedores
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-fornecedor">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-fornecedor">Listar</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Produtos
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-produto">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-produto">Listar</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Vendas
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="?page=cadastrar-venda">Cadastrar</a></li>
							<li><a class="dropdown-item" href="?page=listar-venda">Listar</a></li>
						</ul>
					</li>

				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"/>
				<button class="btn btn-outline-success" type="submit">Buscar</button>
				</form>
			</div>
		</div>
	</nav>


	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<?php
					// Conexão com banco de dados
					include('config.php');

					switch (@$_REQUEST['page']) {
						// Funcionário
						case 'cadastrar-funcionario':
							include('cadastrar-funcionario.php');
							break;
						case 'listar-funcionario':
							include('listar-funcionario.php');
							break;
						case 'editar-funcionario':
							include('editar-funcionario.php');
							break;
						case 'salvar-funcionario':
							include('salvar-funcionario.php');
							break;

						// Cliente
						case 'cadastrar-cliente':
							include('cadastrar-cliente.php');
							break;
						case 'listar-cliente':
							include('listar-cliente.php');
							break;
						case 'editar-cliente':
							include('editar-cliente.php');
							break;
						case 'salvar-cliente':
							include('salvar-cliente.php');
							break;

						// Fornecedor
						case 'cadastrar-fornecedor':
							include('cadastrar-fornecedor.php');
							break;
						case 'listar-fornecedor':
							include('listar-fornecedor.php');
							break;
						case 'editar-fornecedor':
							include('editar-fornecedor.php');
							break;
						case 'salvar-fornecedor':
							include('salvar-fornecedor.php');
							break;

						// Produto
						case 'cadastrar-produto':
							include('cadastrar-produto.php');
							break;
						case 'listar-produto':
							include('listar-produto.php');
							break;
						case 'editar-produto':
							include('editar-produto.php');
							break;
						case 'salvar-produto':
							include('salvar-produto.php');
							break;

						// Venda
						case 'cadastrar-venda':
							include('cadastrar-venda.php');
							break;
						case 'listar-venda':
							include('listar-venda.php');
							break;
						case 'editar-venda':
							include('editar-venda.php');
							break;
						case 'salvar-venda':
							include('salvar-venda.php');
							break;
						
						default:
							print "<h1>Bem vindo ao Sistema da Pão Quentinho</h1>";
					}
				?>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>