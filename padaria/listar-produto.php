<h1>Listar Produto</h1>
<?php
    $sql = "SELECT p.*, f.nome_fornecedor 
            FROM produto p
            INNER JOIN fornecedor f ON p.fornecedor_id_fornecedor = f.id_fornecedor
            ORDER BY p.nome_produto";
    
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultados.</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Tipo</th>";
        print "<th>Preço</th>";
        print "<th>Estoque</th>";
        print "<th>Fornecedor</th>";
        print "<th>Ações</th>";
        print "</tr>";
        
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_produto."</td>";
            print "<td>".$row->nome_produto."</td>";
            print "<td>".$row->tipo_produto."</td>";
            print "<td>R$ ".number_format($row->preco_venda, 2, ',', '.')."</td>";
            print "<td>".$row->estoque_atual."</td>";
            print "<td>".$row->nome_fornecedor."</td>";
            print "<td>
                        <button 
                            class='btn btn-success btn-sm' 
                            onclick=\"location.href='?page=editar-produto&id_produto={$row->id_produto}';\"
                        >
                            Editar
                        </button> 
                        <button 
                            class='btn btn-danger btn-sm' 
                            onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-produto&acao=excluir&id_produto={$row->id_produto}';}else{false;}\"
                        >
                            Excluir
                        </button>
                  </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não foram encontrados produtos cadastrados.</p>";
    }
?>