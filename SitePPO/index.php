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
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/index.js"></script>
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
                            <li><a href="#">FN</a></li>
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
        <div class="logo-container">
            <img src="./img/EBsimbolo.png" alt="Exército Brasileiro" class="logo">
            <img src="./img/marinhasimbolo.png" alt="Marinha Brasileira" class="logo">
            <img src="./img/aerosimbolo.png" alt="Aeronáutica Brasileira" class="logo">
        </div>
    </header>

    <h2 class="h2concursos" >Concursos mais famosos</h2>
    <div class="concursos">
        <div class="concurso1">
            <h3>ITA</h3>
            <p>Instituto Tecnológico de Aeronáutica</p>
            <button class="open-card-btn">Ver detalhes</button>
            <div class="info-card" style="display:none;">
                <div class="card-content">
                    <h2>Instituto Tecnológico de Aeronáutica</h2>
                    <img src="./img/ita-logo.png" alt="Logo do ITA" style="max-width:120px; margin-bottom:10px;">
                    <p>O ITA é uma instituição universitária pública ligada ao Comando da Aeronáutica (COMAER), localizada em São José dos Campos.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Máximo 25 anos até 31/12 do ano da matrícula</li>
                        <li>Apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Junho/Julho</p>
                    <p><b>Provas:</b> Outubro/Novembro</p>
                    <a href="https://www.ita.br" target="_blank">Site Oficial</a>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>
        <div class="concurso2">
            <h3>EFOMM</h3>
            <p>Escola de Formação de Oficiais da Marinha Mercante</p>
            <button class="open-card-btn">Ver detalhes</button>
            <div class="info-card" style="display:none;">
                <div class="card-content">
                    <h2>Escola de Formação de Oficiais da Marinha Mercante</h2>
                    <img src="./img/efomm-logo.png" alt="Logo da EFOMM" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino superior vinculada à Marinha do Brasil, responsável pela formação de oficiais para a Marinha Mercante.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>17 a 23 anos até 31/12 do ano da matrícula</li>
                        <li>Apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Janeiro/Fevereiro</p>
                    <p><b>Provas:</b> Março/Abril</p>
                    <a href="https://www.marinha.mil.br/efomm/" target="_blank">Site Oficial</a>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>
        <div class="concurso3">
            <h3>IME</h3>
            <p>Instituto Militar de Engenharia</p>
            <button class="open-card-btn">Ver detalhes</button>
            <div class="info-card" style="display:none;">
                <div class="card-content">
                    <h2>Instituto Militar de Engenharia</h2>
                    <img src="./img/ime-logo.png" alt="Logo do IME" style="max-width:120px; margin-bottom:10px;">
                    <p>O IME é uma instituição de ensino superior vinculada ao Exército Brasileiro, localizada no Rio de Janeiro.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Máximo 25 anos até 31/12 do ano da matrícula</li>
                        <li>Apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Janeiro/Fevereiro</p>
                    <p><b>Provas:</b> Março/Abril</p>
                    <a href="https://www.ime.eb.br/" target="_blank">Site Oficial</a>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>
    </div>    
    <footer>
        <p>“Este site é um projeto informativo e independente, sem vínculo com o Exército Brasileiro ou qualquer órgão governamental.”</p>
        <a href="https://github.com/NatanMB132">Desenvolvido por Natan Felipe J.</a>
    </footer>
</body>
</html>