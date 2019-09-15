<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/usuarios.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../libraries/PHPMailer/src/Exception.php';
require '../../../libraries/PHPMailer/src/PHPMailer.php';
require '../../../libraries/PHPMailer/src/SMTP.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuario;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'session' => 1);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
            case 'logout':
                $_SESSION['idUsuario'] = $usuario->getId();
                if ($usuario->setOffline() && session_unset()) {
                    header('location: ../../../views/dashboard/');
                } else {
                    header('location: ../../../views/dashboard/pagina.php');
                }
                break;
            case 'setOffline':
                if ($usuario->setOffline()) {
                    $result['status'] = 1;
                    $result['message'] = 'Seteo offline correcto';
                    session_unset();
                    header('location: ../../../views/dashboard/');
                } else {
                    $result['exception'] = 'No fue posible setear offline';
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
                        if ($usuario->setNombre($_POST['profile_nombre'])) {
                            if ($usuario->setApellido($_POST['profile_apellido'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setUsuario($_POST['profile_usuario'])) {
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
                                                $_SESSION['aliasUsuario'] = $usuario->getUsuario();
                                                if ($archivo) {
                                                    if ($usuario->saveFile($_FILES['update_archivo'], $usuario->getRuta(), $usuario->getFoto())) {
                                                        $result['message'] = 'Perfil modificado correctamente';
                                                    } else {
                                                        $result['message'] = 'Perfil modificado. No se guardó el archivo';
                                                    }
                                                } else {
                                                    $result['message'] = 'Perfil modificado. No se subió ningún archivo';
                                                }
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de perfil incorrecto';
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
                                        if ($_POST['clave_actual_1'] != $_POST['clave_nueva_1']) {
                                            if ($usuario->changePassword()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña cambiada correctamente';
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'La nueva contraseña no puede ser igual a la actual';
                                        }
                                    } else {
                                        $result['exception'] = 'Contraseña nueva menor a 8 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Contraseña nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Contraseña actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Contraseña actual menor a 8 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Contraseñas actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $usuario->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No se encuentran Usuarios registrados. Registre uno ahora';
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
                if ($usuario->setNombre($_POST['create_nombre'])) {
                    if ($usuario->setApellido($_POST['create_apellido'])) {
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
                print_r($_POST);
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->getUser()) {
                        if ($usuario->setNombre($_POST['update_nombres'])) {
                            if ($usuario->setApellido($_POST['update_apellidos'])) {
                                if ($usuario->setCorreo($_POST['update_correo'])) {
                                    if ($usuario->setUsuario($_POST['update_usuario'])) {
                                        if ($usuario->setFecha($_POST['update_fecha'])) {
                                            if ($usuario->setEstado(isset($_POST['update_estado']) ? 1 : 0)) {
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
                                                            $result['message'] = 'Perfil modificado correctamente';
                                                        } else {
                                                            $result['message'] = 'Perfil modificado. No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['message'] = 'Perfil modificado. No se subió ningún archivo';
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
                if ($_POST['g-recaptcha-response']) {
                    if ($usuario->setNombre($_POST['nombres'])) {
                        if ($usuario->setApellido($_POST['apellidos'])) {
                            if ($usuario->setCorreo($_POST['correo'])) {
                                if ($usuario->setUsuario($_POST['usuario'])) {
                                    if ($_POST['clave1'] == $_POST['clave2']) {
                                        if ($usuario->setClave($_POST['clave1'])) {
                                            if ($usuario->setFecha($_POST['fecha'])) {
                                                if ($usuario->setEstado($_POST['create_estado']) ? 1 : 2) {
                                                    if ($_POST['usuario'] != $_POST['clave1']) {
                                                        if ($usuario->createUsuario()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Registro realizado correctamente';
                                                        } else {
                                                            $result['exception'] = 'Operación fallida';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'El nombre de usuario no puede ser igual a la contraseña.';
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
                } else {
                    $result['exception'] = 'Desbes comprobar que eres humano';
                }
                break;
            case 'verificarCuenta':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setEmail($_POST['email-name'])) {
                    if ($usuario->getEmailUser()) {
                        $token = md5(uniqid(rand(), true));
                        if ($usuario->setToken($token)) {
                            if ($usuario->updateToken()) {
                                if ($emailusuario = $usuario->getCorreo()) {
                                    $result['status'] = 1;
                                    $mail = new PHPMailer(true);
                                    $mail->charSet = "UTF-8";
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'soportetecnicosismed@gmail.com';                     // SMTP username
                                        $mail->Password   = 'Sismed12345';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('soportetecnicosismed@gmail.com', 'Soporte Técnico de SISMED');
                                        $mail->addAddress($emailusuario);     // Add a recipient

                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Verifica tu cuenta';
                                        $mail->Body    = 'Tu cuenta ha sido creada, solo falta un paso más, verifica tu cuenta ingresando
                                                el siguiente código.';

                                        $mail->send();
                                        echo 'Message has been sent';
                                        $result['status'] = 1;
                                        $result['message'] = 'Se ha enviado el correo de recuperación de contraseña';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                } else {
                                    $result['exception'] = 'Error al obtener el correo';
                                }
                            } else {
                                $result['exception'] = 'Error al asignar el token';
                            }
                        } else {
                            $result['exception'] = 'Error al generar el token';
                        }
                    } else {
                        $result['exception'] = 'Correo no existe';
                    }
                } else {
                    $result['exception'] = 'Correo invalido';
                }
                break;
            case 'enviarCorreo':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setEmail($_POST['email-name'])) {
                    if ($usuario->getEmailUser()) {
                        $token = md5(uniqid(rand(), true));
                        if ($usuario->setToken($token)) {
                            if ($usuario->updateToken()) {
                                if ($emailusuario = $usuario->getCorreo()) {
                                    $result['status'] = 1;
                                    $mail = new PHPMailer(true);
                                    $mail->charSet = "UTF-8";
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = ' oportetecnicosismed@gmail.com';                     // SMTP username
                                        $mail->Password   = 'Sismed12345';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('soportetecnicosismed@gmail.com', 'Soporte Técnico de SISMED');
                                        $mail->addAddress($emailusuario);     // Add a recipient

                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Restablecimiento de contraseña';
                                        $mail->Body    = 'Hemos recibido una solicitud de restablecimiento de la contraseña de tu cuenta.
                                                Para restablecer tu contraseña haz click <a href="http://localhost/Expo2019/Expo2019/views/dashboard/claves.php?token=' . $token . '">en este enlace</<a>.
                                                Si no has realizado ninguna solicitud, ignora este correo.';

                                        $mail->send();
                                        echo 'Message has been sent';
                                        $result['status'] = 1;
                                        $result['message'] = 'Se ha enviado el correo de recuperación de contraseña';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                } else {
                                    $result['exception'] = 'Error al obtener el correo';
                                }
                            } else {
                                $result['exception'] = 'Error al asignar el token';
                            }
                        } else {
                            $result['exception'] = 'Error al generar el token';
                        }
                    } else {
                        $result['exception'] = 'Correo no existe';
                    }
                } else {
                    $result['exception'] = 'Correo invalido';
                }
                break;
            case 'recoverPassword':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setToken($_POST['token'])) {
                    if ($usuario->getUserByToken()) {
                        if ($_POST['new_pwd'] == $_POST['pwd_confirmed']) {
                            $password = $usuario->setClave($_POST['new_pwd']);
                            if ($password[0]) {
                                if ($usuario->changePasswordByToken()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = $password[1];
                            }
                        } else {
                            $result['exception'] = 'Claves diferentes';
                        }
                    } else {
                        $result['exception'] = 'Error al obtener los datos del usuario';
                    }
                } else {
                    $result['exception'] = 'Error al setear el token';
                }

                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setUsuario($_POST['usuario'])) {
                    if ($usuario->checkUser()) {
                        if ($usuario->setClave($_POST['clave'])) {
                            if ($usuario->checkPassword()) {
                                //if ($usuario->setOnline()) {
                                $_SESSION['idUsuario'] = $usuario->getId();
                                $_SESSION['aliasUsuario'] = $usuario->getUsuario();
                                $_SESSION['nombreUsuario'] = $usuario->getNombre();
                                $_SESSION['ultimoAcceso'] = time();
                                $result['status'] = 1;
                                $result['message'] = 'Inicio de sesión correcto';
                                $usuario->setOnline();
                                /*} else {
                                    $result['exception'] = 'No se pudo setear el estado de la sesión';
                                }*/
                            } else {
                                $result['exception'] = 'Contraseña inexistente';
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
