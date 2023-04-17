<?php
require "conexaobd.php";
$id = mysqli_real_escape_string($conexao, $_POST['id']);
$sql = "DELETE FROM funcionarios where id='$id'";
if (!mysqli_query($conexao, $sql)) {
    echo "Erro ao inserir dados: " . mysqli_error($conexao);
    exit();
}

mysqli_close($conexao);

header("Location: ../html/sucesso.html");
?>


