<?php
require_once('../../../core/helpers/database.php');
require_once('../../../core/helpers/validator.php');
require_once('../../../core/models/private/usuarios.php');
require_once('../../../core/models/public/citas.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../../../libraries/PHPMailer/src/Exception.php');
require_once('../../../libraries/PHPMailer/src/PHPMailer.php');
require_once('../../../libraries/PHPMailer/src/SMTP.php');

$mail = new PHPMailer(true);
//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $cita = new Citas;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
   //dentro del if va todo lo que se puede hacer mientras se inicia sesion 
    if (isset($_SESSION['idDoctor'])) {
        switch ($_GET['action']) {
            case 'set':
                if($_SESSION['idPaciente'] = $_GET['id']){
                    header('location: ../../../views/private/pacientes.php');
                }
                break;
            case 'readPaciente':
                if($usuario->setId($_SESSION['idPaciente'])){
                    if($result['dataset'] = $usuario->readPaciente()){
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Paciente inexistente';
                    }
                } else {
                    $result['exception'] = 'Paciente incorrecto';
                }
                break;
            case 'logout':
                    $usuario->setOffline();
                        if (session_unset()) {
                            $result['status'] = 1;
                            header('location: ../../../views/private/');                   
                } else {
                    header('location: ../../../views/private/agenda.php');
                }
                break;
                
            case 'obtenerCita':
                $_POST = $cita->validateForm($_POST);
                if($cita->setFecha($_POST['fecha'])){
                    if($cita->setIddoctor($_POST['doctor'])){
                        if($result['dataset'] = $cita->obtenerCita()){
                            $result['status'] = 1;
                        }else{
                            $result['exception'] = 'Obtener cita error';
                        }
                    }else{
                        $result['exception'] = 'Doctor invalido';
                    }
                }else{
                    $result['exception'] = 'Fecha invalida';
                }
                break;

            case 'readProfile':
                if ($usuario->setId($_SESSION['idDoctor'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
            break;

            case 'readCitas':
                if ($usuario->setId($_SESSION['idDoctor'])) {
                 if ($result['dataset'] = $usuario->getCita()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay citas registrados';

                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto 3';
                }
                break;

                case 'readCita':
                if ($usuario->setId($_SESSION['idDoctor'])) {
                 if ($result['dataset'] = $usuario->getCitas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay citas registrados';

                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto 3';
                }
                break;

                case 'readCitaspendientes':
                if ($usuario->setId($_SESSION['idDoctor'])) {
                 if ($result['dataset'] = $usuario->getCitaspendientes()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay citas registrados';

                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto 3';
                }
                break;

                case 'cancelCita':
                    if ($usuario->setId($_POST['id_cita'])) {
                            if ($usuario->cancelCita()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                    } else {
                        $result['exception'] = 'cita incorrecto';
                    }
                break;

                case 'CitaAceptada':
                    if ($usuario->setId($_POST['id_cita'])) {
                            if ($usuario->aceptarCita()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                    } else {
                        $result['exception'] = 'cita incorrecto';
                    }
                break;
                
                case 'editProfile':
                if ($usuario->setId($_SESSION['idDoctor'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['profile_nombres'])) {
                            if ($usuario->setApellidos($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setAlias($_POST['profile_alias'])) {
                                        if ($usuario->updateUsuario()) {
                                            $_SESSION['aliasDoctor'] = $_POST['profile_alias'];
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
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
                            $result['exception'] = 'Nombres incorrectos 2';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;

              /*  case 'password':
                if ($usuario->setId($_SESSION['idDoctor'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if($_POST['clave_nueva_1'] != $_SESSION['aliasUsuario']){
                                    if($_POST['clave_actual_1'] != $_POST['clave_nueva_1']){
                                         if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                             if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                                if ($usuario->changePassword()) {
                                                     $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                } else {
                                    $result['exception'] = 'Clave nueva igual a la actual';
                                } else {
                                    $result['exception'] = 'Clave nueva igual al alias usuario';
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
                break;*/

                case 'password':
                    if ($usuario->setId($_SESSION['idDoctor'])) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                            if ($usuario->setClave($_POST['clave_actual_1'])) {
                                if ($usuario->checkPassword()) {
                                    if($_POST['clave_nueva_1'] != $_SESSION['aliasDoctor']){
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

                //crear cita 
                case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setPadecimientos($_POST['padecimientos'])) {
                    if ($usuario->setId($_SESSION['idDoctor'])) {
                        if ($usuario->setId_paciente($_POST['idPaciente'])) {
                                if ($usuario->setReceta($_POST['receta'])) {

                                            if ($usuario->setId_cita($_POST['idCita'])) {
                                                if ($usuario->insertConsulta() && $usuario->updateEstadocita()) {
                                                    $result['status'] = 1;                                                
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }  
                                            } else {
                                                $result['exception'] = 'Categoría incorrecta 1';
                                            }                     
                             } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                     $result['exception'] = 'Nombre incorrecto';
                    }
                } else {
                    $result['exception'] = 'incorrecto';
                }
                break;

                //AUTENTICACION 

            }
        }
        else{
        switch ($_GET['action']) {     
            case 'register':
                $recaptcha = $_POST["g-recaptcha-response"];
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setAlias($_POST['usuario'])) {
                                if ($usuario->setFecha($_POST['fecha'])) {
                                    if ($_POST['clave1'] != $_POST['usuario']) {
                                        if ($_POST['clave1'] == $_POST['clave2']) {
                                            $resultado = $usuario->setClave($_POST['clave1']);
                                            if ($resultado[0]) {
                                                if (!$recaptcha) {
                                                    $result['exception'] = 'Comprobacion vacia';  
                                                } else {
                                                    if ($usuario->createDoctores()) {
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
                    if($usuario->setAlias($_POST['name'])){
                        $us = $usuario->blockAccount($_POST['name']);
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
               /* case 'login':
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setAlias($_POST['name'])) {
                        switch($usuario->checkAlias()){
                            case 0:
                                if($usuario->checkTipo()) {
                                    $result['exception'] = 'El tipo de usuario es diferente';
                                } else{
                                        $result['exception'] = 'Usuario inexistente';
                                }
                                break;
                            case 1:
                              //   if ($usuario->setid($_POST['idDoctor'])) {
                                    if ($usuario->setClave($_POST['clave'])) {
                                        switch($usuario->checkPassword()){
                                            case 0:
                                                $result['exception'] = 'Clave inexistente';
                                                break;
                                            case 1:
                                                $result['exception'] = 'Actualiza tu contraseña';
                                                $result['status'] = 5;
                                                break;
                                            case 2:
                                                $_SESSION['idDoctor'] = $usuario->getId();
                                                $_SESSION['aliasDoctor'] = $usuario->getAlias();
                                                $_SESSION['nombresDoctor'] = $usuario->getNombres();
                                                $_SESSION['apellidosDoctor'] = $usuario->getApellidos();
                                                $_SESSION['ultimoAccesoDoctor'] = time();
                                                $result['status'] = 1;
                                                $usuario->setOnline();
                                                break;
                                            case 3: 
                                                 $result['exception'] = 'El usuario ya posee una sesión iniciada previamente';
                                                break;
                                        }
                                        } else {
                                            $result['exception'] = 'Contraseña menor a 6 caracteres';
                                        }
                                break;
                            case 2:
                                $result['status'] = 4;
                                break;
                        } 
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }
                break;*/
                case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setAlias($_POST['name'])) {
                    switch($usuario->checkAlias()){
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
                                        $token_autenticacion = mt_rand(100000, 999999);
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
                                            }
                                            break;
                                        case 3:
                                            $result['exception'] = 'El usuario ya posee una sesión iniciada';
                                            break;
                                        case 4:
                                        $token_autenticacion = mt_rand(100000, 999999);
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
                                                        $mail->Port       = 25;
                                                        //Recipients
                                                        $mail->setFrom('sismedtecnico@gmail.com', 'SISMED');
                                                        $mail->addAddress($correo);
                                                        // Content
                                                        $mail->isHTML(true);                                  // Set email format to HTML
                                                        $mail->Subject = 'Código de inicio de sesión';
                                                        $mail->Body    = 'Tu código de activación es: '.$token_autenticacion;
                                                        $mail->send();
                                                        $result['status'] = 2;
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
                                            }
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
                                    $_SESSION['idDoctor'] = $usuario->getId();
                                    $_SESSION['aliasDoctor'] = $usuario->getAlias();
                                    $_SESSION['nombresDoctor'] = $usuario->getNombres();
                                    $_SESSION['apellidosDoctor'] = $usuario->getApellidos();
                                    $_SESSION['ultimoAccesoDoctor'] = time();
                                    $result['status'] = 1;
                                    $usuario->setOnline();
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
                case 'correitousu':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setCorreo($_POST['correo'])){
                    if($usuario->checkCorreo()){
                        $token = uniqid();
                        if($usuario->setToken($token)){
                            if($usuario->tokensito()){
                              if($correousuario = $usuario->getCorreo()){
                                $result['status'] = 1; 
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = 2;                                       // Enable verbose debug output
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
                                        $mail->Subject = 'Recuperacion de clave';
                                       // $mail->Body    = 'Puede hacer click';
                                        $mail->Body    = '<a href="http://localhost/Expo2019/Expo2019/views/private/claves.php?token='.$token.'">aqui</<a>';
                                       // $mail->AddEmbeddedImage('../../resources/img/dashboard/img2.jpg', 'logo_sismed', 'img2.jpg');
                                        $mail->send();
                                        echo 'Message has been sent';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
                case 'nuevaPassword':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setToken($_POST['token'])){
                    if($usuario->getDatosTokensito()){
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
                exit('Acción no disponible');
        }
    }
    print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
