<h1>Listar Fornecedor</h1>
<?php

    $sql = "SELECT * FROM fornecedor";
    
    $res = $conn->query($sql);
    
    $qtd = $res->num_rows;

    

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultados.</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>CNPJ</th>";
        print "<th>Telefone</th>";
        print "<th>Endereço</th>";
        print "<th>Ações</th>";
        print "</tr>";
        
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_fornecedor."</td>";
            print "<td>".$row->nome_fornecedor."</td>";
            print "<td>".$row->cnpj_fornecedor."</td>";
            print "<td>".$row->telefone_fornecedor."</td>";
            print "<td>".$row->endereco_fornecedor."</td>";
            print "<td>
                        <button 
                            class='btn btn-success btn-sm' 
                            onclick=\"location.href='?page=editar-fornecedor&id_fornecedor={$row->id_fornecedor}';\"
                        >
                            Editar
                        </button> 
                        <button 
                            class='btn btn-danger btn-sm' 
                            onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-fornecedor&acao=excluir&id_fornecedor={$row->id_fornecedor}';}else{false;}\"
                        >
                            Excluir
                        </button>
                  </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não foram encontrados fornecedores cadastrados.</p>";
    }
?>