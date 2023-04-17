<?php
require "conexaobd.php";
$id = mysqli_real_escape_string($conexao, $_POST['id']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$data_nascimento = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$estado_civil = mysqli_real_escape_string($conexao, $_POST['estado_civil']);

$sql = "UPDATE funcionarios set nome='$nome', data_nascimento='$data_nascimento', cpf ='$cpf', email='$email', estado_civil='$estado_civil' where id='$id'";
if (!mysqli_query($conexao, $sql)) {
    echo "Erro ao inserir dados: " . mysqli_error($conexao);
    exit();
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);

// Redireciona para a página de sucesso
header("Location: ../html/sucesso.html");
?>