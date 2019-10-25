<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/citas.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../libraries/PHPMailer/src/Exception.php';
require '../../../libraries/PHPMailer/src/PHPMailer.php';
require '../../../libraries/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    ini_set('date.timezone', 'America/El_Salvador');
    session_start();
    $cita = new Cita;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    switch ($_GET['action']) {
        case 'create':
            $_POST = $cita->validateForm($_POST);
            if ($cita->setIddoctor($_POST['idDoctor'])) {
                if ($cita->setIdpaciente($_POST['idPaciente'])) {
                    if ($cita->setFecha($_POST['inputDate'])) {
                        if ($cita->setHora($_POST['inputTime'])) {
                            if ($cita->setIdestado(2)) {
                                if ($_POST['inputDate'] > date('Y-m-d')) {
                                    if ($cita->createCita()) {
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Error al crear cita';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha inválida para la cita.';
                                }
                            } else {
                                $result['exception'] = 'Error en el estado';
                            }
                        } else {
                            $result['exception'] = 'Error en la hora';
                        }
                    } else {
                        $result['exception'] = 'Error en la fecha';
                    }
                } else {
                    $result['exception'] = 'Error en el paciente';
                }
            } else {
                $result['exception'] = 'Error en el doctor';
            }
            break;
        case 'read':
            if ($result['dataset'] = $cita->readCitas()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay citas registrados';
            }
            break;
        case 'getByPaciente':
            if ($cita->setIdpaciente($_SESSION['idPaciente'])) {
                if ($result['dataset'] = $cita->getCitaByPaciente()) {
                    $result['status'] = 1;
                    $result['id_paciente'] = $_SESSION['idPaciente'];
                } else {
                    $result['exception'] = 'No hay citas registrados';
                }
            } else {
                $result['exception'] = 'Paciente incorrecto';
            }

            break;
        case 'cancelarCita':
            if ($cita->setIdestado(3)) {
                if ($cita->setIdcita($_POST['id_cita'])) {
                    if ($cita->getFechaCita() >= date('Y-m-d')) {
                        if ($cita->updateEstado()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['status'] = 0;
                        $result['exception'] = 'No es posible cancelar la cita, ha excedido el tiempo para hacerlo';
                    }
                }
            } else {
                $result['exception'] = 'Cita incorrecta';
            }
            break;
        default:
            exit('Acción no disponible');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
