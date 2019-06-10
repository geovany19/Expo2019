// Call the dataTables jQuery plugin

var dataTable=[];

const language = {
  "paginate": {
    "next": "Siguiente",
    "previous": "Anterior"
  },
  "zeroRecords": "No se encontraron registros",
  "info": "Página _PAGE_ de _PAGES_",
  "infoEmpty": "No records available",
  "infoFiltered": "(Filtrado de _MAX_ registros)",
  "lengthMenu": "Mostrar _MENU_",
  "search": "Buscar:",
}

function renderDataTable(tableId){
  dataTable[tableId] = $(tableId).DataTable({
    "language": language
  });
}

function destroyDataTable(tableId){
  dataTable[tableId].destroy();
}