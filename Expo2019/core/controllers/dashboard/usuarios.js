$(document).ready(function()
{
    showTable();
})

//Constante que sirve para establecer la ruta y los parámetros de comunicación con la API
const api = '../../core/api/dashboard/usuarios.php?action=';
//Función para llenar la tabla con los registros
function fillTable(rows)
 {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        (row.id_estado == 1) ? icon = '1' : icon = '0';
        content += `
            <tr>
                <td>${row.id_usuario}</td>
                <td>${row.nombre_usuario}</td>
                <td>${row.apellido_usuario}</td> 
                <td>${row.correo_usuario}</td>
                <td>${row.usuario_usuario}</td>
                <td>${row.fecha_nacimiento}</td>
                <td><img src="../../resources/img/dashboard/usuarios/${row.foto_usuario}" height="75"></td>
                <td><img src="../../resources/img/sesion/${row.id_sesion}.png" height="32" class="tooltipped" data-tooltip="Estado de sesión"></td></td>
                <td><img src="../../resources/img/estado/${row.id_estado}.png" height="25"></td></td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_usuario})" class="blue-text tooltipped" data-target="#modal-update" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_usuario})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#table-body').html(content);
    $("#tabla-usuarios").DataTable({
        responsive: true,
        retrieve: true,
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

function showTable() 
{
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
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
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}
// Función para mostrar formulario con registro a modificar
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'search',
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
function modalcreate()
{
    $('#form-create')[0].reset();
    $('#modal-create').modal('show');
}

//el controlador está bien, en caso necesités usarlo, es este
// Función para crear un nuevo registro
$('#form-create').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'create',
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
                $('#form-create')[0].reset();
                $("#tabla-usuarios").DataTable().destroy();
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
function modalUpdate(id) {
    
    $.ajax({
        url: api + 'get',
        type: 'post',
        data: {
            id_usuario: id
        },
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
                if (result.status) {
                    $('#form-update')[0].reset();
                    $('#foto').attr('src','../../resources/img/dashboard/usuarios/'+result.dataset.foto_usuario);
                    $('#id_usuario').val(result.dataset.id_usuario);
                    $('#update_nombres').val(result.dataset.nombre_usuario);
                    $('#update_apellidos').val(result.dataset.apellido_usuario);
                    $('#update_correo').val(result.dataset.correo_usuario);
                    $('#update_usuario').val(result.dataset.usuario_usuario);
                    $('#update_fecha').val(result.dataset.fecha_nacimiento);
                    $('#foto_usuario').val(result.dataset.foto_usuario);
                    (result.dataset.id_estado == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);
                    $('#modal-update').modal('show');
                    $("#tabla-usuarios").DataTable().destroy();
                    showTable();
                } else {
                    sweetAlert(2, result.exception, null);
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

// Función para modificar un registro seleccionado previamente
$('#form-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'update',
        type: 'post',
        data: new FormData($('#form-update')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#modal-update').modal('hide');
                    $("#tabla-usuarios").DataTable().destroy();
                    showTable();
                    sweetAlert(1, result.message, null);
                } else {
                    sweetAlert(2, result.exception, null);
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
});

// Función para eliminar un registro seleccionado
function confirmDelete(id, file)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el registro?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: api + 'delete',
                type: 'post',
                data:{
                    id_usuario: id,
                },
                datatype: 'json'
            })
            .done(function(response){
                // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                    $("#tabla-usuarios").DataTable().destroy();
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