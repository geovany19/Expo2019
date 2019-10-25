<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/citas.php');}

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
    $cita = new Citas;
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
                                if ($cita->createCita()) {
                                    $correo = $cita->getCorreo();
                                    $fecha = $cita->getFecha();
                                    $hora = $cita->getHora();
                                    //$mail = new PHPMailer(true);
                                    $mail->charSet = "UTF-8";
                                    try {
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'sismedtecnico@gmail.com';                             // SMTP username
                                                        $mail->Password   = 'Soportesismed123';                             // SMTP password
                                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                                                        $mail->Port       = 587;
                                                        //Recipients
                                                        $mail->setFrom('sismedtecnico@gmail.com', 'SISMED');
                                                        $mail->addAddress($correo);
                                                        // Content
                                                        $mail->CharSet = "UTF-8";
                                                        $mail->isHTML(true);                                  // Set email format to HTML
                                                        $mail->Subject = 'Confirmación de solicitud de cita';
                                                        $mail->Body    = 'Tu cita agendada para el día ' . $fecha . ' a las ' . $hora . ' ha sido procesada correctamente. Espera a recibir la confirmación del doctor encargado.';
                                                        $mail->send();
                                                        $result['status'] = 1;
                                                    } catch (Exception $e) {
                                                        $result['exception'] = "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
                                                    }
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Error al crear cita';
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
                    /*if ($cita->updateEstado()) {
                        $result['status'] = 1;
                        $result['exception'] = 'Operación fallida';
                    } else {
                        $result['exception'] = 'Operación fallida';
                    }*/
                    switch ($cita->checkCita()) {
                        case 0:
                            $result['status'] = 0;
                            $result['exception'] = 'No es posible cancelar la cita debido a que ha excedido el tiempo permitido par hacerlo';
                            break;
                        case 1:
                            if ($cita->updateEstado()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                            break;
                            /*
                        case 2:
                            $result['status'] = 2;
                            $result['exception'] = 'La cita ha sido aceptada anteriormente';
                            break;
                        case 3:
                            $result['status'] = 3;
                            $result['exception'] = 'La cita ha sido cancelada anteriormente y no puede 
                            ser modificada debido a que excedió el tiempo permitido';
                            break;
                        case 4:
                            $result['status'] = 4;
                            $result['exception'] = 'La cita ya fue realizada';
                            break;
                        case 5:
                            $result['status'] = 5;
                            $result['exception'] = 'Se ha agotado el horario permitido para cancelar la cita';
                            break;
                        case 6:
                            $result['status'] = 6;
                            $result['exception'] = 'Se ha agotado el periodo permitido para cancelar la cita';
                            break;
                        case 7:
                            //print_r($fecha_maxima = strtotime(date('d-m-Y',time()).'- 1 day'));
                            $result['status'] = 7;
                            $result['exception'] = 'Ya no es posible cancelar la cita';
                            break;
                    }*/
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
