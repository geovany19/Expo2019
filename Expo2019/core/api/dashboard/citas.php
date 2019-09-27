<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/citas.php');

if (isset($_GET['action'])) {
    ini_set('date.timezone', 'America/El_Salvador');
    session_start();
    $citas = new Citas;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $citas->readCitas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay citas registradas';
                }
                break;
            case 'citasCanceladas':
                if ($result['dataset'] = $citas->showCitasCanceladas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos por mostrar.';
                }
                break;
            case 'citasRealizadas':
                if ($result['dataset'] = $citas->showCitasRealizadas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos por mostrar.';
                }
                break;
            case 'citasEspecialidad':
                if ($result['dataset'] = $citas->showCitasEspecialidad()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos por mostrar.';
                }
                break;
            case 'citasEspecialidadParam':
                if ($citas->setEspecialidad($_POST['select_especialidad'])) {
                    if ($result['dataset'] = $citas->showCitasEspecialidadParam()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos por mostrar';
                    }
                } else {
                    $result['exception'] = 'Especialidad incorrecta';
                }
                break;
            case 'citasEstadoDoctor':
                if ($citas->setIddoctor($_POST['select_doctores'])) {
                    if ($result['dataset'] = $citas->showCitasEstadoDoctor()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos por mostrar';
                    }
                } else {
                    $result['exception'] = 'Doctor incorrecta';
                }
                break;
            case 'create':
                $_POST = $citas->validateForm($_POST);
                if ($citas->setIddoctor($_POST['create_doctor'])) {
                    if ($citas->setIdpaciente($_POST['create_paciente'])) {
                        if ($citas->setFecha($_POST['create_fecha'])) {
                            if ($_POST['create_fecha'] >= date('Y-m-d')) {
                                if ($citas->setHora($_POST['create_hora'])) {
                                    if ($_POST['create_hora'] = date('G:i') && $_POST['create_fecha'] >= date('Y-m-d')) {
                                        if ($citas->createCita()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Cita creada correctamente';
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'No se puede crear una cita en la hora establecida';
                                    }
                                } else {
                                    $result['exception'] = 'La hora ingresada no es válida';
                                }
                            } else {
                                $result['exception'] = 'No se puede agendar una cita en la fecha establecida';
                            }
                        } else {
                            $result['exception'] = 'La fecha ingresada no es válida';
                        }
                    } else {
                        $result['exception'] = 'El paciente ingresado es erroneo';
                    }
                } else {
                    $result['exception'] = 'El doctor ingresado es erroneo';
                }
                break;
            case 'get':
                if ($citas->setIdcita($_POST['id_cita'])) {
                    if ($result['dataset'] = $citas->getCita()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Cita inexistente';
                    }
                } else {
                    $result['exception'] = 'Cita incorrecta';
                }
                break;
            case 'update':
                $_POST = $citas->validateForm($_POST);
                if ($citas->setIdcita($_POST['id_cita'])) {
                    if ($citas->getCita()) {
                        if ($citas->setIddoctor($_POST['update_doctor'])){
                        if ($citas->setIdpaciente($_POST['update_paciente'])) {
                            if ($citas->setFecha($_POST['update_fecha'])) {
                                if ($citas->setHora($_POST['update_hora'])) {
                                    if ($citas->setIdestado($_POST['update_estado'])) {
                                        if ($citas->updateCita()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Cita modificada correctamente';
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'La hora ingresada no es válida';
                                }
                            } else {
                                $result['exception'] = 'La fecha ingresada no es válida';
                            }
                        } else {
                            $result['exceptio'] = 'Paciente erroneo';
                        }
                    }else{
                        $result['exception'] = 'Doctor erroneo';
                    }
                } else {
                        $result['exception'] = 'Cita incorrecta';
                    }
                } else {
                    $result['exception'] = 'Cita inexistente';
                }
                break;
            case 'delete':
                if ($citas->setIdcita($_POST['id_cita'])) {
                    if ($citas->getCita()) {
                        if ($citas->deleteCita()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cita eliminada correcta';
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Cita inexistente';
                    }
                } else {
                    $result['exception'] = 'Cita inexistente';
                }
                break;
            case 'reschedule':
                $_POST = $citas->validateForm($_POST);
                if ($citas->setIdcita($_POST['id_cita'])) {
                    if ($citas->getCita()) {
                        if ($citas->setFecha($_POST['update_fecha'])) {
                            if ($citas->setHora($_POST['update_hora'])) {
                                if ($citas->rescheduleCita()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Cita reprogramada correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida en la reprogramación de cita';
                                }
                            } else {
                                $result['exception'] = 'Hora incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Fecha incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Cita incorrecta';
                    }
                } else {
                    $result['exception'] = 'Cita inexistente';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}
