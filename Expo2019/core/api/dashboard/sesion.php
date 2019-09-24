<?php
//sino, calculamos el tiempo transcurrido
$tiempo_transcurrido = time() - $_SESSION['ultimoAcceso'];

//comparamos el tiempo transcurrido  
if ($tiempo_transcurrido >= 300) {
    //si pasaron 5 segundos o más  
    session_unset(); // destruyo la sesión 
    $result['session'] = 0; //envío al usuario a la pag. de autenticación  
    $result['exception'] = 'La sesión ha caducado debido a que ha excedido el tiempo de inactividad';
    header('../../views/dashboard/index.php');
    exit(json_encode($result));
} else {
    $_SESSION['ultimoAcceso'] = time();
}
?>