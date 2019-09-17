$(document).ready(function()
{
    checkUsuarios();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/public/pacientes.php?action=';

var attempts = 0;

//Función para verificar si existen usuarios en el sitio privado
function checkUsuarios()
{
    $.ajax({
        url: apiSesion + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba que no hay usuarios registrados para redireccionar al registro del primer usuario
            if (dataset.status == 2) {
                sweetAlert(3, dataset.exception, 'registro.php');
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

//Función para validar el usuario al momento de iniciar sesión

$('#form-sesion').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiSesion + 'login',
        type: 'post',
        data: $('#form-sesion').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status == 1) {
                sweetAlert(1, 'Autenticación correcta', 'home.php');
            } else if(dataset.status == 2){
                sweetAlert(1, 'Logueo correcto','autenticar.php');

            } else if(dataset.status == 5){
                sweetAlert(3, dataset.exception,'recuperar.php');

            }else if(dataset.status == 4){
                sweetAlert(3, 'Cuenta bloqueada',null);

            } else {
                attempts++
                if(attempts==3){
                    attempts=0
                    $.ajax({
                        url: apiSesion + 'block',
                        type: 'post',
                        data: $('#form-sesion').serialize(),
                        datatype: 'json'
                    }).done(response=>{
                        if (isJSONString(response)) {
                        const dataset = JSON.parse(response);
                        if(dataset.status == 1){
                            sweetAlert(3, 'Cuenta bloqueada',null);
                        }else{
                            sweetAlert(2, 'lol',null);
                        }

                        }else{
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
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

