<?php
session_start();
include "conexao.php";

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["usuario"] = $usuario;
            header("Location: index.php"); 
            exit();
        } else {
            $msg = '<div class="msgErro">&#10006; Senha incorreta!</div>';
        }
    } else {
        $msg = '<div class="msgErro">&#10006; Usuário não encontrado!</div>';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="./js/login.js"></script>
</head>
<body>
    <form id="loginform" class="login" method="post" action="login.php">
        <div>
            <div class="header-cadastro">
                <img src="./img/EBsimbolo.png" class="EBlogo" alt="LogoExército Brasileiro">
                <h2>Login</h2>
            </div>
        </div>
        <div class="box">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button id="loginformbutton" type="submit">Entrar</button>
        </div>
        <div id="error"> <?php echo $msg; ?> </div>
                       
        <div class="cadastro">
            <p>Não possui cadastro?</p>
            <a href="cadastro.php">Cadastrar</a>
        </div>
    </form>
</body>
</html>
