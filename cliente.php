<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'gerenciamento_chamados_1');

if(!$conn){
    echo "Conexão não deu boa:" . mysql_error();
}

// DADOS CLIENTE
$nome_cliente = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : 'Não possui nome.';
$email_cliente = isset($_POST['email_cliente']) ? $_POST['email_cliente'] : 'Não posssui email' ;
$telefone_cliente = isset($_POST['telefone_cliente']) ? $_POST['telefone_cliente'] : 'Não possui';

// CREATE
function inserir(string $table, array $campos, array $values) { 
    $campos = implode(',', $campos);
    $values = implode(',', $values);
    $query_inserir = "INSERT INTO $table ($campos) VALUES ($values)";
    global $conn;
    $conn->query($query_inserir);
}

// VER CLIENTE
function ver(string $table){
    $query_ver = "SELECT * from $table";
    global $conn;
    $conn->query($query_ver);
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

inserir("cliente", ['nome_cliente', 'email_cliente', 'telefone_cliente'], ["'$nome_cliente', '$email_cliente', '$telefone_cliente'"]);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PÁGINA DE CADASTRO</title>
</head>
<body>
    <h1>PÁGINA DE CADASTRO</h1>
    <form action="enviar_cadastro" name="enviar_cadastro" method="post">
        <label  for="nome_cliente" value="nome_cliente" required>Insira seu nome:</label><br>
        <input name="nome_cliente" type="text"  required><br><br>
        <label  for="email_cliente" value="email_cliente" required > Insira seu email:</label><br>
        <input name="email_cliente" type="text"  required><br><br>
        <label for="telefone_cliente" value="telefone_cliente" required >Insira seu telefone: <br> Ex: (XX)9XXXX-XXXX</label><br>
        <input name= "telefone_cliente"  type="text" required><br><br>
        <input type="submit" name="enviar_cadastro" > 
    </form>
    <link rel="stylesheet" href="chamado.php">



</body>
</html>


        
    
        
    






