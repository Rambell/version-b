// ADIPA - jQuery y lógica de filtros
$(document).ready(function() {
    console.log('ADIPA JS loaded');
});

$(document).ready(function () {

    // Cerrar announcement bar
    $('#close-announcement').on('click', function () {
        $('#announcement-bar').slideUp(200);
    });

    // Quick searches hero
    $('.hero__quick-btn').on('click', function () {
        const term = $(this).data('term');
        $('#hero-search').val(term);
    });

});