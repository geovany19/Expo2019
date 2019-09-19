//Constante para establecer la ruta y parámetros de comunicación con la API
//const apiAccount = '../../core/api/dashboard/usuarios.php?&action=';
const apiAccount = '../../core/api/private/usuarios.php?site=private&action=';

//Función para cerrar la sesión del usuario
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            location.href = apiAccount + 'logout';
        } else {
            swal({
                title: 'Enhorabuena',
                text: 'Continúe con la sesión...',
                icon: 'info',
                button: 'Aceptar',
                closeOnClickOutside: false,
                closeOnEsc: false
            });
        }
    });
}

$('#form-registro').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'register',
        type: 'post',
        data: $('#form-registro').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if (dataset.status) {
                sweetAlert(1, 'Usuario registrado correctamente', 'index.php');
            } else {
                sweetAlert(2, dataset.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Errors: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})


//Función para mostrar formulario de perfil de usuario
function modalProfile()
{
    $.ajax({
        url: apiAccount + 'readProfile',
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
                $('#profile_nombres').val(result.dataset.nombre_doctor);
                $('#profile_apellidos').val(result.dataset.apellido_doctor);
                $('#profile_correo').val(result.dataset.correo_doctor);
                $('#profile_alias').val(result.dataset.usuario_doctor);
                
                $('#modal-profile').modal('show');
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

//Función para editar el perfil del usuario que ha iniciado sesión
$('#form-profile').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'editProfile',
        type: 'post',
        data: $('#form-profile').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modal-profile').modal('hide');
                sweetAlert(1, 'Perfil modificado correctamente', 'agenda.php');
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
})

//Función para cambiar la contraseña del usuario que ha iniciado sesión
$('#form-password').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'password',
        type: 'post',
        data: $('#form-password').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modal-password').modal('hide');
                sweetAlert(1, 'Contraseña cambiada correctamente', 'agenda.php');
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
})

