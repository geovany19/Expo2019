<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/usuarios.php');

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuario;
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
                print_r($_POST);
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($usuario->getUser()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombre($_POST['profile_nombre'])) {
                            if ($usuario->setApellido($_POST['profile_apellido'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setUsuario($_POST['profile_alias'])) {
                                        if ($usuario->setFecha($_POST['profile_fecha'])) {
                                            if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                if ($usuario->setFoto($_FILES['update_archivo'], $_POST['foto_usuario'])) {
                                                    $archivo = true;
                                                } else {
                                                    $result['exception'] = $usuario->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if (!$usuario->setFoto(null, $_POST['foto_usuario'])) {
                                                    $result['exception'] = $usuario->getImageError();
                                                }
                                                $archivo = false;
                                            }
                                            if ($usuario->updatePerfil()) {
                                                $result['status'] = 1;
                                                if ($archivo) {
                                                    if ($usuario->saveFile($_FILES['update_archivo'], $usuario->getRuta(), $usuario->getFoto())) {
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
                            $result['exception'] = 'Nombres incorrectos frank';
                        }
                    } else {
                        $result['exception'] = 'usuario no valido';
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
                            $result['exception'] = 'Clave actual menor a 6 caracteres xd';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $usuario->readUsuarios()) {
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
                if ($usuario->setNombres($_POST['create_nombre'])) {
                    if ($usuario->setApellidos($_POST['create_apellido'])) {
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
                                        $result['exception'] = 'Clave menor a 6 caracteres lol. No se pudo crear el perfil';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes. No se pudo crear el perfil';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto. No se pudo crear el perfil';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto. No se pudo crear el perfil';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos. No se pudo crear el perfil';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos. No se pudo crear el perfil';
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
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->getUser()) {
                        if ($usuario->setNombre($_POST['update_nombres'])) {
                            if ($usuario->setApellido($_POST['update_apellidos'])) {
                                if ($usuario->setCorreo($_POST['update_correo'])) {
                                    if ($usuario->setUsuario($_POST['update_usuario'])) {
                                        if ($usuario->setFecha($_POST['update_fecha'])) {
                                            if ($usuario->setEstado(isset($_POST['update_estado']) ? 1 : 2)) {
                                                if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                    if ($usuario->setFoto($_FILES['update_archivo'], $_POST['foto_usuario'])) {
                                                        $archivo = true;
                                                    } else {
                                                        $result['exception'] = $usuario->getImageError();
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
                                                $result['exception'] = 'Error con el estado. No se pudo actualizar el usuario';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida. No se pudo actualizar el usuario';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de usuario incorrecto. No se pudo actualizar el usuario';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto. No se pudo actualizar el usuario';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos. No se pudo actualizar el usuario';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos. No se pudo actualizar el usuario';
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
                if ($usuario->readUsuarios()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['message'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombres'])) {
                    if ($usuario->setApellido($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setUsuario($_POST['usuario'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->setFecha($_POST['fecha'])) {
                                            if ($usuario->setEstado($_POST['create_estado']) ? 1 : 2) {
                                                if ($usuario->createUsuario()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Registro realizado correctamente';
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Estado incorrecto. No se pudo registrar el usuario';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida. No se pudo registrar el usuario';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres xd. No se pudo registrar el usuario';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes. No se pudo registrar el usuario';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto. No se pudo registrar el usuario';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto. No se pudo registrar el usuario';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos. No se pudo registrar el usuario';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos. No se pudo registrar el usuario';
                }
                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setUsuario($_POST['usuario'])) {
                    if ($usuario->checkUser()) {
                        if ($usuario->setClave($_POST['clave'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['idUsuario'] = $usuario->getId();
                                $_SESSION['aliasUsuario'] = $usuario->getUsuario();
                                $result['status'] = 1;
                                $result['message'] = 'Autenticación correcta';
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
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
