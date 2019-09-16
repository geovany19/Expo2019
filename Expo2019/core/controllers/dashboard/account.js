// Constante para establecer la ruta y parámetros de comunicación con la api
const api = '../../core/api/dashboard/usuarios.php?action=';

$('#form-registro').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'register',
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

// Función para mostrar formulario de perfil de usuario
function modalProfile()
{
    $.ajax({
        url: api + 'readProfile',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#profile_nombre').val(result.dataset.nombre_usuario);
                $('#foto').attr('src','../../resources/img/dashboard/usuarios/'+result.dataset.foto_usuario);
                $('#profile_apellido').val(result.dataset.apellido_usuario);
                $('#profile_correo').val(result.dataset.correo_usuario);
                $('#profile_usuario').val(result.dataset.usuario_usuario);
                $('#profile_fecha').val(result.dataset.fecha_nacimiento);
                $('#foto_usuario').val(result.dataset.foto_usuario);
                $('#modal-profile').modal('show');
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

// Función para editar el perfil del usuario que ha iniciado sesión
$('#form-profile').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'editProfile',
        type: 'post',
        data: new FormData($('#form-profile')[0]),
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
                $('#modal-profile').modal('hide');
                sweetAlert(1, result.message, 'pagina.php');
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

// Función para cambiar la contraseña del usuario que ha iniciado sesión
$('#form-password').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'password',
        type: 'post',
        data: $('#form-password').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modal-password').modal('hide');
                sweetAlert(1, result.message, 'perfil.php');
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
