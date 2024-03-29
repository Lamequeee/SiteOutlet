$(document).ready(function(){
    var $carousel = $('.carrossel-imagem');
    var imgWidth = $carousel.find('img').eq(0).width();
    var margin = parseInt($carousel.find('img').eq(0).css('margin-right'));
    var totalImages = $carousel.find('img').length / 2; // Dividindo por 2 porque há clones das imagens
    var currentImg = 0;

    // Clona as imagens e as adiciona ao carrossel
    var $cloneImgs = $carousel.find('img').clone();
    $carousel.append($cloneImgs);

    function moveCarousel() {
        var newPosition = -(currentImg * (imgWidth + margin));
        $carousel.css('transform', 'translateX(' + newPosition + 'px)');
    }

    function next() {
        currentImg++;
        if (currentImg >= totalImages) {
            currentImg = 0;
            $carousel.css('transition', 'none'); // Remove a transição para uma transição suave de volta ao início
            moveCarousel();
            setTimeout(function() {
                $carousel.css('transition', ''); // Reaplica a transição após a reposição
            }, 50); // Pequeno atraso para garantir que a transição seja removida antes de ser reaplicada
        }
        moveCarousel();
    }

    setInterval(next, 3000); // Troca de imagem a cada 3 segundos
});