
// Cartão informacional dos concursos
document.querySelectorAll('.open-card-btn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var parent = btn.parentNode;
    var card = parent.querySelector('.info-card');
    if (card) {
      card.style.display = 'block';
    }
  });
});

document.querySelectorAll('.close-card-btn').forEach(function(btn) {
  btn.addEventListener('click', function() {
    var card = btn.closest('.info-card');
    if (card) {
      card.style.display = 'none';
    }
  });
});
