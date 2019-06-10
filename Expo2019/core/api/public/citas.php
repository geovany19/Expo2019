<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/citas.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $cita = new Citas;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    switch ($_GET['action']) {
        case 'read':
            if ($result['dataset'] = $cita->readCitas()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay citas registrados';
            }
            break;
        case 'cancelarCita':
            if ($cita->setIdestado(3)) {

                if ($cita->setIdcita($_POST['id_cita'])) {
                    if ($cita->updateEstado()) {
                        $result['status'] = 1;
                        $result['exception'] = 'Operación fallida';
                    } else {
                        $result['exception'] = 'Operación fallida';
                    }
                } else {
                    $result['exception'] = 'Cita incorrecta';
                }
            } else {
                $result['exception'] = 'Estado incorrecto';
            }
            break;
        default:
            exit('Acción no disponible');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
