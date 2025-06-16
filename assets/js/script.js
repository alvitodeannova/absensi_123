// assets/js/script.js
// Menghilangkan flash message otomatis setelah 3 detik
document.addEventListener('DOMContentLoaded', () => {
  const flash = document.querySelector('.flash');
  if (flash) {
    setTimeout(() => flash.remove(), 3000);
  }
});