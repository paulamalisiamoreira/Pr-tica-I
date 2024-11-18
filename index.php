<?php

$conn = mysqli_connect('gerenciamento_chamados_1', 'localhost', 'root');

if(!$conn){
    echo "Conexão não deu boa:";
}

$nome_cliente = $_POST['nome_cliente'];
$email_cliente = $_POST['email_cliente'];
$telefone_cliente = $_POST['telefone_cliente'];


if($_POST['enviar_cadastro']){
    $query_insert('INSERT INTO cliente (nome_cliente, email_cliente, telefone_cliente) VALUES $nome_cliente, $email_cliente, $telefone_cliente');
    echo 'Deu certoo a inserção';
}//  elseif { 
//     Echo 'Não deu certo a inserção';
// }
        
    
        
    






