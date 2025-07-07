<?php
include_once("conexao.php");

$usuario = $_POST['usuario'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario (nome, senha) VALUES ('$usuario', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "-1";
}
$conn->close();
?>