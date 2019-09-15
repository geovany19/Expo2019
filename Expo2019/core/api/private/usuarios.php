<?php
require_once('../../../core/helpers/database.php');
require_once('../../../core/helpers/validator.php');
require_once('../../../core/models/private/usuarios.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('../../../libraries/PHPMailer/src/Exception.php');
require_once('../../../libraries/PHPMailer/src/PHPMailer.php');
require_once('../../../libraries/PHPMailer/src/SMTP.php');


//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
   //dentro del if va todo lo que se puede hacer mientras se inicia sesion 
    if (isset($_SESSION['idDoctor']) && $_GET['site'] == 'private') {
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
                if (session_destroy()) {
                    header('location: ../../../views/private/');
                } else {
                    header('location: ../../../views/private/agenda.php');
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
                    $result['exception'] = 'Usuario incorrecto 3';
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
                                            $_SESSION['aliasUsuario'] = $_POST['profile_alias'];
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
                                if($_POST['clave_nueva_1'] != $_SESSION['aliasUsuario']){
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
                                    if ($usuario->setPeso($_POST['Peso'])) {
                                        if ($usuario->setEstatura($_POST['Estatura'])) {
                                            if ($usuario->setPresion($_POST['presion'])) {
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
                                            $result['exception'] = 'Categoría incorrecta 2';
                                        }

                                    } else {
                                        $result['exception'] = 'Precio incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Descripción incorrecta';
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
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;

            }
        }
        else{
        switch ($_GET['action']) {          
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setAlias($_POST['name'])) {
                    if ($usuario->checkAlias()) {
                        if ($usuario->checkTipo()) { 
                            if ($usuario->setClave($_POST['clave'])) {
                                if ($usuario->checkPassword()) {
                                    $_SESSION['idDoctor'] = $usuario->getId();
                                    $_SESSION['aliasUsuario'] = $usuario->getAlias();
                                    $_SESSION['ultimoAcceso'] = time();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                        } else {
                            $result['exception'] = 'Su usuario ya existe en otra interfaz';
                        }
                    } else {
                        $result['exception'] = 'Alias inexistente';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
                }
                break;
                case 'correito':
                $_POST = $usuario->validateForm($_POST);
                if($usuario->setCorreo($_POST['correo'])){
                    if($usuario->checkCorreo()){
                        $token = uniqid();
                        if($usuario->setToken($token)){
                            if($usuario->tokensito()){
                              if($correousuario = $usuario->getCorreo()){
                                $result['status'] = 1; 
                                $mail = new PHPMailer(true);
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
                                        $mail->setFrom('soportetecnicosismed@gmail.com');
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
