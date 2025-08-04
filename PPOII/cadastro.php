<?php
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conexao.php";

    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);

    try {
        if ($stmt->execute()) {
            $msg = '<div class="msgCerto">&#10004; Usuário cadastrado com sucesso!</div>';
            $msg .= '<script>setTimeout(function(){ window.location.href = "login.php"; }, 2000);</script>';
        }
    } catch (mysqli_sql_exception $e) {
        if ($stmt->errno == 1062) {
            $msg = '<div class="msgErro">&#10006; Usuário já existente!</div>';
        } else {
            $msg = '<div class="msgErro">&#10006; Erro ao cadastrar usuário: ' . $e->getMessage() . '</div>';
        }
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/cadastro.css">
    <script src="./js/cadastro.js"></script>
</head>
<body>
   <form id="cadastroform" class="cadastro" method="post" action="cadastro.php">
        <div class="header-cadastro">
            <img src="./img/EBsimbolo.png" alt="Exército Brasileiro" class="EBlogo">
            <h2>Cadastro</h2>
        </div>
        <div class="box">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button id="cadastrosubmit" type="submit">Criar cadastro</button>
        </div>
        <div id="error"> <?php echo $msg; ?>
        <?php if (strpos($msg, 'msgCerto') !== false) { ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.getElementById('cadastrosubmit');
                if(btn) btn.style.display = 'none';
            });
        </script>
        <?php } ?>
        </div>
    
        <div class="login">
            <p>Já possui login?</p>
            <a href="./login.php">Clique Aqui!</a>
        </div>
    </form>
</body>
</html>
