
<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<body>
    
<form method="POST" action="">

    <label>Nome: </label>
    <input type="text" name="nome" placeholder="Seu Nome"><br><br>

    <input name="sendPesqUser" type="submit" value="Pesquisar">
</form>
<?php
$fp = fopen ("listadealunos/lista.txt", "w");
$sendPesqUser = filter_input(INPUT_POST, 'sendPesqUser', FILTER_SANITIZE_STRING);

if($sendPesqUser){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $busca_usuario = "SELECT*FROM usuarios WHERE nome LIKE '%$nome%'";
    $resultado_usuario = mysqli_query ($conexao, $busca_usuario);
    while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

        echo "". $row_usuario['id'] . "<br>";
        echo "". $row_usuario['nome'] ."";
        echo "<br><br>";

    }
    fwrite ($fp, $row_usuario['id'] . PHP_EOL);

}



?>

</body>
</html>
