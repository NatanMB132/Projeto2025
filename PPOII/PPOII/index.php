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
            <li class="usuario">
                <?php echo isset($_SESSION['usuario']) ? 'Usuário: ' . htmlspecialchars($_SESSION['usuario']) : ''; ?>
            </li>
            <li class="menu-concursos">
                <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-concursos').classList.toggle('active');">Concursos ▼</a>
                <ul class="submenu-concursos">
                    <li class="menu-exercito">
                        <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-exercito').classList.toggle('active');">Exército ▼</a>
                        <ul class="submenu-exercito">
                            <li><a href="#">ESA</a></li>
                            <li><a href="#">EsPCEx</a></li>
                            <li><a href="#">IME</a></li>
                        </ul>
                    </li>
                    <li class="menu-aeronautica">
                        <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-aeronautica').classList.toggle('active');">Aeronáutica ▼</a>
                        <ul class="submenu-aeronautica">
                            <li><a href="#">AFA</a></li>
                            <li><a href="#">EEAR</a></li>
                            <li><a href="#">ITA</a></li>
                        </ul>
                    </li>
                    <li class="menu-marinha">
                        <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-marinha').classList.toggle('active');">Marinha ▼</a>
                        <ul class="submenu-marinha">
                            <li><a href="#">EN</a></li>
                            <li><a href="#">CNC</a></li>
                            <li><a href="#">EFOMM</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <a class="voltar" href="logout.php" title="Sair">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="14" cy="14" r="13" fill="#fff" stroke="#333" stroke-width="2"/>
                        <polyline points="17,8 11,14 17,20" fill="none" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
            </a>
        </ul>
        <div class="titulos">
            <h1 class="t1">EU MILITAR!</h1>
            <div class="textos">
                <h3 class="t2">MARINHA</h3>
                <h3 class="t2">AERONÁUTICA</h3>
                <h3 class="t2">EXÉRCITO</h3>
            </div>
        </div>
        <img src="./img/EBsimbolo.png" alt="Exército Brasileiro" class="logo">
    </header>

    <h2 class="h2concursos" >Concursos mais famosos</h2>
    <div class="concursos">
        <div class="concurso1">
            <h3>ITA</h3>
            <p>Instituto Tecnológico de Aeronáutica</p>
            <button class="btn-concurso1">Ver Detalhes</button>
        </div>
        <div class="concurso2">
            <h3>EFOMM</h3>
            <p>Escola de Formação de Oficiais da Marinha Mercante</p>
            <button class="btn-concurso2">Ver Detalhes</button>
        </div>
        <div class="concurso3">
            <h3>IME</h3>
            <p>Instituto Militar de Engenharia</p>
            <button class="btn-concurso3">Ver Detalhes</button>
        </div>
    </div>    
    
</body>
</html>