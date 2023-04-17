<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <div class="logo-container">
        <div class="logo-container2">
            <img class="logo" src="../img/b03bb1e6-609f-4dba-9a87-ecd4ed61c538.png" alt="logo digitro">
        </div>
        <div class="logo-text-container">
            <h1 class="title-head">Cadastro de Funcionários</h1>
            <p class="signature">Desenvolvido por Arthur Dantas</p>
        </div>
    </div>
</header>
<div class="btns">
    <a href="../html/adicionar-form.html"> <button class="botao"><i><img src="../icons/user-add-line.svg"></i>Adicionar Funcionário</button></a>
    <a href="../php/listar.php"> <button class="botao"><i><img src="../icons/list-check.svg"></i>Ver, Editar e Excluir Funcionários</button></a>
</div>
<?php
require_once "conexaobd.php";

$sql = "SELECT * FROM funcionarios";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='table-card'>";
    echo "<table class='table'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Data de Nascimento</th><th>CPF</th><th>E-mail</th><th>Estado Civil</th><th>Editar</th><th>Excluir</th></tr>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>{$linha['id']}</td>";
        echo "<td>{$linha['nome']}</td>";
        echo "<td>{$linha['data_nascimento']}</td>";
        echo "<td>{$linha['cpf']}</td>";
        echo "<td>{$linha['email']}</td>";
        echo "<td>{$linha['estado_civil']}</td>";

        echo "<td><form action='form-editar.php' method='POST'>
                <input type='hidden' name='id' value='" . $linha["id"] . "'>
                <button type='submit'>
                    <i>Editar<img src='../icons/edit-line.svg' alt='botao-editar'</i>
                </button>
                </form></td>";

        echo "<td><form action='deletar.php' method='POST'>
                <input type='hidden' name='id' value='" . $linha["id"] . "'>
                <button type='submit'>
                    <i>Excluir<img src='../icons/close-circle-line.svg' alt='botao-excluir'</i>
                </button>
                </form></td>";
        echo "</tr>";
        echo "</div>";
    }

    echo "</table>";
} else {
    echo "Nenhum funcionário encontrado.";
}

mysqli_close($conexao);
?>
</body>
</html>
