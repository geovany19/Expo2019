$(document).ready(function () {
    showTable();
});

//Constantes que sirve para establecer la ruta y los parámetros de comunicación con la apiDoctores y pacientes
const apiCitas = '../../core/api/dashboard/citas.php?action=';
const anexodoct = '../../core/api/dashboard/doctores.php?action=';
const anexopaci = '../../core/api/dashboard/pacientes.php?action=';
const estados = '../../core/api/dasboard/estadoCita.php?action=';
//Función para llenar la tabla con los registros
function fillTable(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        (row.estado == 1) ? icon = '1' : icon = '0';
        content += `
            <tr>
                <td>${row.id_cita}</td>
                <td>${row.nombre_doctor}</td>
                <td>${row.apellido_doctor}</td> 
                <td>${row.nombre_paciente}</td>
                <td>${row.apellido_paciente}</td>
                <td>${row.fecha_cita}</td>
                <td>${row.hora_cita}</td>
                <td>${row.estado}</td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_cita})" data-toggle="tooltip" data-placement="top" title="Editar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_cita})"data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#tabla-citas').html(content);
    $("#table-body").DataTable({
        "oLanguage":{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        responsive: true,
        retrieve: true,
        colReorder: false,
        rowReorder: false,
    });
    $('.tooltipped').tooltip();
}

function showTable()
{
    $.ajax({
        url: apiCitas + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la api es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
            $("#tabla-body").DataTable().destroy();
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

// Función para mostrar formulario con registro a modificar
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCitas + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                fillTable(result.dataset);
                sweetAlert(1, result.message, null);
            } else {
                sweetAlert(3, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

function modalCreate()
{
    $('#form-create')[0].reset();
    fillSelect(anexodoct + 'fill', 'create_doctor', null)
    fillSelect(anexopaci + 'fillpaciente', 'create_paciente',null);
    fillSelect(estados + 'fill', 'create_estado', null);
    $('#modal-create').modal('show');
}

// Función para crear un nuevo registro
$('#form-create').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCitas + 'create',
        type: 'post',
        data: new FormData($('#form-create')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modal-create').modal('hide');
                showTable();
                sweetAlert(1, result.message, 'citas.php');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

// Función para mostrar formulario con registro a modificar
function modalUpdate(id)
{
    $.ajax({
        url: apiCitas + 'get',
        type: 'post',
        data:{
            id_cita: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                console.log(result.dataset);
                $('#form-update')[0].reset();
                $('#id_cita').val(result.dataset.id_cita);
                $('#update_fecha').val(result.dataset.fecha_cita);
                $('#update_hora').val(result.dataset.hora_cita);
                fillSelect(anexodoct + 'fill', 'update_doctor', result.dataset.id_doctor);
                fillSelect(anexopaci + 'fillpaciente', 'update_paciente',result.dataset.id_paciente);
                fillSelect(estados + 'fill', 'update_estado',result.dataset.id_estado);
                $('#modal-update').modal('show');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

// Función para modificar un registro seleccionado previamente
$('#form-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCitas + 'update',
        type: 'post',
        data: new FormData($('#form-update')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modal-update').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
function SelectDoctor(Select, value){
    $.ajax({
        url:anexodoct+'fill',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {

                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione un Doctor</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id_doctor != value) {
                        content += `<option  value="${row.id_doctor}">${row.NombreDoc}</option>`;
                    } else {
                        content += `<option  value="${row.id_doctor}" selected>${row.NombreDoc}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay opciones</option>');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

// Función para eliminar un registro seleccionado
function confirmDelete(id)
{
    swal({
        title: 'Advertencia',
        text: '¿Está seguro que desea borrar la Cita seleccionada?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiCitas + 'delete',
                type: 'post',
                data:{
                    id_cita: id
                },
                datatype: 'json'
            })
            .done(function(response){
                // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        showTable();
                        sweetAlert(1, result.message, null);
                    } else {
                        sweetAlert(2, result.exception, null);
                    }
                } else {
                    console.log(response);
                }
            })
            .fail(function(jqXHR){
                // Se muestran en consola los posibles errores de la solicitud AJAX
                console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
            });
        }
    });
}
