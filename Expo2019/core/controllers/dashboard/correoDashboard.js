//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAccount = '../../core/api/dashboard/usuarios.php?&action=';

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

 function correoRecuperar()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'correo',
        type: 'post',
        data: $('#form-correo').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status == 1) {
                sweetAlert(1, 'Correo enviado exitosamente. En caso de que no encuentres tu correo, revisa en la bandeja de spma o correo no deseado', null);
            } else {
                sweetAlert(2, result.exception, null);
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

$('#form-recuperar3').submit(function()
{   event.preventDefault();
    var token = getParameterByName('token');
   // console.log(token);
    var password1 = $('#nuevaclave1').val(), password2 = $('#nuevaclave2').val();
    $.ajax({
        url: apiAccount + 'nuevaPassword',
        type: 'post',
        data: {
            token: token,
            nueva_contrasena: password1,
            nueva_contrasena2: password2
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status == 1) {
                sweetAlert(1, 'Se ha restaurado la contraseña exitosamente', 'index.php');
            } else {
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