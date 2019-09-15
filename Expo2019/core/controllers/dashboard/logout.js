// Constante para establecer la ruta y parámetros de comunicación con la apiCuenta
const apiCuenta = '../../core/api/dashboard/usuarios.php?action=';

// Función para cerrar la sesión del usuario
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Está seguro que desea cerrar sesión?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            //offline();
            location.href = apiCuenta + 'logout';
        }
    });
}