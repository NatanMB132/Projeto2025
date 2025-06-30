<?php
include_once("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT senha FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        echo "1";

    } else {
        echo "0";
    }
} else {
    echo "-1";
}

$conn->close();
?>