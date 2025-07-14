<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="./css/inicial.css">
</head>
<body>
    <a href="logout.php">Sair</a>
    <header>
        <div class="menu-hamburguer" onclick="document.querySelector('.menu-links').classList.toggle('active')">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <ul class="menu-links">
            <li><a href="#">BLABLABLA</a></li>
            <li><a href="#">BLEBLEBLE</a></li>
            <li><a href="#">BLUBLUBLU</a></li>
        </ul>
        <div class="textos">
            <h2 class="t1">BRAÇO FORTE,</h2>
            <h1 class="t2">EXÉRCITO BRASILEIRO</h1>
            <h2 class="t3">MÃO AMIGA</h2>
        </div>
    </header>
        
    
</body>
</html>