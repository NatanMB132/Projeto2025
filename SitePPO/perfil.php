<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

require_once 'conexao.php';

$mensagem = '';

// Atualizar nome ou senha
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['atualizar'])) {
    $novo_nome = trim($_POST['novo_nome']);
    $nova_senha = trim($_POST['nova_senha']);
    $usuario = $_SESSION['usuario'];

    if ($novo_nome !== '') {
        $stmt = $conn->prepare("UPDATE usuarios SET usuario = ? WHERE usuario = ?");
        $stmt->bind_param('ss', $novo_nome, $usuario);
        if ($stmt->execute()) {
            $_SESSION['usuario'] = $novo_nome;
            $mensagem = 'Nome atualizado com sucesso!';
        } else {
            $mensagem = 'Erro ao atualizar nome.';
        }
        $stmt->close();
    }
    if ($nova_senha !== '') {
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE usuario = ?");
        $stmt->bind_param('ss', $senha_hash, $_SESSION['usuario']);
        if ($stmt->execute()) {
            $mensagem .= ' Senha atualizada com sucesso!';
        } else {
            $mensagem .= ' Erro ao atualizar senha.';
        }
        $stmt->close();
    }
}

// Excluir perfil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $usuario = $_SESSION['usuario'];
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    if ($stmt->execute()) {
        session_destroy();
        header("Location: login.php?excluido=1");
        exit();
    } else {
        $mensagem = 'Erro ao excluir perfil.';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./css/perfil.css">
</head>
<body>
    <header>
        <a href="index.php">&larr; Voltar</a>
        <h2>Perfil do Usuário</h2>
    </header>
    <main>
        <?php if ($mensagem) { echo '<p style="color:green;">' . htmlspecialchars($mensagem) . '</p>'; } ?>
        <form method="post">
            <label>Nome de usuário atual: <b><?php echo htmlspecialchars($_SESSION['usuario']); ?></b></label><br><br>
            <label>Novo nome de usuário:</label><br>
            <input type="text" name="novo_nome" placeholder="Novo nome"><br><br>
            <label>Nova senha:</label><br>
            <input type="password" name="nova_senha" placeholder="Nova senha"><br><br>
            <button type="submit" name="atualizar">Atualizar Dados</button>
        </form>
        <hr>
        <form method="post" onsubmit="return confirm('Tem certeza que deseja excluir seu perfil? Esta ação não pode ser desfeita.');">
            <button type="submit" name="excluir" style="color:red;">Excluir Perfil</button>
        </form>
    </main>
</body>
</html>
