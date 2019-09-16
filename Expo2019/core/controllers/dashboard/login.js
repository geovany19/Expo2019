$(document).ready(function () {
    checkUsuarios();
})

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../core/api/dashboard/usuarios.php?action=';

// Función para verificar si existen usuarios en el sitio 
//okey es esta función
function checkUsuarios() {
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                // Se comprueba que no hay usuarios registrados para redireccionar al registro del primer usuario
                if (!dataset.status) {
                    sweetAlert(3, dataset.message, 'registrarse.php');
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

var attempts = 0;
// Función para validar el usuario al momento de iniciar sesión
$('#form-sesion').submit(function () {
    event.preventDefault();
    $.ajax({
        url: api + 'login',
        type: 'post',
        data: $('#form-sesion').serialize(),
        datatype: 'json'
    })
    .done(function (response) {
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status == 1) {
                sweetAlert(1, 'Autenticación correcta', 'pagina.php');
            } else if (dataset.status == 4) {
                sweetAlert(3, 'Cuenta bloqueada', null);

            } else if (dataset.status == 5) {
                sweetAlert(3, dataset.exception, 'recuperar.php');

            } else if (dataset.status == 6) {
                sweetAlert(3, dataset.exception, 'sesion.php');

            } else if (dataset.status == 7) {
                sweetAlert(3, dataset.exception, 'verificacion.php');

            } else {
                attempts++
                if (attempts == 3) {
                    attempts = 0
                    $.ajax({
                        url: apiSesion + 'block',
                        type: 'post',
                        data: $('#form-sesion').serialize(),
                        datatype: 'json'
                    }).done(response => {
                        if (isJSONString(response)) {
                            const dataset = JSON.parse(response);
                            if (dataset.status == 1) {
                                sweetAlert(3, 'Ha superado el máximo de intentos de inicio de sesión permitidos. Cuenta bloqueada por 24 horas', null);
                            } else {
                                sweetAlert(2, 'lol', null);
                            }

                        } else {
                            console.log(response)
                        }
                    })
                }
                sweetAlert(2, dataset.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
