$(document).ready(function()
{
    showTable();
})

//Constante que sirve para establecer la ruta y los parámetros de comunicación con la API
const api = '../../core/api/dashboard/doctores.php?action=';

//Función para llenar la tabla con los registros
function fillTable(rows)