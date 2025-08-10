
document.addEventListener('DOMContentLoaded', function() {
  // Overlay para fechar modal ao clicar fora
  if (!document.getElementById('modal-overlay')) {
    var overlay = document.createElement('div');
    overlay.id = 'modal-overlay';
    overlay.style.display = 'none';
    overlay.style.position = 'fixed';
    overlay.style.top = 0;
    overlay.style.left = 0;
    overlay.style.width = '100vw';
    overlay.style.height = '100vh';
    overlay.style.background = 'rgba(0,0,0,0.35)';
    overlay.style.zIndex = 998;
    document.body.appendChild(overlay);
  }
  var overlay = document.getElementById('modal-overlay');

  // Cartão informacional dos concursos
  document.querySelectorAll('.open-card-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var parent = btn.parentNode;
      var card = parent.querySelector('.info-card');
      if (card) {
        card.style.display = 'block';
        overlay.style.display = 'block';
      }
    });
  });

  document.querySelectorAll('.close-card-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var card = btn.closest('.info-card');
      if (card) {
        card.style.display = 'none';
        overlay.style.display = 'none';
      }
    });
  });

  
  // Concursos
  var concursosBtn = document.querySelector('.menu-concursos > a');
  if (concursosBtn) {
    concursosBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      var submenu = document.querySelector('.submenu-concursos');
      if (submenu) {
        var isActive = submenu.classList.contains('active');
        closeAllSubmenus();
        if (!isActive) submenu.classList.add('active');
      }
    });
  }
  // Exército
  var exercitoBtn = document.querySelector('.menu-exercito > a');
  if (exercitoBtn) {
    exercitoBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      var submenu = document.querySelector('.submenu-exercito');
      if (submenu) {
        var isActive = submenu.classList.contains('active');
        closeAllSubmenus(submenu);
        if (!isActive) submenu.classList.add('active');
      }
    });
  }
  // Aeronáutica
  var aeroBtn = document.querySelector('.menu-aeronautica > a');
  if (aeroBtn) {
    aeroBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      var submenu = document.querySelector('.submenu-aeronautica');
      if (submenu) {
        var isActive = submenu.classList.contains('active');
        closeAllSubmenus(submenu);
        if (!isActive) submenu.classList.add('active');
      }
    });
  }
  // Marinha
  var marinhaBtn = document.querySelector('.menu-marinha > a');
  if (marinhaBtn) {
    marinhaBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      var submenu = document.querySelector('.submenu-marinha');
      if (submenu) {
        var isActive = submenu.classList.contains('active');
        closeAllSubmenus(submenu);
        if (!isActive) submenu.classList.add('active');
      }
    });
  }

  // Função global para abrir modal do concurso pelo nome
  window.abrirModalConcurso = function(nome) {
    // Seleciona o modal correto pelo título do concurso
    var titulos = {
      'ITA': 'Instituto Tecnológico de Aeronáutica',
      'EFOMM': 'Escola de Formação de Oficiais da Marinha Mercante',
      'IME': 'Instituto Militar de Engenharia',
      'ESA': 'Escola de Sargentos das Armas',
      'EsPCEx': 'Escola Preparatória de Cadetes do Exército',
      'AFA': 'Academia da Força Aérea',
      'EEAR': 'Escola de Especialistas de Aeronáutica',
      'EN': 'Escola Naval',
      'FN': 'Fuzileiro Naval'
    };
    var titulo = titulos[nome];
    var modal = null;
    document.querySelectorAll('.info-card').forEach(function(card) {
      var h2 = card.querySelector('h2');
      if (h2 && h2.textContent.includes(titulo)) {
        modal = card;
      }
    });
    if (modal) {
      modal.style.display = 'block';
      overlay.style.display = 'block';
    } else {
      alert('Em breve para mais atualizações (NÃO AGUENTO MAISSS)');
    }
  };
});
