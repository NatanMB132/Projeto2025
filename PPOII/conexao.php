<?php
$host = "localhost";
$db = "meusite";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
