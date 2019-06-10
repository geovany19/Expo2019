<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/doctores.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $doctor = new Doctores;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    switch ($_GET['action']) {
        case 'read':
            if ($result['dataset'] = $doctor->readDoctores()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay Doctores registrados';
            }
            break;
        case 'get':
            if ($doctor->setId($_POST['id_doctor'])) {
                if ($result['dataset'] = $doctor->getDoctor()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Doctor inexistente';
                }
            } else {
                $result['exception'] = 'Doctor incorrecto';
            }
            break;
        default:
            exit('Acción no disponible');
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
