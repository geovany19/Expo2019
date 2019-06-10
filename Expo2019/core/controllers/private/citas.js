$(document).ready(function()
{
    showTableCitas()
})

const apiCitas = '../../core/api/public/citas.php?action=';

//Función para obtener y mostrar los registros disponibles
function showTableCitas()
{
    $.ajax({
        url: apiCitas + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                fillTableDoctores(result.dataset);
            }
            
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para llenar tabla con los datos de los registros
function fillTableCitas(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        $('#tbody-doctores').html(content);
        if ( $.fn.DataTable.isDataTable( '#dataTableDoctores' )) {
            destroyDataTable('#dataTableDoctores');
        }
        content += `
        <tr>
            <td>
                <img src="../../resources/img/doctores/5cf97a422b869.png" width="100px" height="100px" alt="" />
            </td>
            <td>${row.nombre_doctor} ${row.apellido_doctor}</td>
            <td>${row.nombre_especialidad}</td>
            <td class="d-flex justify-content-center">
                <div>
                    <img src="../../resources/img/doctores/estado/${row.id_estado}.png" width="30px" height="30px" alt="" />
                    ${row.estado}
                </div>
            </td>
            <td>
                ${(row.id_estado == 1)?'<div class="d-flex justify-content-center" style="align-items: center;"><a data-toggle="modal" data-target="#crearCita"><button type="button" onclick="setDoctor('+row.id_doctor+')" class="btn btn-warning ml-3">Solicitar cita</button></a></div>':''}
            </td>
        </tr>
        `;
    });
    $('#tbody-doctores').html(content);
    renderDataTable('#dataTableDoctores');
}