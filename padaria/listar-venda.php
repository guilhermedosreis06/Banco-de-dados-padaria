<h1>Listar Venda</h1>
<?php
    $sql = "SELECT v.*, c.nome_cliente, f.nome_funcionario
            FROM venda v
            LEFT JOIN cliente c ON v.cliente_id_cliente = c.id_cliente
            INNER JOIN funcionario f ON v.funcionario_id_funcionario = f.id_funcionario
            ORDER BY v.data_venda DESC";
    
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultados.</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Data/Hora</th>";
        print "<th>Valor Total</th>";
        print "<th>Cliente</th>";
        print "<th>Funcionário</th>";
        print "<th>Ações</th>";
        print "</tr>";
        
        while($row = $res->fetch_object()){
            $cliente_nome = $row->nome_cliente ?? 'NÃO INFORMADO';
            
            print "<tr>";
            print "<td>".$row->id_venda."</td>";

            print "<td>".date('d/m/Y H:i:s', strtotime($row->data_venda))."</td>"; 
            print "<td>R$ ".number_format($row->valor_total, 2, ',', '.')."</td>";
            print "<td>".$cliente_nome."</td>";
            print "<td>".$row->nome_funcionario."</td>";
            print "<td>
                        <button 
                            class='btn btn-success btn-sm' 
                            onclick=\"location.href='?page=editar-venda&id_venda={$row->id_venda}';\"
                        >
                            Editar
                        </button> 
                        <button 
                            class='btn btn-danger btn-sm' 
                            onclick=\"if(confirm('Tem certeza que deseja excluir? Isso excluirá também os itens da venda!')){location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';}else{false;}\"
                        >
                            Excluir
                        </button>
                  </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p>Não foram encontradas vendas cadastrados.</p>";
    }