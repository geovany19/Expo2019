$(document).ready(function () {
    showTable();
})

//Constantes que sirve para establecer la ruta y los parámetros de comunicación con la API
const apiPacientes = '../../core/api/dashboard/pacientes.php?action=';

//Función para llenar la tabla con los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        (row.id_estado == 1) ? icon = '1' : icon = '0';
        content += `
            <tr>
                <td>${row.id_paciente}</td>
                <td><img src="../../resources/img/dashboard/pacientes/${row.foto_paciente}" height="75"></td>
                <td>${row.nombre_paciente}</td>
                <td>${row.apellido_paciente}</td> 
                <td>${row.correo_paciente}</td>
                <td>${row.usuario_paciente}</td>
                <td>${row.fecha_nacimiento}</td>
                <td>${row.peso_paciente}</td>
                <td>${row.estatura_paciente}</td>
                <td><img src="../../resources/img/estado/${row.id_estado}.png" height="25"></td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_paciente})" class="blue-text tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_paciente})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#tabla-pacientes').html(content);
    $("#table-body").DataTable({
        "oLanguage": {
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
        },
        responsive: true,
        retrieve: true,
        colReorder: false,
        rowReorder: false,
    });
    $('.tooltipped').tooltip();
}

function showTable() {
    $.ajax({
        url: apiPacientes + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.session == 1) {
                    if (!result.status) {
                        sweetAlert(4, result.exception, null);
                    }
                    fillTable(result.dataset);
                } else {
                    //console.log(response);
                    sweetAlert(4, result.exception, 'index.php');
                    $.ajax({
                        url: apiCuenta + 'login',
                        type: 'post',
                        data: null,
                        datatype: 'json'
                    })
                    //location.href = apiCuenta + 'logout';
                    //location.href = '../../views/dashboard/index.php'
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

// Función para mostrar formulario con registro a modificar
$('#form-search').submit(function () {
    event.preventDefault();
    $.ajax({
        url: apiPacientes + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
        .done(function (response) {
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
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})

// Función para crear un nuevo registro
$('#form-create').submit(function () {
    event.preventDefault();
    $.ajax({
        url: apiPacientes + 'create',
        type: 'post',
        data: new FormData($('#form-create')[0]),
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
                if (result.session) {
                    if (result.status) {
                        $('#modal-create').modal('hide');
                        $("#tabla-pacientes").DataTable().destroy();
                        $('#form-create')[0].reset();
                        showTable();
                        sweetAlert(1, result.message, null);
                    } else {
                        sweetAlert(2, result.exception, null);
                    }
                } else {
                    console.log(response);
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})

// Función para mostrar formulario con registro a modificar
function modalUpdate(id) {
    $.ajax({
        url: apiPacientes + 'get',
        type: 'post',
        data: {
            id_paciente: id
        },
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
                if (result.session) {
                    if (result.status) {
                        console.log(result.dataset)
                        $('#form-update')[0].reset();
                        $('#id_paciente').val(result.dataset.id_paciente);
                        $('#update_nombres').val(result.dataset.nombre_paciente);
                        $('#update_apellidos').val(result.dataset.apellido_paciente);
                        $('#update_correo').val(result.dataset.correo_paciente);
                        $('#update_usuario').val(result.dataset.usuario_paciente);
                        $('#update_fecha').val(result.dataset.fecha_nacimiento);
                        $('#foto_paciente').val(result.dataset.foto_paciente);
                        $('#foto').attr('src', '../../resources/img/dashboard/pacientes/' + result.dataset.foto_paciente);
                        $('#update_peso').val(result.dataset.peso_paciente);
                        $('#update_estatura').val(result.dataset.estatura_paciente);
                        (result.dataset.id_estado == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);
                        $('#modal-update').modal('show');
                    } else {
                        sweetAlert(2, result.exception, null);
                    }
                } else {
                    //console.log(response);
                    sweetAlert(4, result.exception, 'index.php');
                    location.href = apiCuenta + 'logout';
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
$('#form-update').submit(function () {
    event.preventDefault();
    $.ajax({
        url: apiPacientes + 'update',
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
                if (result.session == 1) {
                    if (result.status) {
                        $('#modal-update').modal('hide');
                        $("#tabla-pacientes").DataTable().destroy();
                        showTable();
                        sweetAlert(1, result.message, null);
                    } else {
                        sweetAlert(2, result.exception, null);
                    }
                } else {
                    //console.log(response);
                    sweetAlert(4, result.exception, 'index.php');
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            // Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})

// Función para eliminar un registro seleccionado
function confirmDelete(id) {
    swal({
        title: 'Advertencia',
        text: '¿Está seguro que desea borrar el paciente seleccionado?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
        .then(function (value) {
            if (value) {
                $.ajax({
                    url: apiPacientes + 'delete',
                    type: 'post',
                    data: {
                        id_paciente: id
                    },
                    datatype: 'json'
                })
                    .done(function (response) {
                        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                        if (isJSONString(response)) {
                            const result = JSON.parse(response);
                            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                            if (result.session) {
                                if (result.status) {
                                    $("#tabla-pacientes").DataTable().destroy();
                                    showTable();
                                    sweetAlert(1, result.message, null);
                                } else {
                                    sweetAlert(2, result.exception, null);
                                }
                            } else {
                                console.log(response);
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
        });
}
//Funcion para generar el reporte por fecha, agregando en url la fecha y validada
function reportePacientes() {
    var todayDate = moment().format('YYYY-MM-DD');
    let fechaini = $('#fecha_inicio').val();
    let fechafin = $('#fecha_fin').val();
    if (fechaini < todayDate && fechafin < todayDate && fechaini < fechafin) {
        window.open('../../core/reportes/reportepacientes.php?fechaini=' + fechaini + '&fechafin=' + fechafin);
    }
    else {
        alert("Error de fechas para reporte");
    }

}
