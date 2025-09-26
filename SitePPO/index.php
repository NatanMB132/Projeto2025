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
            <li class="menu-perfil">
                <a href="perfil.php">Perfil</a>
            </li>
            <li class="forum">
                <a href="forum.php">Fórum</a>
            </li> 
            <li class="menu-favoritos">
                <a href="#" onclick="event.preventDefault(); abrirModalFavoritos();">Favoritos ★</a>
            </li>
            <li class="menu-concursos">
                <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-concursos').classList.toggle('active');">Concursos ▼</a>
                <ul class="submenu-concursos">
                    <li class="menu-exercito">
                        <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-exercito').classList.toggle('active');">Exército ▼</a>
                        <ul class="submenu-exercito">
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('ESA');">ESA</a></li>
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('EsPCEx');">EsPCEx</a></li>
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('IME');">IME</a></li>
                        </ul>
                    </li>
                    <li class="menu-aeronautica">
                        <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-aeronautica').classList.toggle('active');">Aeronáutica ▼</a>
                        <ul class="submenu-aeronautica">
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('AFA');">AFA</a></li>
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('EEAR');">EEAR</a></li>
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('ITA');">ITA</a></li>
                        </ul>
                    </li>
                    <li class="menu-marinha">
                        <a href="#" onclick="event.preventDefault(); document.querySelector('.submenu-marinha').classList.toggle('active');">Marinha ▼</a>
                        <ul class="submenu-marinha">
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('EN');">EN</a></li>
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('FN');">FN</a></li>
                            <li><a href="#" onclick="event.preventDefault(); abrirModalConcurso('EFOMM');">EFOMM</a></li>
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
            <h1 class="t1">VOCÊ MILITAR!</h1>
            <div class="textos">
                <h3 class="t2">MARINHA</h3>
                <h3 class="t2">AERONÁUTICA</h3>
                <h3 class="t2">EXÉRCITO</h3>
            </div>
        </div>
        <div class="logo-container">
            <a href="https://www.eb.mil.br/" target="_blank" title="Site do Exército Brasileiro">
                <img src="./img/EBsimbolo.png" alt="Exército Brasileiro" class="logo">
            </a>
            <a href="https://www.marinha.mil.br/" target="_blank" title="Site da Marinha do Brasil">
                <img src="./img/marinhasimbolo.png" alt="Marinha Brasileira" class="logo">
            </a>
            <a href="https://www.fab.mil.br/" target="_blank" title="Site da Força Aérea Brasileira">
                <img src="./img/aerosimbolo.png" alt="Aeronáutica Brasileira" class="logo">
            </a>
        </div>
    </header>

    <h2 class="h2concursos" >Concursos mais famosos</h2>
    <div class="concursos">
        <div class="concurso1">
            <h3>ITA</h3>
            <p>Instituto Tecnológico de Aeronáutica</p>
            <button class="open-card-btn">Ver detalhes</button>
            <div class="info-card">
                <div class="card-content">
                    <h2>Instituto Tecnológico de Aeronáutica</h2>
                    <img src="./img/ita-logo.png" alt="Logo do ITA" style="max-width:120px; margin-bottom:10px;">
                    <p>O ITA é uma instituição universitária pública ligada ao Comando da Aeronáutica (COMAER), localizada em São José dos Campos.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Máximo 25 anos até 31/12 do ano da matrícula</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Junho/Julho</p>
                    <p><b>Provas:</b> Outubro/Novembro</p>
                    <a href="https://www.ita.br" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>
        <div class="concurso2">
            <h3>EFOMM</h3>
            <p>Escola de Formação de Oficiais da Marinha Mercante</p>
            <button class="open-card-btn">Ver detalhes</button>
            <div class="info-card">
                <div class="card-content">
                    <h2>Escola de Formação de Oficiais da Marinha Mercante</h2>
                    <img src="./img/efomm-logo.png" alt="Logo da EFOMM" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino superior vinculada à Marinha do Brasil, responsável pela formação de oficiais para a Marinha Mercante.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>17 a 23 anos até 31/12 do ano da matrícula</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Janeiro/Fevereiro</p>
                    <p><b>Provas:</b> Março/Abril</p>
                    <a href="https://www.marinha.mil.br/efomm/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>
        <div class="concurso3">
            <h3>IME</h3>
            <p>Instituto Militar de Engenharia</p>
            <button class="open-card-btn">Ver detalhes</button>
            <div class="info-card">
                <div class="card-content">
                    <h2>Instituto Militar de Engenharia</h2>
                    <img src="./img/ime-logo.png" alt="Logo do IME" style="max-width:120px; margin-bottom:10px;">
                    <p>O IME é uma instituição de ensino superior vinculada ao Exército Brasileiro, localizada no Rio de Janeiro.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Máximo 25 anos até 31/12 do ano da matrícula</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Janeiro/Fevereiro</p>
                    <p><b>Provas:</b> Março/Abril</p>
                    <a href="https://www.ime.eb.br/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>

        <!-- Modais ocultos para concursos extras -->
            <div class="info-card">
                <div class="card-content">
                    <h2>Escola de Sargentos das Armas (ESA)</h2>
                    <img src="./img/esa-logo.png" alt="Logo da ESA" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino do Exército Brasileiro responsável pela formação de sargentos combatentes.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Idade entre 17 e 24 anos</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Abril/Maio</p>
                    <p><b>Provas:</b> Julho</p>
                    <a href="https://www.esa.eb.mil.br/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
            <div class="info-card">
                <div class="card-content">
                    <h2>Escola Preparatória de Cadetes do Exército (EsPCEx)</h2>
                    <img src="./img/espcex-logo.png" alt="Logo da EsPCEx" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino do Exército Brasileiro responsável pela formação inicial dos futuros oficiais.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Idade entre 17 e 22 anos</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Maio/Junho</p>
                    <p><b>Provas:</b> Setembro</p>
                    <a href="https://www.espcex.eb.mil.br/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
            <div class="info-card">
                <div class="card-content">
                    <h2>Academia da Força Aérea (AFA)</h2>
                    <img src="./img/Academia_da_Força_Aérea.gif" alt="Logo da AFA" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino superior da Força Aérea Brasileira responsável pela formação de oficiais aviadores, intendentes e de infantaria.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Idade entre 17 e 23 anos</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Abril/Maio</p>
                    <p><b>Provas:</b> Junho/Julho</p>
                    <a href="https://ingresso.afaepcar.aer.mil.br/afa" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
            <div class="info-card">
                <div class="card-content">
                    <h2>Escola de Especialistas de Aeronáutica (EEAR)</h2>
                    <img src="./img/eear-logo.png" alt="Logo da EEAR" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino da Força Aérea Brasileira responsável pela formação de sargentos especialistas.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Idade entre 17 e 25 anos</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Março/Abril</p>
                    <p><b>Provas:</b> Junho/Novembro</p>
                    <a href="https://ingresso.eear.aer.mil.br/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
            <div class="info-card">
                <div class="card-content">
                    <h2>Escola Naval (EN)</h2>
                    <img src="./img/EN-logo.png" alt="Logo da EN" style="max-width:120px; margin-bottom:10px;">
                    <p>Instituição de ensino superior da Marinha do Brasil responsável pela formação de oficiais da Marinha.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Idade entre 18 e 23 anos</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Fevereiro/Abril</p>
                    <p><b>Provas:</b> Junho/Julho</p>
                    <a href="https://www.marinha.mil.br/escolanaval/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
            <div class="info-card">
                <div class="card-content">
                    <h2>Fuzileiro Naval (FN)</h2>
                    <img src="./img/FuzileiroN-logo.png" alt="Logo do FN" style="max-width:120px; margin-bottom:10px;">
                    <p>Corpo de militares da Marinha do Brasil especializado em operações anfíbias.</p>
                    <ul>
                        <li>Ser brasileiro nato ou naturalizado</li>
                        <li>Ensino médio completo</li>
                        <li>Idade entre 18 e 22 anos</li>
                        <li>Estar apto fisicamente</li>
                    </ul>
                    <p><b>Inscrições:</b> Janeiro/Fevereiro</p>
                    <p><b>Provas:</b> Março/Abril</p>
                    <a href="https://www.marinha.mil.br/cgcfn/" target="_blank">Site Oficial</a>
                    <br>
                    <button class="favorito-btn" onclick="marcarFavorito(this)">★ Favoritar</button>
                    <button class="close-card-btn">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Favoritos -->
    <div id="modal-favoritos" class="info-card" style="display:none;">
      <div class="card-content">
        <h2>Meus Concursos Favoritos</h2>
        <ul id="lista-favoritos" style="margin-bottom:18px;"></ul>
        <button class="close-card-btn" onclick="fecharModalFavoritos()">Fechar</button>
      </div>
    </div>
    <footer>
        <p>“Este site é um projeto informativo e independente, sem vínculo com o Exército Brasileiro ou qualquer órgão governamental.”</p>
        <a href="https://github.com/NatanMB132">Desenvolvido por Natan Felipe J.</a>
    </footer>
    <script src="./js/index.js"></script>
    <script>
    // Favoritos em localStorage + backend
    let favoritos = [];
    const concursosNomes = {
      'Instituto Tecnológico de Aeronáutica': 'ITA',
      'Escola de Formação de Oficiais da Marinha Mercante': 'EFOMM',
      'Instituto Militar de Engenharia': 'IME',
      'Escola de Sargentos das Armas (ESA)': 'ESA',
      'Escola Preparatória de Cadetes do Exército (EsPCEx)': 'EsPCEx',
      'Academia da Força Aérea (AFA)': 'AFA',
      'Escola de Especialistas de Aeronáutica (EEAR)': 'EEAR',
      'Escola Naval (EN)': 'EN',
      'Fuzileiro Naval (FN)': 'FN'
    };

    function marcarFavorito(btn) {
      const card = btn.closest('.card-content');
      const h2 = card.querySelector('h2');
      let nome = h2 ? h2.textContent.trim() : '';
      if (!nome) return;
      btn.classList.toggle('favoritado');
      if (btn.classList.contains('favoritado')) {
        btn.textContent = '★ Favorito!';
        btn.style.background = '#FFD700';
        btn.style.color = '#333';
        if (!favoritos.includes(nome)) favoritos.push(nome);
      } else {
        btn.textContent = '★ Favoritar';
        btn.style.background = '';
        btn.style.color = '';
        favoritos = favoritos.filter(f => f !== nome);
      }
      salvarFavoritosBackend();
    }

    function abrirModalFavoritos() {
      carregarFavoritosBackend().then(() => {
        const modal = document.getElementById('modal-favoritos');
        const lista = document.getElementById('lista-favoritos');
        lista.innerHTML = '';
        if (favoritos.length === 0) {
          lista.innerHTML = '<li style="color:#888;">Nenhum concurso favoritado ainda.</li>';
        } else {
          favoritos.forEach(nome => {
            lista.innerHTML += `<li>★ ${nome}</li>`;
          });
        }
        modal.style.display = 'block';
        document.getElementById('modal-overlay').style.display = 'block';
      });
    }
    function fecharModalFavoritos() {
      document.getElementById('modal-favoritos').style.display = 'none';
      document.getElementById('modal-overlay').style.display = 'none';
    }

    function salvarFavoritosBackend() {
      fetch('favoritos.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ favoritos })
      });
    }
    function carregarFavoritosBackend() {
      return fetch('favoritos.php')
        .then(r => r.ok ? r.json() : [])
        .then(favs => { favoritos = Array.isArray(favs) ? favs : []; atualizarFavoritosUI(); });
    }
    function atualizarFavoritosUI() {
      document.querySelectorAll('.favorito-btn').forEach(btn => {
        const card = btn.closest('.card-content');
        const h2 = card.querySelector('h2');
        let nome = h2 ? h2.textContent.trim() : '';
        if (favoritos.includes(nome)) {
          btn.classList.add('favoritado');
          btn.textContent = '★ Favorito!';
          btn.style.background = '#FFD700';
          btn.style.color = '#333';
        } else {
          btn.classList.remove('favoritado');
          btn.textContent = '★ Favoritar';
          btn.style.background = '';
          btn.style.color = '';
        }
      });
    }
    // Carregar favoritos ao abrir página
    document.addEventListener('DOMContentLoaded', carregarFavoritosBackend);
    </script>
</body>
</html>