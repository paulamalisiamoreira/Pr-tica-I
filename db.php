<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'gerenciamento_chamados_1');

if(!$conn){
    echo "Conexão não deu boa:" . mysql_error();
}

function inserir(string $table, array $campos, array $values) { 
    $campos = implode(',', $campos);
    $values = implode(',', $values);
    $query_inserir = "INSERT INTO $table ($campos) VALUES ($values)";
    global $conn;

    $conn->query($query_inserir);
}