<?php
$headers = apache_request_headers();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Formulário PHP</title>

<style>

body{
    font-family: Arial;
    background:#f2f2f2;
}

input, textarea{
    width:100%;
    padding:8px;
    margin-top:5px;
    margin-bottom:15px;
}

button{
    padding:10px;
    background:#007BFF;
    color:white;
    border:none;
    cursor:pointer;
}

.headers{
    background:#eee;
    padding:10px;
    font-family:monospace;
    max-width:100%;
    overflow-x:auto;
}

.metodo{
    margin-bottom:15px;
}

</style>

<script>

function alterarMetodo() {

    let metodo = document.querySelector('input[name="metodo"]:checked').value;

    document.getElementById("formulario").method = metodo;

}

</script>

</head>

<body>

<div class="container">

<h2>Formulário de Contato</h2>

<div class="metodo">

<b>Escolha o método de envio:</b><br>

<input type="radio" name="metodo" value="POST" checked onclick="alterarMetodo()"> POST
<input type="radio" name="metodo" value="GET" onclick="alterarMetodo()"> GET

</div>

<form id="formulario" method="POST" action="">

Nome
<input type="text" name="nome">

Telefone
<input type="number" name="telefone">

Email
<input type="email" name="email">

Mensagem
<textarea name="mensagem"></textarea>

<button type="submit">Enviar</button>

</form>

<hr>

<h3>Dados Recebidos</h3>

<p><b>Método usado:</b> <?php echo $_SERVER['REQUEST_METHOD']; ?></p>

<p><b>Nome:</b> <?php echo $_REQUEST['nome'] ?? ''; ?></p>
<p><b>Telefone:</b> <?php echo $_REQUEST['telefone'] ?? ''; ?></p>
<p><b>Email:</b> <?php echo $_REQUEST['email'] ?? ''; ?></p>
<p><b>Mensagem:</b> <?php echo $_REQUEST['mensagem'] ?? ''; ?></p>

<hr>

<h3>Cabeçalhos da Requisição HTTP</h3>

<div class="headers">

<?php

foreach($headers as $key => $value){

    echo "<b>$key</b>: $value <br>";

}

?>

</div>

</div>

</body>
</html>