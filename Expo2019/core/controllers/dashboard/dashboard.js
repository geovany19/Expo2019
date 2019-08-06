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
                lineGraph('chartConsultasFecha', fechas, cantidad, 'Consultas', 'Consultas realizadas mensuales')
                
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
                

                result.dataset.forEach(function(row){
                    nombre.push(row.nombre_doctor+' '+row.apellido_doctor);
                    cantidad.push(row.CitasCanceladas);

                });

                pieGraph('chartCitasCanceladas', nombre, cantidad, 'Cantidad', 'Cantidad de citas canceladas')
                
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
                polarAreaGraph('chartCalificacionesDoctores', nombre, promedio, 'Promedio', 'Doctores con mejor desempeño')
                
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