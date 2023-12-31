<h2 class="text-center mb-5">Clientes</h2>

<?php 

$sql = "SELECT * FROM clientes";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0) {
    print "<table class='table table-hover table-striped table-bordered'>";
        print "<thead>";
        print "<tr>";
        print "<th scope='col'>"; print "ID"; print "</th>";
        print "<th scope='col'>"; print "Endereço"; print "</th>";
        print "<th scope='col'>"; print "Razão Social"; print "</th>";
        print "<th scope='col'>"; print "CNPJ"; print "</th>";
        print "<th scope='col'>"; print "Telefone"; print "</th>";
        print "<th scope='col'>"; print "Ações"; print "</th>";
        print "</tr>";
        print "</thead>";

    while($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_cliente; "</td>"; 
        print "<td>" . $row->endereco; "</td>";
        print "<td>" . $row->razao_social; "</td>";
        print "<td>" . $row->cnpj; "</td>";
        print "<td>" . $row->telefone; "</td>";
        print "<td>
            <button onclick=\"location.href='?page=editar_cliente&id_cliente=".$row->id_cliente."'\" class='btn btn-success'>Editar</button>
            <button onclick=\"if(confirm('Tem certeza que seja excluir o cliente selecionado?')){location.href='?page=salvar_clientes&acao=excluir_cliente&id_cliente=".$row->id_cliente."';}else{false;}\" class='btn btn-danger'>Excluir</button>
        </td>";
        print "</tr>";
    }
    print "</table>";
}

else {
    print "<div class='alert text-center alert-danger'  role='alert'>
    Não foi possível encontrar clientes ou você não possui nenhum cliente cadastrado!
</div>";
}
?>