<?php
require "conexaobd.php";


$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$data_nascimento = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$estado_civil = mysqli_real_escape_string($conexao, $_POST['estado_civil']);

$sql = "INSERT INTO funcionarios (nome, data_nascimento, cpf, email, estado_civil) VALUES ('$nome', '$data_nascimento', '$cpf', '$email', '$estado_civil')";
if (!mysqli_query($conexao, $sql)) {
    echo "Erro ao inserir dados: " . mysqli_error($conexao);
    exit();
}

mysqli_close($conexao);

header("Location: ../html/sucesso.html");
?>
