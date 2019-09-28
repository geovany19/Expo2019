<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/estadoCita.php');

if (isset($_GET['action'])) {
    session_start();
    $estados = new Estado;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $estados->readEstados()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay citas registradas';
                }
                break;
            case 'fill':
                if ($result['dataset'] = $estados->fillEstados()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay citas registradas';
                }
                break;
            case 'create':
                $_POST = $estados->validateForm($_POST);
                if ($estados->setEstado($_POST['create_estado'])) {
                    if ($estados->createEstado()) {
                        $result['status'] = 1;
                        $result['message'] = 'Estado creado correctamente';
                    } else {
                        $result['exception'] = 'Algo salió mal';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecto';
                }
                break;
            case 'get':
                if ($estados->setIdEstado($_POST['id_estado'])) {
                    if ($result['dataset'] = $estados->getEstadoCita()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Estado inexistente';
                    }
                } else {
                    $result['exception'] = 'Estado incorrecta';
                }
                break;
            case 'update':
                $_POST = $estados->validateForm($_POST);
                if ($estados->setIdEstado($_POST['id_estado'])) {
                    if ($estados->getEstadoCita()) {
                        if ($estados->setEstado($_POST['update_estado'])) {
                            $result['status'] = 1;
                            $result['exception'] = 'Estado modificado correctamente';
                        } else {
                            $result['exception'] = 'Algo salió mal. No se modificó el estado';
                        }
                    } else {
                        $result['exception'] = '';
                    }
                }
        }
    }
}
