$(document).ready(function () {
    showTable();
});

//Constante que sirve para establecer la ruta y los parámetros de comunicación con la API
const apiCitas = '../../core/api/private/usuarios.php?site=private&action=';

//Función para llenar la tabla con los registros
function fillTable(rows) {
    let content = '';
    //Se recorred las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row) {
        content += `
        <tr>
        <td>${row.id_cita}</td>
        <td>${row.nombre_paciente}</td>
        <td>${row.fecha_cita}</td>
        <td>${row.hora_cita}</td>
        <td>Realizada</td>
        <td>
        <button type="button" class="btn btn-secondary btn-sm" onclick="reporteExpediente(${row.id_paciente})">Expediente</button>
        </td>
      </tr>
        `;
    });
    $('#table-body').html(content);
    $("#table-citas").DataTable({
        responsive: true,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('.tooltipped').tooltip();
}

function showTable() {
    $.ajax({
        url: apiCitas + 'readCita',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    sweetAlert(4, result.exception, null);
                }
                fillTable(result.dataset);
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}
function reporteExpediente(id){

    location.href='../../core/reportes/private/reporteExpediente.php?id='+id;
}

