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
    <script src="./js/inicial.js"></script>
</head>
<body>
    <header>
        
        <div class="menu-hamburguer" onclick="document.querySelector('.menu-links').classList.toggle('active')">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="menu-links">
            <li><a href="#">Página 1</a></li>
            <li><a href="#">Página 2</a></li>
            <li><a href="#">Página 3</a></li>
            <a class="voltar" href="logout.php" title="Sair">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="14" cy="14" r="13" fill="#fff" stroke="#333" stroke-width="2"/>
                        <polyline points="17,8 11,14 17,20" fill="none" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
            </a>
        </ul>
        <div class="textos">
            <h3 class="t1">BRAÇO FORTE,</h3>
            <h1 class="t2">EXÉRCITO BRASILEIRO</h1>
            <h3 class="t3">MÃO AMIGA</h3>
        </div>
        <img src="./img/EBsimbolo.png" alt="Exército Brasileiro" class="logo">
    </header>
    <div class="cursos">
       <div

    </div>    
    
</body>
</html>