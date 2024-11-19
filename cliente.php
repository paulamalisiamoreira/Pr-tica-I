<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chamado.php">
    <title>PÁGINA DE CADASTRO</title>
</head>
<body>


<?php
require_once 'db.php';

function criar_cliente() {
    if (
        isset($_POST['nome_cliente']) &&
        isset($_POST['email_cliente']) &&
        isset($_POST['telefone_cliente'])
    ) {
        $nome_cliente = ($_POST['nome_cliente']); //? $_POST['nome_cliente']  : 'Não há registro de nomes';
        $email_cliente = ($_POST['email_cliente']); // ? $_POST['email_cliente']  : 'Não posssui email' ;
        $telefone_cliente = ($_POST['telefone_cliente']); //? $_POST['telefone_cliente'] : 'Não possui';
        inserir("cliente", ["nome_cliente", "email_cliente", "telefone_cliente"], ["'$nome_cliente'", "'$email_cliente'", "'$telefone_cliente'"]);
    }
}

function ver(string $table, array $campos){
    $campos = implode(',', $campos);
    trim($campos); // acho q da pra excluir
    
    $query_ver = "SELECT $campos from $table";
    global $conn;
    $resultado = $conn->query($query_ver);
    if($resultado->num_rows > 0){
        echo "<h2>Lista de Usuários</h2>";
        echo "<table>";
        
        $dados = [];
        
        while($row = $resultado->fetch_assoc()){
            $dados[] = $row;
        }
        
        foreach ($dados as $dado) {
            ?>
            <tr>
            <td><?= $dado["pk_cliente"] ?></td>
            <td><?= $dado["nome_cliente"] ?></td>
            <td><?= $dado["email_cliente"] ?></td>
            <td><?= $dado["telefone_cliente"] ?></td>
            <td>
            <a href="">Deletar</a>
            </td>
            </tr>
            <?php
        }
        
        echo "</table>";
    } else{
        echo "Nenhum resultado encontrado";
    }
} 

// UPDATE CLIENTE
function updateCliente(string $table, array $dados, string $id) {
    
    foreach ($dados as $nome => $valor) {
        $query_compos = "$campo = '$values',";
    }
    
    trim($query_compos);
    $query_update = "UPDATE $table SET $query_compos WHERE $id = 'id'";
    
    global $conn;
    $conn->query($query_update);
}

// inserir("cliente", ['nome_cliente', 'email_cliente', 'telefone_cliente'], ["'$nome_cliente'", "'$email_cliente'", "'$telefone_cliente'"]);
ver("cliente", ['pk_cliente', 'nome_cliente', 'email_cliente', 'telefone_cliente']);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    criar_cliente();
}
?>

    <form name="enviar_cadastro" method="POST">
        <label  for="nome_cliente" value="nome_cliente" required>Insira seu nome:</label><br>
        <input name="nome_cliente" type="text"  required><br><br>

        <label  for="email_cliente" value="email_cliente" required > Insira seu email:</label><br>
        <input name="email_cliente" type="text"  required><br><br>

        <label for="telefone_cliente" value="telefone_cliente" required >Insira seu telefone: <br> Ex: (XX)9XXXX-XXXX</label><br>
        <input name= "telefone_cliente"  type="text" required><br><br>

        <input type="submit" name="enviar_cadastro" > 
    </form>
    <a href="chamado.php">Chamados</a>
</body>
</html>