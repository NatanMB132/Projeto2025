<?php
session_start();
include "conexao.php";

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

// Adicionar pergunta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nova_pergunta"])) {
    $usuario = $_SESSION["usuario"];
    $pergunta = $_POST["pergunta"];
    $stmt = $conn->prepare("INSERT INTO perguntas (usuario, pergunta) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $pergunta);
    $stmt->execute();
    $stmt->close();
}

// Adicionar resposta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nova_resposta"])) {
    $usuario = $_SESSION["usuario"];
    $resposta = $_POST["resposta"];
    $pergunta_id = $_POST["pergunta_id"];
    $stmt = $conn->prepare("INSERT INTO respostas (pergunta_id, usuario, resposta) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $pergunta_id, $usuario, $resposta);
    $stmt->execute();
    $stmt->close();
}

// Excluir pergunta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir_pergunta"])) {
    $pid = $_POST["pergunta_id"];
    $usuario = $_SESSION["usuario"];
    $stmt = $conn->prepare("DELETE FROM perguntas WHERE id = ? AND usuario = ?");
    $stmt->bind_param("is", $pid, $usuario);
    $stmt->execute();
    $stmt->close();
}

// Excluir resposta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir_resposta"])) {
    $rid = $_POST["resposta_id"];
    $usuario = $_SESSION["usuario"];
    $stmt = $conn->prepare("DELETE FROM respostas WHERE id = ? AND usuario = ?");
    $stmt->bind_param("is", $rid, $usuario);
    $stmt->execute();
    $stmt->close();
}

// Buscar perguntas e respostas
$perguntas = $conn->query("SELECT * FROM perguntas ORDER BY criada_em DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Fórum</title>
    <link rel="stylesheet" href="./css/forum.css">
</head>
<body>
    <a href="index.php" style="display:inline-block; margin:20px 0 0 20px; text-decoration:none;">
        <button type="button" style="background:#888; color:#fff; padding:7px 18px; border-radius:5px; border:none; cursor:pointer;">← Voltar</button>
    </a>
    <h2>Fórum de Perguntas</h2>
    <form method="post">
        <textarea name="pergunta" required placeholder="Faça sua pergunta aqui..."></textarea><br>
        <button type="submit" name="nova_pergunta">Adicionar Pergunta</button>
    </form>
    <hr>
    <h3 style="text-align:center; color:#555; margin-top:30px;">Todas as perguntas do fórum</h3>
    <?php while ($p = $perguntas->fetch_assoc()) { ?>
        <div class="pergunta" style="position:relative;">
            <span>
                <b><?php echo htmlspecialchars($p["usuario"]); ?>:</b>
                <?php echo htmlspecialchars($p["pergunta"]); ?>
                <?php if ($p["usuario"] === $_SESSION["usuario"]) { ?>
                    <span style="color:#2980b9; font-size:13px; margin-left:8px;">(sua pergunta)</span>
                <?php } ?>
            </span>
            <?php if ($p["usuario"] === $_SESSION["usuario"]) { ?>
                <form method="post" style="position:absolute; top:8px; right:12px;">
                    <input type="hidden" name="pergunta_id" value="<?php echo $p["id"]; ?>">
                    <button type="submit" name="excluir_pergunta" class="excluir-btn" title="Excluir pergunta">&#128465;</button>
                </form>
            <?php } ?>
            <div style="margin-left:20px;">
                <?php
                $pid = $p["id"];
                $respostas = $conn->query("SELECT * FROM respostas WHERE pergunta_id=$pid ORDER BY criada_em ASC");
                while ($r = $respostas->fetch_assoc()) {
                    echo '<div class="resposta" style="position:relative;">';
                    echo "<span><b>" . htmlspecialchars($r["usuario"]) . ":</b> " . htmlspecialchars($r["resposta"]) . "</span>";
                    if ($r["usuario"] === $_SESSION["usuario"]) {
                        echo '<span style="color:#2980b9; font-size:13px; margin-left:8px;">(sua resposta)</span>';
                        echo '<form method="post" style="position:absolute; top:6px; right:8px;">
                            <input type="hidden" name="resposta_id" value="' . $r["id"] . '">
                            <button type="submit" name="excluir_resposta" class="excluir-btn" title="Excluir resposta">&#128465;</button>
                        </form>';
                    }
                    echo '</div>';
                }
                ?>
                <form method="post" style="margin-top:5px;">
                    <input type="hidden" name="pergunta_id" value="<?php echo $p["id"]; ?>">
                    <textarea name="resposta" required placeholder="Responder..."></textarea>
                    <button type="submit" name="nova_resposta">Responder</button>
                </form>
            </div>
        </div>
        <hr>
    <?php } ?>
</body>
</html>