function prevSlide(carouselClass) {
    console.log(carouselClass);
    const carousel = document.getElementById(carouselClass);
    console.log(carousel);
    const ul = carousel.querySelector('ul');
    const imagens = ul.getElementsByTagName('li');
    const lastSlide = imagens[imagens.length - 1];
    ul.insertBefore(lastSlide, imagens[0]);
}

function nextSlide(carouselClass) {
    const carousel = document.getElementById(carouselClass);
    const ul = carousel.querySelector('ul');
    const primeiroSlides = ul.getElementsByTagName('li')[0];
    ul.appendChild(primeiroSlides);
}

const fechar = document.getElementById('fechar');

function abrir_fotos(titulo) {
    console.log(titulo);
    const carrosel = document.getElementById(`${titulo}`);

    carrosel.style.display = 'flex';
    fechar.style.display = 'flex';
    fechar.addEventListener('click', () => {
        carrosel.style.display = 'none';
        fechar.style.display = 'none';
    })
}



