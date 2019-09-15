
$(function () {
  $('[type="button"]').tooltip();
  $('[data-toggle="tooltip"]').tooltip();
})

$(document).ready(function(){
    $("#modalEditar").modal();
});

$('#tabsEditar a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})