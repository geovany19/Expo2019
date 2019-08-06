<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/disponibilidad.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $disponibilidad = new Disponibilidad;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $disponibilidad->readDisponibilidad()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $disponibilidad->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $disponibilidad->searchUsuarios($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
                /*case 'create':
                $_POST = $disponibilidad->validateForm($_POST);
                if ($disponibilidad->setNombres($_POST['create_nombres'])) {
                    if ($disponibilidad->setApellidos($_POST['create_apellidos'])) {
                        if ($disponibilidad->setCorreo($_POST['create_correo'])) {
                            if ($disponibilidad->setUsuario($_POST['create_alias'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($disponibilidad->setClave($_POST['create_clave1'])) {
                                        if ($disponibilidad->setFecha($_POST['create_fecha'])) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($disponibilidad->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($disponibilidad->createUsuario()) {
                                                        $result['status'] = 1;
                                                        if ($disponibilidad->saveFile($_FILES['create_archivo'], $disponibilidad->getRuta(), $disponibilidad->getFoto())) {
                                                            $result['message'] = 'Usuario creado correctamente';
                                                        } else {
                                                            $result['message'] = 'Usuario no creado. No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $disponibilidad->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos9';
                }
                break;*/
            case 'get':
                if ($disponibilidad->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $disponibilidad->getUser()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $disponibilidad->validateForm($_POST);
                if ($disponibilidad->setId($_POST['id_usuario'])) {
                    if ($disponibilidad->getUser()) {
                        if ($disponibilidad->setNombre($_POST['update_nombre'])) {
                            if ($disponibilidad->setApellido($_POST['update_apellido'])) {
                                if ($disponibilidad->setCorreo($_POST['update_correo'])) {
                                    if ($disponibilidad->setUsuario($_POST['update_usuario'])) {
                                        if ($disponibilidad->setFecha($_POST['update_fecha'])) {
                                            if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                if ($disponibilidad->setFoto($_FILES['update_archivo'], $_POST['foto_usuario'])) {
                                                    $archivo = true;
                                                } else {
                                                    $result['exception'] = $disponibilidad->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if (!$disponibilidad->setFoto(null, $_POST['foto_usuario'])) {
                                                    $result['exception'] = $disponibilidad->getImageError();
                                                }
                                                $archivo = false;
                                            }
                                            if ($disponibilidad->updateUsuario()) {
                                                $result['status'] = 1;
                                                if ($archivo) {
                                                    if ($disponibilidad->saveFile($_FILES['update_archivo'], $disponibilidad->getRuta(), $disponibilidad->getFoto())) {
                                                        $result['message'] = 'Usuario modificado correctamente';
                                                    } else {
                                                        $result['message'] = 'Usuario modificado. No se guardó el archivo';
                                                    }
                                                } else {
                                                    $result['message'] = 'Usuario modificado. No se subió ningún archivo';
                                                }
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de doctor incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos10';
                        }
                    } else {
                        $result['exception'] = 'Doctor inexistente';
                    }
                } else {
                    $result['exception'] = 'Doctor incorrecto';
                }
                break;
            case 'delete':
                if ($disponibilidad->setId($_POST['id_disponibilidad'])) {
                    if ($disponibilidad->getDisponibilidad()) {
                        if ($disponibilidad->deleteDisponibilidad()) {
                            $result['status'] = 1;
                            $result['message'] = 'Disponibilidad eliminada correctamente';
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Disponibilidad inexistente';
                    }
                } else {
                    $result['exception'] = 'Disponibilidad incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else {
        switch ($_GET['action']) {
            case 'read':
                if ($disponibilidad->readDisponibilidad()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                    $result['exception'] = 'Hola';
                } else {
                    $result['message'] = 'No existen usuarios registrados';
                    $result['exception'] = 'Hola';
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
