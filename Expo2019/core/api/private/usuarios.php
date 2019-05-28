<?php
require_once('../../../core/helpers/database.php');
require_once('../../../core/helpers/validator.php');
require_once('../../../core/models/usuarios.php');


//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    //dentro del if va todo lo que se puede hacer mientras se inicia sesion 
    if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'private') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/private/');
                } else {
                    header('location: ../../../views/private/agenda.php');
                }
                break;
            }
        }
        else{
        switch ($_GET['action']) {          
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setAlias($_POST['name'])) {
                    if ($usuario->checkAlias()) {
                        if ($usuario->setClave($_POST['clave'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['idUsuario'] = $usuario->getId();
                                $_SESSION['aliasUsuario'] = $usuario->getAlias();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Alias inexistente';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    }
    print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
