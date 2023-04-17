<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionários Digitro</title>
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
require "conexaobd.php";

$id = mysqli_real_escape_string($conexao, $_POST['id']);

$sql = "SELECT * FROM funcionarios where id='$id'";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_assoc($resultado);
echo
"<div class='main'>
<div class='form-container'>
<form action='query-editar.php' method='post'>
    <input type='hidden' name='id' value='" . $linha["id"] . "'>
    <h2> Editar Funcionário</h2>
    <label>Nome:</label>
    <input type='text' name='nome' value='{$linha['nome']}'><br><br>

    <label>Data de nascimento:</label>
    <input type='date' name='data_nascimento' value='{$linha['data_nascimento']}'><br><br>

    <label>CPF:</label>
    <input type='text' name='cpf' value='{$linha['cpf']}' pattern='\d{3}\.\d{3}\.\d{3}-\d{2}' placeholder='123.123.123-12'><br><br>

    <label>Email:</label>
    <input type='email' name='email' value='{$linha['email']}'><br><br>

    <label>Estado civil:</label>
    <select name='estado_civil'>
        <option selected='selected' value='{$linha['estado_civil']}'>{$linha['estado_civil']}</option>
        <option value='Solteiro(a)'>Solteiro(a)</option>
        <option value='Casado(a)'>Casado(a)</option>
        <option value='Divorciado(a)'>Divorciado(a)</option>
        <option value='Viúvo(a)'>Viúvo(a)</option>
    </select><br><br>

    <input class='botao-submit' type='submit' value='Editar'>
</form>
</div>
</div>";

?>

</body>
</html>
