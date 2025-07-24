const buscador = document.getElementById('search');
  const universidades = document.querySelectorAll('.universidad');
  const normalizar = (texto) =>
    texto
      .toLowerCase()
      .normalize('NFD')
      .replace(/[\u0300-\u036f]/g, '')
      .trim();

  buscador.addEventListener('input', () => {
    const entrada = normalizar(buscador.value);

    universidades.forEach(uni => {
      const palabras = normalizar(uni.getAttribute('data-nombre'));
      if (palabras.includes(entrada)) {
        uni.style.display = 'block';
      } else {
        uni.style.display = 'none';
      }
    });
  });