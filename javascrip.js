const images = document.querySelectorAll('.carousel img');
let index = 0;

function showImage(i) {
  images.forEach(img => img.classList.remove('active'));
  images[i].classList.add('active');
}

function nextImage() {
  index = (index + 1) % images.length;
  showImage(index);
}

function prevImage() {
  index = (index - 1 + images.length) % images.length;
  showImage(index);
}

setInterval(nextImage, 5000);

  function expandir(boton) {
    const contenido = boton.parentElement.nextElementSibling;
    contenido.classList.toggle('visible');
    boton.textContent = contenido.classList.contains('visible') ? 'Ver menos' : 'Ver más';
  }