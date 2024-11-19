<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'gerenciamento_chamados_1');

if(!$conn){
    echo "Conexão não deu boa:";
}

// CREATE
function inserir(string $table, array $campos, array $values) { 
    $campos = implode(',', $campos);
    $values = implode(',', $values);
    $query_inserir = "INSERT INTO $table ($campos) VALUES ($values)";
    global $conn;
    $conn->query($query_inserir);
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados</title>
</head>
<body>

<form action="criar_chamado">
    <label for="titulo_chamado" >Insira o título do chamado:</label>
    <input type="text" name="titulo_chamado">
    <label for="colaborador" >Insira o colaborador responsável:</label>
    <input type="text" name=""> <!-- fazer paranaue para inserir o colaborador por id -->
    <label for="descricao" >Insira a descrição do chamado:</label>
    <input type="text" name="descricao">
    <label for="criticidade" >Insira qual o nível de criticidade:</label>  <!--fazer paranaue para inserir o nivel de criticidade -->
    <input type="text" name="criticidade">
    <label for="estatus" >Insira qual o status do chamado:</label>
    <input type="text" name="estatus">
    <label for="titulo_chamado" >Data de abertura:</label>
    <input type="date" name="date">
    <input type="submit" name="criar_chamado">
</form>



<!-- pagina atual é de criar
ver Chamados
atualizar Chamado n precisa
deletar n precisa -->
    
</body>
</html>