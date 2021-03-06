<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/pacientes.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $paciente = new Pacientes;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'session' => 1);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        require_once('sesion.php');
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
                                                $result['exception'] = 'Foto no válida. No se pudo editar el perfil';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida. No se pudo editar el perfil';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de usuario incorrecto. No se pudo editar el perfil';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto. No se pudo editar el perfil';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos. No se pudo editar el perfil';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos Sexo. No se pudo editar el perfil';
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
                    $result['exception'] = 'No tenemos registrado ningun paciente';
                }
                break;
            case 'fillpaciente':
                if ($result['dataset'] = $paciente->fillPacientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos por mostrar';
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
                if ($paciente->setNombre($_POST['create_nombres'])) {
                    if ($paciente->setApellido($_POST['create_apellidos'])) {
                        if ($paciente->setCorreo($_POST['create_correo'])) {
                            if ($paciente->setUsuario($_POST['create_usuario'])) {
                                if ($paciente->setFecha($_POST['create_fecha'])) {
                                    if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                        if ($paciente->setFoto($_FILES['create_archivo'], null)) {
                                            if ($paciente->setPeso($_POST['create_peso'])) {
                                                if ($paciente->setEstatura($_POST['create_estatura'])) {
                                                    if ($paciente->setTelefono($_POST['create_telefono'])) {
                                                        if ($paciente->setIdestado(isset($_POST['create_estado']) ? 1 : 0)) {
                                                            if ($paciente->createPaciente()) {
                                                                $result['status'] = 1;
                                                                if ($paciente->saveFile($_FILES['create_archivo'], $paciente->getRuta(), $paciente->getFoto())) {
                                                                    $result['message'] = 'Paciente creado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Paciente no creado. No se guardó el archivo';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Operación fallida';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Estado incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Teléfono incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Estatura incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Peso incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = $paciente->getImageError();
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una imagen';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha no válida. No se pudo crear el paciente';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto. No se pudo crear el paciente';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto. No se pudo crear el paciente';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos. No se pudo crear el paciente';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos. No se pudo crear el paciente';
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
                if ($paciente->setId($_POST['id_paciente'])) {
                    if ($paciente->getPaciente()) {
                        if ($paciente->setNombre($_POST['update_nombres'])) {
                            if ($paciente->setApellido($_POST['update_apellidos'])) {
                                if ($paciente->setCorreo($_POST['update_correo'])) {
                                    if ($paciente->setUsuario($_POST['update_usuario'])) {
                                        if ($paciente->setFecha($_POST['update_fecha'])) {
                                            if ($paciente->setPeso($_POST['update_peso'])) {
                                                if ($paciente->setEstatura($_POST['update_estatura'])) {
                                                    if ($paciente->setTelefono($_POST['update_telefono'])) {
                                                        if ($paciente->setIdestado(isset($_POST['update_estado']) ? 1 : 0)) {
                                                            if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                                if ($paciente->setFoto($_FILES['update_archivo'], $_POST['foto_paciente'])) {
                                                                    $archivo = true;
                                                                } else {
                                                                    $result['exception'] = $producto->getImageError();
                                                                    $archivo = false;
                                                                }
                                                            } else {
                                                                if (!$paciente->setFoto(null, $_POST['foto_paciente'])) {
                                                                    $result['exception'] = $paciente->getImageError();
                                                                }
                                                                $archivo = false;
                                                            }
                                                            if ($paciente->updatePaciente()) {
                                                                $result['status'] = 1;
                                                                if ($archivo) {
                                                                    if ($paciente->saveFile($_FILES['update_archivo'], $paciente->getRuta(), $paciente->getFoto())) {
                                                                        $result['message'] = 'Paciente modificado correctamente';
                                                                    } else {
                                                                        $result['message'] = 'Paciente modificado. No se guardó el archivo';
                                                                    }
                                                                } else {
                                                                    $result['message'] = 'Paciente modificado. No se subió ningún archivo';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Operación fallida. No se pudo actualizar el paciente';
                                                            }
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Estatura no válida';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Teléfono incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Peso no válido. No se pudo actualizar el paciente';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida. No se pudo actualizar el paciente';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de usuario incorrecto. No se pudo actualizar el paciente';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto. No se pudo actualizar el paciente';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos. No se pudo actualizar el paciente';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos. No se pudo actualizar el paciente';
                        }
                    } else {
                        $result['exception'] = 'Paciente inexistente';
                    }
                } else {
                    $result['exception'] = 'Paciente incorrecto';
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
                if ($paciente->readPacientes()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['message'] = 'No tenemos registrado ningun paciente';
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
                                                $result['exception'] = 'Seleccione una imagen. No se pudo registrar';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida. No se pudo registrar';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres. No se pudo registrar';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes. No se pudo registrar';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto. No se pudo registrar';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto. No se pudo registrar';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos. No se pudo registrar';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos. No se pudo registrar';
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
