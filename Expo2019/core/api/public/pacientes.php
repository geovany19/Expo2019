<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/pacientes.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Pacientes;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/public/');
                } else {
                    header('location: ../../../views/public/perfil.php');
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $usuario->getUser()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario no valido';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($usuario->getUser()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombre($_POST['profile_nombres'])) {
                            if ($usuario->setApellido($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setUsuario($_POST['profile_usuario'])) {
                                        if ($usuario->setFecha($_POST['profile_fecha'])) {
                                            if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                if ($usuario->setFoto($_FILES['update_archivo'], $_POST['foto_usuario'])) {
                                                    $archivo = true;
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if (!$usuario->setFoto(null, $_POST['foto_usuario'])) {
                                                    $result['exception'] = $usuario->getImageError();
                                                }
                                                $archivo = false;
                                            } if ($usuario->updatePerfil()) {
                                                if ($usuario->updatePerfil()) {
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
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
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
                if ($result['dataset'] = $usuario->readPacientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['create_nombres'])) {
                    if ($usuario->setApellidos($_POST['create_apellidos'])) {
                        if ($usuario->setCorreo($_POST['create_correo'])) {
                            if ($usuario->setUsuario($_POST['create_alias'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($usuario->setClave($_POST['create_clave1'])) {
                                        if ($usuario->setFecha($_POST['create_fecha'])) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($usuario->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($usuario->createUsuario()) {
                                                        $result['status'] = 1;
                                                        if ($usuario->saveFile($_FILES['create_archivo'], $usuario->getRuta(), $usuario->getFoto())) {
                                                            $result['message'] = 'Usuario creado correctamente';
                                                        } else {
                                                            $result['message'] = 'Usuario no creado. No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $usuario->getImageError();
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
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuario->getUser()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                print_r($_POST);
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->getUser()) {
                        if ($usuario->setNombre($_POST['update_nombre'])) {
                            if ($usuario->setApellido($_POST['update_apellido'])) {
                                if ($usuario->setCorreo($_POST['update_correo'])) {
                                    if ($usuario->setUsuario($_POST['update_usuario'])) {
                                        if ($usuario->setFecha($_POST['update_fecha'])) {
                                            if ($usuario->setEstado(isset($_POST['update_estado']) ? 1 : 2)) {
                                                if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                    if ($usuario->setFoto($_FILES['update_archivo'], $_POST['foto_usuario'])) {
                                                        $archivo = true;
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                        $archivo = false;
                                                    }
                                                } else {
                                                    if (!$usuario->setFoto(null, $_POST['foto_usuario'])) {
                                                        $result['exception'] = $usuario->getImageError();
                                                    }
                                                    $archivo = false;
                                                }
                                                if ($usuario->updateUsuario()) {
                                                    $result['status'] = 1;
                                                    if ($archivo) {
                                                        if ($usuario->saveFile($_FILES['update_archivo'], $usuario->getRuta(), $usuario->getFoto())) {
                                                            $result['message'] = 'Usuario modificado correctamente.';
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
                                                $result['exception'] = 'Error con el estado';
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
                if ($_POST['id_usuario'] != $_SESSION['idUsuario']) {
                    if ($usuario->setId($_POST['id_usuario'])) {
                        if ($usuario->getUser()) {
                            if ($usuario->deleteUsuario()) {
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
                exit('Acción no disponible 1');
        }
    } else {
        switch ($_GET['action']) {
            case 'read':
                if ($usuario->readPacientes()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                    $result['exception'] = 'Hola';
                } else {
                    $result['message'] = 'No existen usuarios registrados';
                    $result['exception'] = 'Hola';
                }
                break;
                case 'register':
                $recaptcha = $_POST["g-recaptcha-response"];
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombres'])) {
                    if ($usuario->setApellido($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setUsuario($_POST['usuario'])) {
                                if ($usuario->setFecha($_POST['fecha'])) {
                                    if ($usuario->setEstatura($_POST['estatura'])) {
                                        if ($usuario->setPeso($_POST['peso'])) {
                                            if ($_POST['clave1'] != $_POST['usuario']) {
                                                if ($_POST['clave1'] == $_POST['clave2']) {
                                                    $resultado = $usuario->setClave($_POST['clave1']);
                                                    if ($resultado[0]) {
                                                        if (!$recaptcha) {
                                                            $result['exception'] = 'Comprobacion vacia';  
                                                        } else {
                                                            if ($usuario->createPaciente()) {
                                                                $result['status'] = 1;
                                                            } else {
                                                                $result['exception'] = 'Operación fallida';
                                                            }
                                                            } 
                                                    } else {
                                                        $result['exception'] = $resultado[1];
                                                    } 
                                                } else {
                                                    $result['exception'] = 'Claves diferentes';
                                                }
                                            } else {
                                                $result['exception'] = 'Clave incorrecta, igual al alias';
                                            }
                                        } else {
                                            $result['exception'] = 'Peso incorrecto'; 
                                        }
                                    } else {
                                        $result['exception'] = 'Estatura incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha inválida';
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
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setUsuario($_POST['usuario'])) {
                    if ($usuario->checkPaciente()) {
                        if ($usuario->setClave($_POST['clave'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['idPaciente'] = $usuario->getId();
                                $_SESSION['nombrePaciente'] = $usuario->getNombre();
                                $_SESSION['apellidoPaciente'] = $usuario->getApellido();
                                $_SESSION['ultimoAcceso'] = time();
                                $result['status'] = 1;
                                $result['message'] = 'Inicio de sesión correcto';
                            } else {
                                $result['exception'] = 'Contraseña inexistente';
                            }
                        } else {
                            $result['exception'] = 'Contraseña menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/public/');
                } else {
                    header('location: ../../../views/public/home.php');
                }
                break;
            default:
                exit('Acción no disponible 2');
        }
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
