<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/private/cita.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $eventos = new Eventos;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    switch($_GET['action']) {
        case 'readCitas':
            if($eventos->setid_doctor($_SESSION['idUsuario'])) {
                if ($result['dataset'] = $eventos->readEventos()) {
                    $result['status'] = 1;
                } else{
                    $result['exception'] = 'no hay citas';
                }  
            } else{
                $result['exception'] = 'usuario incorrecto';
            }
            break;
    }
    print(json_encode($result)); 
}