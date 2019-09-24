const api = '../../core/api/dashboard/usuarios.php?action=';

$('#form-autenticacion').submit(function () {
    event.preventDefault();
        $.ajax({
                url: api+'autenticacion',
                type:'post',
                data: $('#form-autenticacion').serialize(),
                datatype: 'json'
    })
    .done(function (response){
        //VERIFICAMOS QUE LA RESPUESTA DE LA API SEA CADENA JSON
        if(isJSONString(response)) {
            const dataset = JSON.parse(response);
            //comprobamos que sea respuesta correcta y con satisfaccion
            if(dataset.status){
                sweetAlert(1,'Autenticación Correcta','pagina.php');
                
            }else{
                sweetAlert(2,dataset.exception,null);  
            }
         }else{
             console.log(response);
         }
    })
    .fail(function (jqXHR) {
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
