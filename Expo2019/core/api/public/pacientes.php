<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/pacientes.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../libraries/PHPMailer/src/Exception.php';
require '../../../libraries/PHPMailer/src/PHPMailer.php';
require '../../../libraries/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Pacientes;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idPaciente'])) {
        switch ($_GET['action']) {
            case 'logout':
                    $usuario->setOffline();
                    if (session_unset()) {        
                        header('location: ../../../views/public/');
                    } else {
                        header('location: ../../../views/public/perfil.php');
                    }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['idPaciente'])) {
                    if ($result['dataset'] = $usuario->getPaciente()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario no valido';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['idPaciente'])) {
                    if ($usuario->getPaciente()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombre($_POST['profile_nombres'])) {
                            if ($usuario->setApellido($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setUsuario($_POST['profile_usuario'])) {
                                         if ($usuario->updatePaciente()) {
                                                $result['status'] = 1;  
                                            }   else {
                                            $result['exception'] = 'Operación fallida';
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
                        $result['exception'] = 'Paciente inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            /**case 'editProfile':
                if ($usuario->setId($_SESSION['idPaciente'])) {
                    if ($usuario->getPaciente()) {
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
                        $result['exception'] = 'Paciente inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;**/
                case 'password':
                    if ($usuario->setId($_SESSION['idPaciente'])) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                            if ($usuario->setClave($_POST['clave_actual_1'])) {
                                if ($usuario->checkPassword()) {
                                    if($_POST['clave_nueva_1'] != $_SESSION['usuarioPaciente']){
                                    if($_POST['clave_actual_1'] != $_POST['clave_nueva_1']){
                                    if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                        $resultado = $usuario->setClave($_POST['clave_nueva_1']);
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
                                        $result['exception'] = 'Claves nuevas diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Clave nueva igual a la actual';
                                }
                                } else {
                                    $result['exception'] = 'Clave nueva igual al alias usuario';
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
                                            if ($usuario->setTelefono($_POST['telefono'])) {
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
                                                $result['exception'] = 'Teléfono incorrecto';
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
            case 'block':
                if($usuario->setUsuario($_POST['usuario'])){
                    $us = $usuario->blockAccount($_POST['usuario']);
                    if($us){
                        $result['status'] = 1;
                        $result['exception'] = $us;
                    }else{
                        $result['status'] = 2;
                    }
                }else{
                    $result['status'] = 3;
                }
                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setUsuario($_POST['usuario'])) {
                    switch($usuario->checkPaciente()) {
                        case 0:
                            if($usuario->checkTipo()) {
                                $result['exception'] = 'El tipo de usuario es diferente';
                            } else{
                                    $result['exception'] = 'Usuario inexistente';
                            }
                            break;
                        case 1:
                                if ($usuario->setClave($_POST['clave'])) {
                                    switch($usuario->checkPassword()){
                                        case 0:
                                            $result['exception'] = 'Clave inexistente';
                                            break;
                                        case 1:
                                            $result['exception'] = 'Debe actualizar su contraseña debido a que ha expirado su vigencia de 90 días';
                                            $result['status'] = 5;
                                            break;
                                        case 2:
                                        //$_SESSION['idPaciente'] = $usuario->getId();
                                        //$_SESSION['usuarioPaciente'] = $usuario->getUsuario();
                                        //$_SESSION['nombresPaciente'] = $usuario->getNombre();
                                        //$_SESSION['apellidosPaciente'] = $usuario->getApellido();
                                        //$_SESSION['ultimoAccesoPaciente'] = time();
                                        //$result['status'] = 1;
                                        /*$token_autenticacion = mt_rand(100000, 999999);
                                        if($usuario->setToken($token_autenticacion)) {
                                            if($usuario->setTokenAutenticacion()) {
                                                if($usuario->getTokenAutenticacion()) {
                                                    $correo = $usuario->getCorreo();
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
                                                        $mail->isHTML(true);                                  // Set email format to HTML
                                                        $mail->Subject = 'Código de inicio de sesión';
                                                        $mail->Body    = 'Tu código de activación es: '.$token_autenticacion;
                                                        $mail->send();
                                                        $result['status'] = 1;
                                                        $_SESSION['aliasPaciente'] = $usuario->getUsuario();
                                                        } catch (Exception $e) {
                                                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Error al obtener los datos de la cuenta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Error al asignar el token';
                                                }
                                            } else {
                                                $result['exception'] = 'Error al setear el token';
                                            }*/
                                                $result['status'] = 1;
                                                $_SESSION['aliasPaciente'] = $usuario->getUsuario();
                                            break;
                                        case 3:
                                            $result['exception'] = 'El usuario ya posee una sesión iniciada';
                                            break;
                                        case 4:
                                            $result['status'] = 2;
                                            $_SESSION['aliasPaciente'] = $usuario->getUsuario();   
                                        /*$token_autenticacion = mt_rand(100000, 999999);
                                        if($usuario->setToken($token_autenticacion)) {
                                            if($usuario->setTokenAutenticacion()) {
                                                if($usuario->getTokenAutenticacion()) {
                                                    $correo = $usuario->getCorreo();

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
                                                        $mail->isHTML(true);                                  // Set email format to HTML
                                                        $mail->Subject = 'Código de inicio de sesión';
                                                        $mail->Body    = 'Tu código de activación es: '.$token_autenticacion;
                                                        $mail->send();
                                                        $result['status'] = 2;
                                                        $_SESSION['aliasPaciente'] = $usuario->getUsuario();
                                                        } catch (Exception $e) {
                                                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Error al obtener los datos de la cuenta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Error al asignar el token';
                                                }
                                            } else {
                                                $result['exception'] = 'Error al setear el token';
                                            }*/
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
                    if($usuario->setToken($_POST['codigo'])) {
                        if($usuario->getTokenAutenticacion()) {
                            if($usuario->deleteTokenAutenticacion()) {
                                if ($usuario->autenticarEstado()) {
                                    $usuario->setOnline();
                                    $_SESSION['idPaciente'] = $usuario->getId();
                                    $_SESSION['usuarioPaciente'] = $usuario->getUsuario();
                                    $_SESSION['nombresPaciente'] = $usuario->getNombre();
                                    $_SESSION['apellidosPaciente'] = $usuario->getApellido();
                                    $_SESSION['ultimoAccesoPaciente'] = time();
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
            case 'correoRecuperar':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setCorreo($_POST['correo'])){
                    if($usuario->checkCorreo()){
                        $token = uniqid();
                        if($usuario->setToken($token)){
                            if($usuario->setTokenRecuperar()){
                              if($correopaciente = $usuario->getCorreo()){
                                
                                    try {
                                        //Server settings
                                      // Enable verbose debug output
                                        $mail->isSMTP();                                            // Set mailer to use SMTP
                                        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                        $mail->Username   = 'sismedtecnico@gmail.com';                             // SMTP username
                                        $mail->Password   = 'Soportesismed123';                                // SMTP password
                                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port       = 587;                                    // TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('sismedtecnico@gmail.com', 'SISMED');
                                        $mail->addAddress($correopaciente);     // Add a recipient
                                        
                                        // Content
                                        $mail->isHTML(true);                                  // Set email format to HTML
                                        $mail->Subject = 'Restablecimiento de contraseña';
                                       // $mail->Body    = 'Puede hacer click';
                                        $mail->Body    = 'Hemos recibido una solicitud de restablecimiento de la contraseña de tu cuenta.
                                        Para restablecer tu contraseña haz click <a href="http://localhost/Expo2019/Expo2019/views/public/recuperar2.php?token=' . $token . '">aquí</<a>.
                                        Si no has realizado ninguna solicitud, ignora este correo.';
                                        $mail->send();
                                        $result['status'] = 1; 
                                    } catch (Exception $e) {

                                    }
                              } else {
                                $result['exception'] = 'Error al obtener el correo';  
                              } 
                            } else {
                                $result['exception'] = 'Error al asignar el token';
                            }  
                        } else{
                            $result['exception'] = 'Error al generar el token';
                        }  
                    } else{
                        $result['exception'] = 'Correo no existe';
                    }   
                }  else {
                    $result['exception'] = 'Correo invalido';
                }     
            
                break;

            case 'recuperarContra':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setToken($_POST['token'])){
                    if($usuario->getTokenRecuperar()){
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
            default:
                exit('Acción no disponible 2');
        }
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
