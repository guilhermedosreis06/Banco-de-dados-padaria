<?php
    switch($_REQUEST['acao']){
        case 'cadastrar':
            $nome = $_POST['nome_cliente'];
            $cpf = $_POST['cpf_cliente'];
            $email = $_POST['email_cliente'];
            $telefone = $_POST['telefone_cliente'];

            $sql = "INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, telefone_cliente) 
            VALUES ('{$nome}','{$cpf}','{$email}','{$telefone}')";

            $res = $conn->query($sql);
            if($res == true){
                print "<script>alert('Cadastrou com sucesso!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }else{
                print "<script>alert('Algo deu errado, tente novamente!');</script>";
                print "<script>location.href='?page=listar_cliente';</script>";
            }
            break;
        case 'editar':
            $nome = $_POST['nome_cliente'];
            $cpf = $_POST['cpf_cliente'];
            $email = $_POST['email_cliente'];
            $telefone = $_POST['telefone_cliente'];

            $sql = "UPDATE cliente SET nome_cliente='{$nome}', cpf_cliente='{$cpf}', email_cliente='{$email}', telefone_cliente='{$telefone}' WHERE id_cliente=".$_REQUEST['id_cliente'];

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Editou com sucesso!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }else{
                print "<script>alert('Não editou');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }
            break;
        case 'excluir':
            $sql = "DELETE FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];

            $res = $conn->query($sql);

            if($res == true){
                print "<script>alert('Excluiu com sucesso!');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }else{
                print "<script>alert('Não excluiu');</script>";
                print "<script>location.href='?page=listar-cliente';</script>";
            }
            break;
    }

?>