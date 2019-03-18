$(document).ready(function(){
    $('.carousel.carousel-slider').carousel({
            fullWidth: true
          });;
    $('.dropdown-trigger').dropdown();
    $('.collapsible').collapsible();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.trigger-modal').modal();
    $('select').formSelect();
    $('#charge-lineal').load('../../resources/js/Administrador/graphics.js');
    $('#charge-bar').load('../../resources/js/Administrador/graphics.js');
    $('#charge-pie').load('../../resources/js/Administrador/graphics.js');
});