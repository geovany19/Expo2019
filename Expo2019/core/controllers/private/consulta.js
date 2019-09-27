//Constante para establecer la ruta y parámetros de comunicación con la API
const apiConsulta = '../../core/api/private/usuarios.php?&action=';

;((e)=>{
    let id = document.getElementById('idDoctor').value
    $.ajax({
        url: apiConsulta + 'obtenerCita',
        type: 'post',
        data: {
            fecha: moment().format('YYYY-MM-DD'),
            doctor: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const dataset = JSON.parse(response);
            //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
            if( dataset.status) {
                let citas = dataset.dataset
                let cita = citas.find(c=>{
                    if(moment(c.hora_cita, 'HH:mm:ss').format('HH') == moment().format('HH') && c.id_estado == 4)
                    return c
                    else
                    return null
                })

                if(cita){
                    console.log(cita, 'lol')
                    $('#paciente').val(cita.nombre_paciente)
                    $('#hora').val(cita.hora_cita)
                    $('#fecha').val(cita.fecha_cita)
                    $('#idPaciente').val(cita.id_paciente)
                    $('#idD').val(cita.id_doctor)
                    $('#idCi').val(cita.id_cita)
                    
                    $('#modal-c').modal('show')

                }
            }else{
            }
            
        } else {
            console.log(response, '');
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Errors: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    
})()