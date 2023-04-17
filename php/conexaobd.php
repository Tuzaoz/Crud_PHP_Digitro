<?php

$host = "db";
$usuario = "root";
$senha = "";
$banco = "php_docker";
$conexao = mysqli_connect($host, $usuario, $senha, $banco);


if (mysqli_connect_errno()) {
    echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
    exit();
}
?>