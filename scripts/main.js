const logo = document.getElementById('headlogo');

logo.addEventListener('mouseover', () => {
  // Zoom logo to 150% using CSS transform
  logo.style.transform = 'scale(1.2)';
  logo.style.transition = 'transform 0.4s';

  // Reset zoom after 2 seconds using setTimeout
  setTimeout(() => {
    logo.style.transform = 'scale(1)';
    logo.style.transition = 'transform 0.4s';
  }, 700);
});
