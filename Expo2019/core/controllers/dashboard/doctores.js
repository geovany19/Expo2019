$(document).ready(function()
{
    showTable();
})

//Constante que sirve para establecer la ruta y los parámetros de comunicación con la API
const api = '../../core/api/dashboard/doctores.php?action=';

//Función para llenar la tabla con los registros
function fillTable(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr>
                <td>${row.id_doctor}</td>
                <td>${row.nombre_doctor}</td>
                <td>${row.apellido_doctor}</td> 
                <td>${row.correo_doctor}</td>
                <td>${row.usuario_doctor}</td>
                <td>${row.fecha_nacimiento}</td>
                <td>${row.foto_doctor}</td>
                <td>${row.id_estado}</td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_doctor})" class="blue-text tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_doctor})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#table-body').html(content);
    $('.tooltipped').tooltip();
}

function showTable()
{
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
            fillTable(result.dataset);
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}