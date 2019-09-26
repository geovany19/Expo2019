<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/usuarios.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../../../libraries/PHPMailer/src/Exception.php');
require_once('../../../libraries/PHPMailer/src/PHPMailer.php');
require_once('../../../libraries/PHPMailer/src/SMTP.php');
$mail = new PHPMailer(true);


//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuario;
    $result = array('status' => 0, 'message' => null, 'exception' => null, 'session' => 1);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        require_once('sesion.php');
        switch ($_GET['action']) {
            case 'logout':
                $usuario->setOffline();
                if (session_unset()) {
                    header('location: ../../../views/dashboard/');
                } else {
                    header('location: ../../../views/dashboard/pagina.php');
                }
                break;
                /*case 'setOffline':
                if ($usuario->setOffline()) {
                    $result['status'] = 1;
                    $result['message'] = 'Seteo offline correcto';
                    session_unset();
                    header('location: ../../../views/dashboard/');
                } else {
                    $result['exception'] = 'No fue posible setear offline';
                }
                break;*/
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
                                if ($_POST['clave_actual_1'] != $_POST['clave_nueva_1']) {
                                    if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                        $resultado = $usuario->setClave($_POST['clave_nueva_1']);
                                        if ($resultado[0]) {
                                            if ($usuario->changePassword()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Contraseña actualizada correctamente';
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = $resultado[1];
                                        }
                                    } else {
                                        $result['exception'] = 'Contraseñas diferentes no coinciden';
                                    }
                                } else {
                                    $result['exception'] = 'La nueva contraseña no puede ser igual a la actual';
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
                //caso utilizado para restablecer sesión en caso haya quedado activa
            case 'restoreSession':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setUsuario($_POST['usuario'])) {
                    switch ($usuario->checkUser()) {
                        case 0:
                            if ($usuario->checkTipo()) {
                                $result['exception'] = 'El usuario no tiene permitido ingresar a este sitio';
                            } else {
                                $result['exception'] = 'Usuario inexistente';
                            }
                            break;
                        case 1:
                            if ($usuario->setClave($_POST['clave'])) {
                                switch ($usuario->checkPassword()) {
                                    case 0:
                                        $result['exception'] = 'Clave inexistente';
                                        break;
                                    case 1:
                                        $result['exception'] = 'Debes actualizar tu contraseña debido a que 
                                        ha expirado su vigencia de 90 días';
                                        $result['status'] = 5;
                                        break;
                                    case 2:
                                        $_SESSION['idUsuario'] = $usuario->getId();
                                        $_SESSION['aliasUsuario'] = $usuario->getUsuario();
                                        $usuario->restoreSession();
                                        $result['status'] = 6;
                                        $result['mensaje'] = 'Inicio de sesión correcto';
                                        break;
                                    case 3:
                                        $usuario->restoreSession();
                                        $result['status'] = 1;
                                        $result['mensaje'] = 'Restablecimiento de sesión correcto. Te redigiremos al login';
                                        break;
                                    case 4:
                                        $result['exception'] = 'Debes activar tu cuenta antes de iniciar sesión por primera vez';
                                        $result['status'] = 7;
                                        break;
                                }
                            } else {
                                $result['exception'] = 'Contraseña menor a 8 caracteres';
                            }
                            break;
                        case 2:
                            $result['status'] = 4;
                            break;
                    }
                }
                break;
                /*
                                    if ($_POST['usuario'] != $_POST['clave1']) {
                                            if ($_POST['clave1'] == $_POST['clave2']) {
                                                $resultado = $usuario->setClave($_POST['clave1']);
                                                if ($resultado[0]) {
                                                    if ($usuario->createUsuario()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Registro realizado correctamente';
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $resultado[1];
                                                }
                                            } else {
                                                $result['exception'] = 'Las contraseñas no coinciden';
                                            }
                                        } else {
                                            $result['exception'] = 'La contraseña no puede ser igual al nombre de usuario';
                                        }
                                    */
            //Caso para crear que debés pasar
                                    case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['create_nombre'])) {
                    if ($usuario->setApellido($_POST['create_apellido'])) {
                        if ($usuario->setCorreo($_POST['create_correo'])) {
                            if ($usuario->setUsuario($_POST['create_usuario'])) {
                                if ($usuario->setFecha($_POST['create_fecha'])) {
                                    if ($usuario->setEstado(isset($_POST['create_estado']) ? 1 : 0)) {
                                        if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                            if ($usuario->setFoto($_FILES['create_archivo'], null)) {
                                                if ($_POST['create_usuario'] != $_POST['create_clave1']) {
                                                    if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                                        $resultado = $usuario->setClave($_POST['create_clave1']);
                                                        if ($resultado[0]) {
                                                            if ($usuario->createUsuario()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Usuario creado correctamente';
                                                            } else {
                                                                $result['exception'] = 'Operación fallida';
                                                            }
                                                        } else {
                                                            $result['exception'] = $resultado[1];
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Las contraseñas no coinciden';
                                                    }
                                                } else {
                                                    $result['exception'] = 'La contraseña no puede ser igual al nombre de usuario';
                                                }
                                            } else {
                                                $result['exception'] = $usuario->getImageError();
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una imagen';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha no válida';
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
                                $result['message'] = 'Usuario eliminado correctamente';
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
                    $result['exception'] = 'Existe al menos un usuario registrado';
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
                                    if ($usuario->setFecha($_POST['fecha'])) {
                                        if ($_POST['usuario'] != $_POST['clave1']) {
                                            if ($_POST['clave1'] == $_POST['clave2']) {
                                                $resultado = $usuario->setClave($_POST['clave1']);
                                                if ($resultado[0]) {
                                                    if ($usuario->createUsuario()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Registro realizado correctamente';
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $resultado[1];
                                                }
                                            } else {
                                                $result['exception'] = 'Las contraseñas no coinciden';
                                            }
                                        } else {
                                            $result['exception'] = 'La contraseña no puede ser igual al nombre de usuario';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha no válida. No se pudo registrar el usuario';
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
                    $result['exception'] = 'Debes comprobar que eres humano';
                }
                break;
            case 'block':
                if ($usuario->setUsuario($_POST['usuario'])) {
                    $us = $usuario->blockAccount($_POST['usuario']);
                    if ($us) {
                        $result['status'] = 1;
                    } else {
                        $result['status'] = 2;
                    }
                } else {
                    $result['status'] = 3;
                }
                break;
              
            case 'correo':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setCorreo($_POST['correousu'])) {
                    if ($usuario->checkCorreo()) {
                        $token = uniqid();
                        if ($usuario->setToken($token)) {
                            if ($usuario->tokensito()) {
                                if ($correousuario = $usuario->getCorreo()) {
                                    //$result['status'] = 1;
                                    $mail = new PHPMailer(true);
                                    $mail->charSet = "UTF-8";
                                    try {
                                        //Server settings
                                        // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'sismedtecnico@gmail.com';                     // SMTP username
                                        $mail->Password   = 'Soportesismed123';                               // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('sismedtecnico@gmail.com');
                                        $mail->addAddress($correousuario);     // Add a recipient

                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Restablecimiento de contraseña';
                                        // $mail->Body    = 'Puede hacer click';
                                        $mail->Body    = 'Hemos recibido una solicitud de tu cuenta para restablecer la contraseña. Para restablecer, haz click <a href="http://localhost/Expo2019/Expo2019/views/dashboard/claves.php?token=' . $token . '">aqui</<a>';
                                        // $mail->AddEmbeddedImage('../../resources/img/dashboard/img2.jpg', 'logo_sismed', 'img2.jpg');
                                        $mail->send();
                                        $result['status'] = 1;
                                    } catch (Exception $e) {
                                        $result['exception'] = 'No fue posible enviar el correo. Error :{' . $mail->ErrorInfo . '}';
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
            case 'nuevaPassword':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setToken($_POST['token'])) {
                    if ($usuario->getDatosTokensito()) {
                        if ($_POST['nueva_contrasena'] == $_POST['nueva_contrasena2']) {
                            $resultado = $usuario->setClave($_POST['nueva_contrasena']);
                            if ($resultado[0]) {
                                if ($usuario->changePassword()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = $resultado[1];
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
                    switch ($usuario->checkUser()) {
                        case 0:
                            if ($usuario->checkTipo()) {
                                $result['exception'] = 'El usuario no tiene permitido ingresar a este sitio';
                            } else {
                                $result['exception'] = 'Usuario inexistente';
                            }
                            break;
                        case 1:
                            if ($usuario->setClave($_POST['clave'])) {
                                switch ($usuario->checkPassword()) {
                                    case 0:
                                        $result['exception'] = 'Clave inexistente';
                                        break;
                                    case 1:
                                        $result['exception'] = 'Debes actualizar tu contraseña debido a que 
                                        ha expirado su vigencia de 90 días';
                                        $result['status'] = 5;
                                        break;
                                    case 2:
                                        //generamos un codigo ramdom de 6 digitos que sera nuestro acceso de verificacion
                                        $token_autenticacion = mt_rand(100000, 999999);
                                        if ($usuario->setToken($token_autenticacion)) {
                                            if ($usuario->setTokenAutenticacion()) {
                                                if ($usuario->getTokenAutenticacion()) {
                                                    $correo = $usuario->getCorreo();
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
                                                        $mail->Subject = 'Código de inicio de sesión';
                                                        $mail->Body    = 'Tu código de activación es: ' . $token_autenticacion;
                                                        $mail->send();
                                                        $result['status'] = 1;
                                                        $_SESSION['aliasUsuario'] = $usuario->getUsuario();
                                                    } catch (Exception $e) {
                                                        $result['exception'] = "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
                                                    }
                                                } else {
                                                    $result['exception'] = 'Error al obtener los datos de la cuenta';
                                                }
                                            } else {
                                                $result['exception'] = 'Error al asignar el token';
                                            }
                                        } else {
                                            $result['exception'] = 'Error al setear el token';
                                        }
                                        break;
                                    case 3:
                                        $result['exception'] = 'El usuario ya posee una sesión iniciada previamente.';
                                        // Si deseas restablecer la sesión, haz click en "Restablecer sesion" ubicado en este sitio
                                        break;
                                }
                            } else {
                                $result['exception'] = 'Contraseña menor a 8 caracteres';
                            }
                            break;
                        case 2:
                            $result['status'] = 4;
                            break;
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
                }
                break;
            case 'autenticacion':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setToken($_POST['codigo'])) {
                    if ($usuario->getTokenAutenticacion()) {
                        if ($usuario->deleteTokenAutenticacion()) {
                            if ($usuario->autenticarEstado()) {
                                $usuario->setOnline();
                                $_SESSION['idUsuario'] = $usuario->getId();
                                $_SESSION['aliasUsuario'] = $usuario->getUsuario();
                                $_SESSION['nombresUsuario'] = $usuario->getNombre();
                                $_SESSION['apellidosUsuario'] = $usuario->getApellido();
                                $_SESSION['ultimoAcceso'] = time();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'No pudimos actualizar su sesion';
                            }
                        } else {
                            $result['exception'] = 'Error al eliminar el token';
                        }
                    } else {
                        $result['exception'] = 'Código incorrecto';
                    }
                } else {
                    $result['exception'] = 'Error al setear el token';
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
