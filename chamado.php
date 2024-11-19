<?php

require_once 'db.php';

function criar_chamado() {
    if (
        isset($_POST['titulo_chamado']) &&
        isset($_POST['email_cliente']) &&
        isset($_POST['telefone_cliente'])
    ) {
        $nome_cliente = ($_POST['nome_cliente']); //? $_POST['nome_cliente']  : 'Não há registro de nomes';
        $email_cliente = ($_POST['email_cliente']); // ? $_POST['email_cliente']  : 'Não posssui email' ;
        $telefone_cliente = ($_POST['telefone_cliente']); //? $_POST['telefone_cliente'] : 'Não possui';
        inserir("cliente", ["nome_cliente", "email_cliente", "telefone_cliente"], ["'$nome_cliente'", "'$email_cliente'", "'$telefone_cliente'"]);
    }
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
    <label for="titulo_chamado" >Insira o título do chamado:</label><br>
    <input type="text" name="titulo_chamado"><br><br>
    <label for="colaborador" >Insira o colaborador responsável:</label><br>
    <input type="text" name=""> <!-- fazer paranaue para inserir o colaborador por id --><br>
    <label for="descricao" >Insira a descrição do chamado:</label><br>
    <input type="text" name="descricao"><br><br>
    <label for="criticidade" >Insira qual o nível de criticidade:</label><br>  <!--fazer paranaue para inserir o nivel de criticidade -->
    <input type="text" name="criticidade"><br><br>
    <label for="estatus" >Insira qual o status do chamado:</label><br>
    <input type="text" name="estatus"><br><br>
    <label for="titulo_chamado" >Data de abertura:</label><br>
    <input type="date" name="date"><br><br>
    <input type="submit" name="criar_chamado">
</form>



<!-- pagina atual é de criar
ver Chamados
atualizar Chamado n precisa
deletar n precisa -->
    
</body>
</html>