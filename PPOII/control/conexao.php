<?php
$servidor = "localhost";
$usuario = "root";
$senha = "1234";
$banco = "meubanco";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

//echo "Conectado com sucesso!";
?>
