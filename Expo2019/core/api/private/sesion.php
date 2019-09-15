<?php
$tiempo_transcurrido = time() - $_SESSION['ultimoAccesoDoctor'];
//comparamos el tiempo transcurrido  
if ($tiempo_transcurrido >= 300) {
    //si pasaron 5 minutos o más  
    session_destroy(); // destruyo la sesión  
    echo '
    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="../helpers/functions.js"></script>
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
            location.href = "../../views/private/index.php";
        }
    });
    </script>';
    //header('location: index.php');
} else {  
    $_SESSION['ultimoAccesoDoctor'] = time();
}
?>