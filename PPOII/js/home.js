// Select modal elements
const openModalBtn = document.querySelector('.open-modal-btn');
const modalOverlay = document.querySelector('.modal-overlay');
const closeModalBtn = document.querySelector('.close-modal-btn');

// Open modal
openModalBtn.addEventListener('click', function () {
  modalOverlay.classList.add('open');
});

// Close modal
closeModalBtn.addEventListener('click', function () {
  modalOverlay.classList.remove('open');
});

// Close modal if clicking outside of the modal content
modalOverlay.addEventListener('click', function (e) {
  if (e.target === modalOverlay) {
    modalOverlay.classList.remove('open');
  }
});

// Close modal using Esc key
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    modalOverlay.classList.remove('open');
  }
});
