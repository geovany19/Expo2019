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
    if (isset($_SESSION['idDoctor']) || true) {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/dashboard/');
                } else {
                    header('location: ../../../views/dashboard/pagina.php');
                }
                break;
            case 'readProfile':
                if ($doctor->setId($_SESSION['idDoctor'])) {
                    if ($result['dataset'] = $doctor->getDoctor()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Doctor inexistente';
                    }
                } else {
                    $result['exception'] = 'Doctor no valido';
                }
                break;
            case 'editProfile':
                if ($doctor->setId($_SESSION['idDoctor'])) {
                    if ($doctor->getDoctor()) {
                        $_POST = $doctor->validateForm($_POST);
                        if ($doctor->setNombre($_POST['profile_nombre'])) {
                            if ($doctor->setApellido($_POST['profile_apellido'])) {
                                if ($doctor->setCorreo($_POST['profile_correo'])) {
                                    if ($doctor->setUsuario($_POST['profile_alias'])) {
                                        if ($doctor->setFecha($_POST['profile_fecha'])) {
                                            if ($doctor->setFoto($_FILES['profile_archivo'])) {
                                                if ($doctor->updateDoctor()) {
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
                                        $result['exception'] = 'Nombre de doctor incorrecto';
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
                        $result['exception'] = 'Doctor no valido';
                    }
                } else {
                    $result['exception'] = 'Doctor incorrecto';
                }
                break;
            case 'password':
                if ($doctor->setId($_SESSION['idDoctor'])) {
                    $_POST = $doctor->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($doctor->setClave($_POST['clave_actual_1'])) {
                            if ($doctor->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($doctor->setClave($_POST['clave_nueva_1'])) {
                                        if ($doctor->changePassword()) {
                                            $result['status'] = 1;
                                            $result['message'] = ' Tu contraseña a cambiado correctamente';
                                        } else {
                                            $result['exception'] = 'La operacion no a podido ejecutarse';
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
                    $result['exception'] = 'Doctor no valido';
                }
                break;
            case 'read':
                if ($result['dataset'] = $doctor->readDoctores()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Doctores registrados';
                }
                break;
            case 'search':
                $_POST = $doctor->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $doctor->searchDoctores($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se encontraron coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $doctor->validateForm($_POST);
                if ($doctor->setNombres($_POST['create_nombre'])) {
                    if ($doctor->setApellidos($_POST['create_apellido'])) {
                        if ($doctor->setCorreo($_POST['create_correo'])) {
                            if ($doctor->setUsuario($_POST['create_alias'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($doctor->setClave($_POST['create_clave1'])) {
                                        if ($doctor->setFecha($_POST['create_fecha'])) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($doctor->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($doctor->createDoctor()) {
                                                        $result['status'] = 1;
                                                        if ($doctor->saveFile($_FILES['create_archivo'], $doctor->getRuta(), $doctor->getFoto())) {
                                                            $result['message'] = 'Doctor creado correctamente';
                                                        } else {
                                                            $result['message'] = 'Doctor no creado. No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $doctor->getImageError();
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
                    $result['exception'] = 'Nombres incorrectos';
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
            case 'update':
                $_POST = $doctor->validateForm($_POST);
                if ($doctor->setId($_POST['id_doctor'])) {
                    if ($doctor->getDoctor()) {
                        if ($doctor->setNombre($_POST['update_nombre'])) {
                            if ($doctor->setApellido($_POST['update_apellido'])) {
                                if ($doctor->setCorreo($_POST['update_correo'])) {
                                    if ($doctor->setUsuario($_POST['update_alias'])) {
                                        if ($doctor->setFecha($_POST['update_fecha'])) {
                                            if ($doctor->setIdespecialidad($_POST['update_especialidad'])) {
                                                if ($doctor->setIdestado(isset($_POST['update_estado']) ? 1 : 2)) {
                                                    if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                        if ($doctor->setFoto($_FILES['update_archivo'], $_POST['foto_doctor'])) {
                                                            $archivo = true;
                                                        } else {
                                                            $result['exception'] = $producto->getImageError();
                                                            $archivo = false;
                                                        }
                                                    } else {
                                                        if (!$doctor->setFoto(null, $_POST['foto_doctor'])) {
                                                            $result['exception'] = $doctor->getImageError();
                                                        }
                                                        $archivo = false;
                                                    }
                                                    if ($doctor->updateDoctor()) {
                                                        $result['status'] = 1;
                                                        if ($archivo) {
                                                            if ($doctor->saveFile($_FILES['update_archivo'], $doctor->getRuta(), $doctor->getFoto())) {
                                                                $result['message'] = 'Doctor modificado correctamente';
                                                            } else {
                                                                $result['message'] = 'Doctor modificado. No se guardó el archivo';
                                                            }
                                                        } else {
                                                            $result['message'] = 'Doctor modificado. No se subió ningún archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Error con el estado';
                                                }
                                            } else {
                                                $result['exception'] = 'Error con la especialidad';
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
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Doctor inexistente';
                    }
                } else {
                    $result['exception'] = 'Doctor incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_doctor'] != $_SESSION['idDoctor']) {
                    if ($doctor->setId($_POST['id_doctor'])) {
                        if ($doctor->getDoctor()) {
                            if ($doctor->deleteDoctor()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Doctor inexistente';
                        }
                    } else {
                        $result['exception'] = 'Doctor incorrecto';
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
                if ($doctor->readDoctores()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un doctor registrado';
                } else {
                    $result['message'] = 'No existen doctores registrados';
                }
                break;
            case 'register':
                $_POST = $doctor->validateForm($_POST);
                if ($doctor->setNombre($_POST['nombres'])) {
                    if ($doctor->setApellido($_POST['apellidos'])) {
                        if ($doctor->setCorreo($_POST['correo'])) {
                            if ($doctor->setUsuario($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($doctor->setClave($_POST['clave1'])) {
                                        if ($doctor->setFecha($_POST['fecha'])) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($doctor->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($doctor->createUsuario()) {
                                                        $result['status'] = 1;
                                                        if ($doctor->saveFile($_FILES['create_archivo'], $doctor->getRuta(), $doctor->getFoto())) {
                                                            $result['message'] = 'Doctor registrado correctamente';
                                                        } else {
                                                            $result['message'] = 'Doctor registrado. No se creó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $doctor->getImageError();
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
                $_POST = $doctor->validateForm($_POST);
                if ($doctor->setAlias($_POST['alias'])) {
                    if ($doctor->checkAlias()) {
                        if ($doctor->setClave($_POST['clave'])) {
                            if ($doctor->checkPassword()) {
                                $_SESSION['idDoctor'] = $doctor->getId();
                                $_SESSION['aliasDoctor'] = $doctor->getAlias();
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
