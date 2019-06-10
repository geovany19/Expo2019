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
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/dashboard/');
                } else {
                    header('location: ../../../views/dashboard/pagina.php');
                }
                break;
            case 'readProfile':
                if ($disponibilidad->setId($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $disponibilidad->getUser()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario no valido';
                }
                break;
            case 'editProfile':
                if ($disponibilidad->setId($_SESSION['idUsuario'])) {
                    if ($disponibilidad->getUser()) {
                        $_POST = $disponibilidad->validateForm($_POST);
                        if ($disponibilidad->setNombre($_POST['profile_nombres'])) {
                            if ($disponibilidad->setApellido($_POST['profile_apellidos'])) {
                                if ($disponibilidad->setCorreo($_POST['profile_correo'])) {
                                    if ($disponibilidad->setUsuario($_POST['profile_alias'])) {
                                        if ($disponibilidad->setFecha($_POST['profile_fecha'])) {
                                            if ($disponibilidad->updateUsuario()) {
                                                if ($disponibilidad->updateUsuario()) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Foto no válida';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de usuario incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos11';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($disponibilidad->setId($_SESSION['idUsuario'])) {
                    $_POST = $disponibilidad->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($disponibilidad->setClave($_POST['clave_actual_1'])) {
                            if ($disponibilidad->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($disponibilidad->setClave($_POST['clave_nueva_1'])) {
                                        if ($disponibilidad->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
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
                if ($_POST['id_usuario'] != $_SESSION['idUsuario']) {
                    if ($disponibilidad->setId($_POST['id_usuario'])) {
                        if ($disponibilidad->getUser()) {
                            if ($disponibilidad->deleteUsuario()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
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
            case 'login':
                $_POST = $disponibilidad->validateForm($_POST);
                if ($disponibilidad->setAlias($_POST['alias'])) {
                    if ($disponibilidad->checkAlias()) {
                        if ($disponibilidad->setClave($_POST['clave'])) {
                            if ($disponibilidad->checkPassword()) {
                                $_SESSION['idUsuario'] = $disponibilidad->getId();
                                $_SESSION['aliasUsuario'] = $disponibilidad->getAlias();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
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