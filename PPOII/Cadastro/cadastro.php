<?php
include_once("../conexao.php");

$usuario = $_POST['usuario'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>