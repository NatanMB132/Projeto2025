<?php
include_once("../conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT senha FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        echo "Login realizado com sucesso!";

    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>