<?php
    switch($_REQUEST['acao']){
        case 'cadastrar':
            $data = $_POST['data_venda'];
            $valor_total = $_POST['valor_total'];
            $id_cliente = $_POST['cliente_id_cliente'];
            $id_funcionario = $_POST['funcionario_id_funcionario'];
            
            $cliente_value = empty($id_cliente) ? 'NULL' : "'{$id_cliente}'";

            $sql = "INSERT INTO venda 
                        (data_venda, valor_total, cliente_id_cliente, funcionario_id_funcionario) 
                    VALUES 
                        ('{$data}','{$valor_total}', {$cliente_value},'{$id_funcionario}')";

            $res = $conn->query($sql);
            if($res == true){
                print "<script>alert('Venda registrada com sucesso!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }else{
                print "<script>alert('Erro ao registrar venda!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }
            break;
            
        case 'editar':
            $data = $_POST['data_venda'];
            $valor_total = $_POST['valor_total'];
            $id_cliente = $_POST['cliente_id_cliente'];
            $id_funcionario = $_POST['funcionario_id_funcionario'];
            $id = $_POST['id_venda'];
            
            $cliente_value = empty($id_cliente) ? 'NULL' : "'{$id_cliente}'";

            $sql = "UPDATE venda SET 
                        data_venda='{$data}', 
                        valor_total='{$valor_total}', 
                        cliente_id_cliente={$cliente_value}, 
                        funcionario_id_funcionario='{$id_funcionario}' 
                    WHERE id_venda=".$id;

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Venda editada com sucesso!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }else{
                print "<script>alert('Erro ao editar venda.');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }
            break;
            
        case 'excluir':
            $id = $_REQUEST['id_venda'];
            
            $sql_item = "DELETE FROM item_venda WHERE venda_id_venda=".$id;
            $conn->query($sql_item);

            $sql_venda = "DELETE FROM venda WHERE id_venda=".$id;

            $res = $conn->query($sql_venda);

            if($res == true){
                print "<script>alert('Venda e seus itens excluídos com sucesso!');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }else{
                print "<script>alert('Erro ao excluir venda.');</script>";
                print "<script>location.href='?page=listar-venda';</script>";
            }
            break;
    }
?>