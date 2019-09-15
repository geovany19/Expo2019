
$(function () {
  $('[type="button"]').tooltip();
  $('[data-toggle="tooltip"]').tooltip();
})

$('#tabsEditar a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})

function showModal(){
  alert('pepe')
  $('#modalEditar').modal()
}