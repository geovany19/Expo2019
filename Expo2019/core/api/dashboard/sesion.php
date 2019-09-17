<?php
//sino, calculamos el tiempo transcurrido
$tiempo_transcurrido = time() - $_SESSION['ultimoAcceso'];

//comparamos el tiempo transcurrido  
if ($tiempo_transcurrido >= 15) {
    //si pasaron 5 segundos o más  
    session_unset(); // destruyo la sesión 
    $result['session'] = 0; //envío al usuario a la pag. de autenticación  
    $result['exception'] = 'La sesión ha caducado debido a que ha excedido el tiempo de inactividad';
    exit(json_encode($result));
} else {
    $_SESSION['ultimoAcceso'] = time();
}
/*$tiempo_transcurrido = time() - $_SESSION['ultimoAcceso'];
//comparamos el tiempo transcurrido  
if ($tiempo_transcurrido >= 300) {
    //si pasaron 5 minutos o más
    session_unset(); // destruyo la sesión  
    echo '
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../core/helpers/functions.js"></script>
    <script>
    swal({
        title: "Advertencia",
        text: "La sesión ha caducado debido a que se ha excedido el tiempo de inactividad",
        icon: "warning",
        button: "Aceptar",
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            location.href = "../../views/dashboard/index.php";
        }
    });
    </script>';
    //header('location: index.php');
} else {  
    $_SESSION['ultimoAcceso'] = time();
}*/
