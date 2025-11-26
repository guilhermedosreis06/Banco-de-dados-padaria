<?php
    switch($_REQUEST['acao']){
        case 'cadastrar':
            $nome = $_POST['nome_produto'];
            $tipo = $_POST['tipo_produto'];
            $preco = $_POST['preco_venda'];
            $estoque = $_POST['estoque_atual'];
            $id_fornecedor = $_POST['fornecedor_id_fornecedor'];

            $sql = "INSERT INTO produto 
                        (nome_produto, tipo_produto, preco_venda, estoque_atual, fornecedor_id_fornecedor) 
                    VALUES 
                        ('{$nome}','{$tipo}','{$preco}','{$estoque}','{$id_fornecedor}')";

            $res = $conn->query($sql);
            if($res == true){
                print "<script>alert('Produto cadastrado com sucesso!');</script>";
                print "<script>location.href='?page=listar-produto';</script>";
            }else{
                print "<script>alert('Erro ao cadastrar produto!');</script>";
                print "<script>location.href='?page=listar-produto';</script>";
            }
            break;
            
        case 'editar':
            $nome = $_POST['nome_produto'];
            $tipo = $_POST['tipo_produto'];
            $preco = $_POST['preco_venda'];
            $estoque = $_POST['estoque_atual'];
            $id_fornecedor = $_POST['fornecedor_id_fornecedor'];
            $id = $_POST['id_produto'];

            $sql = "UPDATE produto SET 
                        nome_produto='{$nome}', 
                        tipo_produto='{$tipo}', 
                        preco_venda='{$preco}', 
                        estoque_atual='{$estoque}', 
                        fornecedor_id_fornecedor='{$id_fornecedor}' 
                    WHERE id_produto=".$id;

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Produto editado com sucesso!');</script>";
                print "<script>location.href='?page=listar-produto';</script>";
            }else{
                print "<script>alert('Erro ao editar produto.');</script>";
                print "<script>location.href='?page=listar-produto';</script>";
            }
            break;
            
        case 'excluir':
            $id = $_REQUEST['id_produto'];
            $sql = "DELETE FROM produto WHERE id_produto=".$id;

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Produto excluído com sucesso!');</script>";
                print "<script>location.href='?page=listar-produto';</script>";
            }else{
                print "<script>alert('Não foi possível excluir. O produto pode estar associado a uma venda.');</script>";
                print "<script>location.href='?page=listar-produto';</script>";
            }
            break;
    }
?>