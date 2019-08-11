$(document).ready(function()
{
    chartConsultasFecha();
    chartConsultasHora();
    chartCitasCanceladas();
    chartCitasRealizadas();
    chartCitasEspecialidad();
    chartCalificacionesDoctores();
})

const apiConsultas = '../../core/api/dashboard/consultas.php?action=';
const apiCitas = '../../core/api/dashboard/citas.php?action=';
const apiDoctores = '../../core/api/dashboard/doctores.php?action=';
const apiEspecialidad = '../../core/api/dashboard/especialidades.php?action=';

//Función para crear gráficos en página de inicio
function chartConsultasFecha(){

    $.ajax({
        url: apiConsultas + 'consultasFecha',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let fechas = [];
                let cantidad = [];
                result.dataset.forEach(function(row){
                    fechas.push(row.NombreMes);
                    cantidad.push(row.CantidadCitas);

                });
                lineGraph('chartConsultasFecha', fechas, cantidad, 'Consultas', 'Consultas realizadas')
                
            }else{
                $('#chartProductosCat').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

//Función para crear gráficos en página de inicio
function chartConsultasHora(){

    $.ajax({
        url: apiConsultas + 'consultasHora',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let horas = [];
                let cantidad = [];
                result.dataset.forEach(function(row){
                    horas.push(row.Hora+':00');
                    cantidad.push(row.CantidadCitas);

                });
                lineGraph('chartConsultasHora', horas, cantidad, 'Consultas', 'Consultas realizadas por hora')
                
            }else{
                $('#chartConsultasHora').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartCitasCanceladas(){

    $.ajax({
        url: apiCitas + 'citasCanceladas',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let nombre = [];
                let cantidad = [];
                
                fillSelect(apiEspecialidad + 'read', 'select_especialidad', result.dataset.id_especialidad);
                fillSelect(apiDoctores + 'fill', 'select_doctores', result.dataset.id_doctor);
                result.dataset.forEach(function(row){
                    nombre.push(row.nombre_doctor+' '+row.apellido_doctor);
                    cantidad.push(row.CitasCanceladas);

                });
                doughnutGraph('chartCitasCanceladas', nombre, cantidad, 'Cantidad', 'Cantidad de citas canceladas')
                
            }else{
                $('#chartCitasCanceladas').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartCitasRealizadas(){

    $.ajax({
        url: apiCitas + 'citasRealizadas',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let nombre = [];
                let cantidad = [];
                result.dataset.forEach(function(row){
                    nombre.push(row.nombre_doctor+' '+row.apellido_doctor);
                    cantidad.push(row.CitasRealizadas);

                });
                barGraph('chartCitasRealizadas', nombre, cantidad, 'Consultas', 'Citas realizadas')
                
            }else{
                $('#chartCitasCanceladas').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartCalificacionesDoctores(){

    $.ajax({
        url: apiDoctores + 'calificacionesDoctores',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let nombre = [];
                let promedio = [];
                result.dataset.forEach(function(row){
                    nombre.push(row.nombre_doctor+' '+row.apellido_doctor);
                    promedio.push(row.Promedio);
                });
                polarAreaGraph('chartCalificacionesDoctores', nombre, promedio, 'Promedio', 'Promedio de calificaciones de doctores')
                
            }else{
                $('#chartCalificacionesDoctores').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartCitasRealizadas(){

    $.ajax({
        url: apiCitas + 'citasRealizadas',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);

            if(result.status){
                let nombre = [];
                let cantidad = [];
                result.dataset.forEach(function(row){
                    nombre.push(row.nombre_doctor+' '+row.apellido_doctor);
                    cantidad.push(row.CitasRealizadas);

                });
                barGraph('chartCitasRealizadas', nombre, cantidad, 'Consultas', 'Citas realizadas')
                
            }else{
                $('#chartCitasCanceladas').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

function chartCitasEspecialidad(){

    $.ajax({
        url: apiCitas + 'citasEspecialidad',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let especialidad = [];
                let citas = [];
                result.dataset.forEach(function(row){
                    especialidad.push(row.nombre_especialidad);
                    citas.push(row.CitasRealizadas);
                });
                horizontalGraph('chartCitasEspecialidad', especialidad, citas, 'Citas', 'Citas realizadas por especialidad')
                
            }else{
                $('#chartCitasEspecialidad').remove();
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
}

$('#grafico1').submit(function(){
    event.preventDefault()
    $.ajax({
        url: apiConsultas + 'consultasConFecha',
        type: 'post',
        data: $('#grafico1').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let fechas = [];
                let cantidad = [];
                result.dataset.forEach(function(row){
                    fechas.push(row.NombreMes);
                    cantidad.push(row.CantidadCitas);

                });
                $('#chartConsultas').attr('hidden',false);
                horizontalGraph('chartConsultasPorFecha', fechas, cantidad, 'Consultas', 'Consultas realizadas mensuales')
            }else{
                sweetAlert(2,result.exception,null);
                $('#chartConsultas').attr('hidden',true);
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
});

$('#grafico2').submit(function(){
    event.preventDefault()
    $.ajax({
        url: apiConsultas + 'consultasMensuales',
        type: 'post',
        data: $('#grafico2').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let fechas = [];
                let consultas = [];
                result.dataset.forEach(function(row){
                    fechas.push(row.fecha_cita);
                    consultas.push(row.Consultas);

                });
                $('#chartConsultas-2').attr('hidden',false);
                lineGraph('chartConsultasMensuales', fechas, consultas, 'Consultas', 'Consultas realizadas por mes')
            }else{
                sweetAlert(2,result.exception,null);
                $('#chartConsultas-2').attr('hidden',true);
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
});

$('#grafico3').submit(function(){
    event.preventDefault()
    $.ajax({
        url: apiConsultas + 'consultasMensualesDoc',
        type: 'post',
        data: $('#grafico3').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let nombre = [];
                let consultas = [];
                result.dataset.forEach(function(row){
                    nombre.push(row.nombre_doctor+' '+row.apellido_doctor);
                    consultas.push(row.Consultas);

                });
                $('#chartConsultas-3').attr('hidden',false);
                pieGraph('chartConsultasMensualesDoc', nombre, consultas, 'Consultas', 'Desempeño de consultas mensuales de cada doctor')
            }else{
                sweetAlert(2,result.exception,null);
                $('#chartConsultas-3').attr('hidden',true);
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
});

$('#grafico4').submit(function(){
    event.preventDefault()
    $.ajax({
        url: apiCitas + 'citasEspecialidadParam',
        type: 'post',
        data: $('#grafico4').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let fechas = [];
                let citas = [];
                result.dataset.forEach(function(row){
                    fechas.push(row.fecha_cita);
                    citas.push(row.Citas);
                });
                $('#chartCitasParam').attr('hidden',false);
                barGraph('chartCitasEspecialidadParam', fechas, citas, 'Citas', 'Citas por especialidad')
            }else{
                sweetAlert(2,result.exception,null);
                $('#chartCitasParam').attr('hidden',true);
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
});

$('#grafico5').submit(function(){
    event.preventDefault()
    $.ajax({
        url: apiCitas + 'citasEstadoDoctor',
        type: 'post',
        data: $('#grafico5').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                let estado = [];
                let citas = [];
                result.dataset.forEach(function(row){
                    estado.push(row.estado);
                    citas.push(row.Citas);
                });
                $('#chartDesempenoDoctor').attr('hidden',false);
                doughnutGraph('chartCitasDesempenoDoctor', estado, citas, 'Citas', 'Estadísticas de citas por doctor')
            }else{
                sweetAlert(2,result.exception,null);
                $('#chartDesempenoDoctor').attr('hidden',true);
            }
        }else{
            console.log(response);
        }

    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);

    });
});