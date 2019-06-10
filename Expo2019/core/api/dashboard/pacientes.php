<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/pacientes.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $paciente = new Pacientes;
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
                if ($paciente->setId($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $paciente->getPaciente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Paciente inexistente';
                    }
                } else {
                    $result['exception'] = 'Paciente no valido';
                }
                break;
            case 'editProfile':
                if ($paciente->setId($_SESSION['idUsuario'])) {
                    if ($paciente->getPaciente()) {
                        $_POST = $paciente->validateForm($_POST);
                        if ($paciente->setNombre($_POST['profile_nombres'])) {
                            if ($paciente->setApellido($_POST['profile_apellidos'])) {
                                if ($paciente->setCorreo($_POST['profile_correo'])) {
                                    if ($paciente->setUsuario($_POST['profile_alias'])) {
                                        if ($paciente->setFecha($_POST['profile_fecha'])) {
                                            if ($paciente->updateUsuario()) {
                                                if ($paciente->updateUsuario()) {
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
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($paciente->setId($_SESSION['idUsuario'])) {
                    $_POST = $paciente->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($paciente->setClave($_POST['clave_actual_1'])) {
                            if ($paciente->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($paciente->setClave($_POST['clave_nueva_1'])) {
                                        if ($paciente->changePassword()) {
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
                if ($result['dataset'] = $paciente->readPacientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $paciente->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $paciente->searchPacientes($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $paciente->validateForm($_POST);
                if ($paciente->setNombres($_POST['create_nombres'])) {
                    if ($paciente->setApellidos($_POST['create_apellidos'])) {
                        if ($paciente->setCorreo($_POST['create_correo'])) {
                            if ($paciente->setUsuario($_POST['create_alias'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($paciente->setClave($_POST['create_clave1'])) {
                                        if ($paciente->setFecha($_POST['create_fecha'])) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($paciente->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($paciente->createUsuario()) {
                                                        $result['status'] = 1;
                                                        if ($paciente->saveFile($_FILES['create_archivo'], $paciente->getRuta(), $paciente->getFoto())) {
                                                            $result['message'] = 'Usuario creado correctamente';
                                                        } else {
                                                            $result['message'] = 'Usuario no creado. No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $paciente->getImageError();
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
                    $result['exception'] = 'Nombres incorrectos 1';
                }
                break;
            case 'get':
                if ($paciente->setId($_POST['id_paciente'])) {
                    if ($result['dataset'] = $paciente->getPaciente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Paciente inexistente';
                    }
                } else {
                    $result['exception'] = 'Paciente incorrecto';
                }
                break;
            case 'update':
                $_POST = $paciente->validateForm($_POST);
                if ($paciente->setId($_POST['id_usuario'])) {
                    if ($paciente->getPaciente()) {
                        if ($paciente->setNombres($_POST['update_nombres'])) {
                            if ($paciente->setApellidos($_POST['update_apellidos'])) {
                                if ($paciente->setCorreo($_POST['update_correo'])) {
                                    if ($paciente->setUsuario($_POST['update_alias'])) {
                                        if ($paciente->setFecha($_POST['update_fecha'])) {
                                            if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                if ($paciente->setFoto($_FILES['update_archivo'], $_POST['imagen_usuario'])) {
                                                    $archivo = true;
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if (!$paciente->setFoto(null, $_POST['imagen_producto'])) {
                                                    $result['exception'] = $paciente->getImageError();
                                                }
                                                $archivo = false;
                                            }
                                            if ($paciente->updateUsuario()) {
                                                $result['status'] = 1;
                                                if ($archivo) {
                                                    if ($paciente->saveFile($_FILES['update_archivo'], $paciente->getRuta(), $paciente->getFoto())) {
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
                                        $result['exception'] = 'Nombre de usuario incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_paciente'] != $_SESSION['idUsuario']) {
                    if ($paciente->setId($_POST['id_paciente'])) {
                        if ($paciente->getPaciente()) {
                            if ($paciente->deletePaciente()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Paciente inexistente';
                        }
                    } else {
                        $result['exception'] = 'Paciente incorrecto';
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
                if ($paciente->readUsuarios()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['message'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $paciente->validateForm($_POST);
                if ($paciente->setNombre($_POST['nombres'])) {
                    if ($paciente->setApellido($_POST['apellidos'])) {
                        if ($paciente->setCorreo($_POST['correo'])) {
                            if ($paciente->setUsuario($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($paciente->setClave($_POST['clave1'])) {
                                        if ($paciente->setFecha($_POST['fecha'])) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($paciente->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($paciente->createUsuario()) {
                                                        $result['status'] = 1;
                                                        if ($paciente->saveFile($_FILES['create_archivo'], $paciente->getRuta(), $paciente->getFoto())) {
                                                            $result['message'] = 'Usuario registrado correctamente';
                                                        } else {
                                                            $result['message'] = 'Usuario registrado. No se creó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $paciente->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen.';
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
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'login':
                $_POST = $paciente->validateForm($_POST);
                if ($paciente->setAlias($_POST['alias'])) {
                    if ($paciente->checkAlias()) {
                        if ($paciente->setClave($_POST['clave'])) {
                            if ($paciente->checkPassword()) {
                                $_SESSION['idUsuario'] = $paciente->getId();
                                $_SESSION['aliasUsuario'] = $paciente->getAlias();
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
