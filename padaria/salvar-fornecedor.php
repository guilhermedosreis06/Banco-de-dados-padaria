<?php
    // O arquivo 'config.php' deve ser incluído aqui para garantir que a variável $conn esteja disponível.
    // Exemplo: include('config.php'); 

    switch($_REQUEST['acao']){
        case 'cadastrar':
            // 1. Recebe os dados do formulário de cadastro
            $nome = $_POST['nome_fornecedor'];
            $cnpj = $_POST['cnpj_fornecedor'];
            $telefone = $_POST['telefone_fornecedor'];
            $endereco = $_POST['endereco_fornecedor'];

            // 2. Monta a query SQL de INSERÇÃO
            $sql = "INSERT INTO fornecedor (nome_fornecedor, cnpj_fornecedor, telefone_fornecedor, endereco_fornecedor) 
            VALUES ('{$nome}','{$cnpj}','{$telefone}','{$endereco}')";

            // 3. Executa a query
            $res = $conn->query($sql);
            
            // 4. Verifica o resultado e redireciona
            if($res == true){
                print "<script>alert('Fornecedor cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar-fornecedor';</script>";
            }else{
                print "<script>alert('Erro ao cadastrar fornecedor. Tente novamente!');</script>";
                print "<script>location.href='?page=listar-fornecedor';</script>";
            }
            break;
            
        case 'editar':
            // 1. Recebe os dados do formulário de edição
            $nome = $_POST['nome_fornecedor'];
            $cnpj = $_POST['cnpj_fornecedor'];
            $telefone = $_POST['telefone_fornecedor'];
            $endereco = $_POST['endereco_fornecedor'];
            $id = $_POST['id_fornecedor']; // ID do registro a ser editado

            // 2. Monta a query SQL de ATUALIZAÇÃO (UPDATE)
            $sql = "UPDATE fornecedor SET 
                        nome_fornecedor='{$nome}', 
                        cnpj_fornecedor='{$cnpj}', 
                        telefone_fornecedor='{$telefone}', 
                        endereco_fornecedor='{$endereco}' 
                    WHERE id_fornecedor=".$id;

            // 3. Executa a query
            $res = $conn->query($sql);

            // 4. Verifica o resultado e redireciona
            if($res == true){
                print "<script>alert('Fornecedor editado com sucesso!');</script>";
                print "<script>location.href='?page=listar-fornecedor';</script>";
            }else{
                print "<script>alert('Erro ao editar fornecedor.');</script>";
                print "<script>location.href='?page=listar-fornecedor';</script>";
            }
            break;
            
        case 'excluir':
            // 1. Recebe o ID do registro a ser excluído
            $id = $_REQUEST['id_fornecedor'];

            // 2. Monta a query SQL de EXCLUSÃO (DELETE)
            $sql = "DELETE FROM fornecedor WHERE id_fornecedor=".$id;

            // 3. Executa a query
            $res = $conn->query($sql);

            // 4. Verifica o resultado e redireciona
            if($res == true){
                print "<script>alert('Fornecedor excluído com sucesso!');</script>";
                print "<script>location.href='?page=listar-fornecedor';</script>";
            }else{
                // Mensagem de erro pode indicar violação de chave estrangeira (se o fornecedor estiver associado a um produto)
                print "<script>alert('Não foi possível excluir. Verifique se o fornecedor está associado a algum produto.');</script>";
                print "<script>location.href='?page=listar-fornecedor';</script>";
            }
            break;
    }
?>