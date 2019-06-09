$(document).ready(function () {
    checkUsuarios();
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../core/api/dashboard/usuarios.php?action=';

// Función para verificar si existen usuarios en el sitio privado
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
                // Se comprueba si hay usuarios registrados para redireccionar al inicio de sesión
                if (dataset.status) {
                    //sweetAlert(3, dataset.message, 'index.php');
                    console.log('hola');
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

// Función para validar el usuario al momento de iniciar sesión
$('#form-register').submit(function () {
    event.preventDefault();
    $.ajax({
        url: api + 'register',
        type: 'post',
        data: $('#form-register').serialize(),
        datatype: 'json'
    })
        .done(function (response) {
            // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                // Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
                if (dataset.status) {
                    sweetAlert(1, dataset.message, 'index.php');
                } else {
                    sweetAlert(2, dataset.exception, null);
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
