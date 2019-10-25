$(document).ready(function()
{
    showTable();
    selectEspecialidad('doctoresI',null);
})

//Constantes que sirve para establecer la ruta y los parámetros de comunicación con la apiDoctores y especialidad
const apiDoctores = '../../core/api/dashboard/doctores.php?action=';
const especialidad = '../../core/api/dashboard/especialidades.php?action=';
//Función para llenar la tabla con los registros
function fillTable(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        (row.id_estado == 1) ? icon = '1' : icon = '0';
        content += `
            <tr>
                <td>${row.id_doctor}</td>
                <td><img src="../../resources/img/dashboard/doctores/${row.foto_doctor}" height="75"></td>
                <td>${row.nombre_doctor}</td>
                <td>${row.apellido_doctor}</td> 
                <td>${row.correo_doctor}</td>
                <td>${row.usuario_doctor}</td>
                <td>${row.telefono_doctor}</td>
                <td><img src="../../resources/img/sesion/${row.id_sesion}.png" height="32" class="tooltipped" data-tooltip="Estado de sesión"></td></td>
                <td>${row.nombre_especialidad}</td>
                <td>${row.fecha_nacimiento}</td>
                <td><img src="../../resources/img/estado/${row.id_estado}.png" height="25"></td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_doctor})" data-toggle="tooltip" data-placement="top" title="Editar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_doctor})"data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#tabla-doctores').html(content);
    $('#table-body').DataTable({
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
    });
    $('.tooltipped').tooltip();
}

function showTable()
{
    $.ajax({
        url: apiDoctores + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la api es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.session) {
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                fillTable(result.dataset);
            } else {
                console.log(response);
            }
            /*if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
            fillTable(result.dataset);*/
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
        url: apiDoctores + 'search',
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
    fillSelect(especialidad + 'read', 'create_especialidad', null);
    $('#modal-create').modal('show');
}

// Función para crear un nuevo registro
$('#form-create').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiDoctores + 'create',
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
                $("#table-body").DataTable().destroy();
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

// Función para mostrar formulario con registro a modificar
function modalUpdate(id)
{
    $.ajax({
        url: apiDoctores + 'get',
        type: 'post',
        data:{
            id_doctor: id
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
                $('#foto').attr('src','../../resources/img/dashboard/doctores/'+result.dataset.foto_doctor);
                $('#id_doctor').val(result.dataset.id_doctor);
                $('#foto_doctor').val(result.dataset.foto_doctor);
                $('#update_nombre').val(result.dataset.nombre_doctor);
                $('#update_apellido').val(result.dataset.apellido_doctor);
                $('#update_correo').val(result.dataset.correo_doctor);
                $('#update_usuario').val(result.dataset.usuario_doctor);
                $('#update_fecha').val(result.dataset.fecha_nacimiento);
                $('#update_telefono').val(result.dataset.telefono_doctor);
                (result.dataset.id_estado == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);
                fillSelect(especialidad + 'read', 'update_especialidad', result.dataset.id_especialidad);
                $('#modal-update').modal('show');
                $("#table-body").DataTable().destroy();
                showTable();
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
        url: apiDoctores + 'update',
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
                $("#table-body").DataTable().destroy();
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
function selectEspecialidad(Select, value){
    $.ajax({
        url:especialidad+'read',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //console.log(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione una especialidad</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id_especialidad != value) {
                        //console.log(row.id_especialidad);
                        content += `<option  value="${row.id_especialidad}">${row.nombre_especialidad}</option>`;
                    } else {
                        content += `<option  value="${row.id_especialidad}" selected>${row.nombre_especialidad}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay especialidades</option>');
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
        text: '¿Está seguro que desea borrar la especialidad seleccionada?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiDoctores + 'delete',
                type: 'post',
                data:{
                    id_doctor: id
                },
                datatype: 'json'
            })
            .done(function(response){
                // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        $("#table-body").DataTable().destroy();
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
//Tenemos la funcion para el reporte correspondiente donde selecciona la especialidad y aparece el doctor que corresponde a cada especialidad
$('#formDoctor').submit(function(){
    var value = $('#doctoresI').val();
    window.open("../../core/reportes/reporteDoctores.php?requestID="+value);
})