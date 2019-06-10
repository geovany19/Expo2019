$(document).ready(function() {
  showTableCitas();
});

const apiCitas = "../../core/api/public/citas.php?action=";

//Función para obtener y mostrar los registros disponibles
function showTableCitas() {
  $.ajax({
    url: apiCitas + "read",
    type: "post",
    data: null,
    datatype: "json"
  })
    .done(function(response) {
      //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
      if (isJSONString(response)) {
        const result = JSON.parse(response);
        //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
        if (result.status) {
          fillTableCitas(result.dataset);
        }
      } else {
        console.log(response);
      }
    })
    .fail(function(jqXHR) {
      //Se muestran en consola los posibles errores de la solicitud AJAX
      console.log("Error: " + jqXHR.status + " " + jqXHR.statusText);
    });
}

//Función para llenar tabla con los datos de los registros
function fillTableCitas(rows) {
  let content = "";
  //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
  rows.forEach(function(row) {
    $("#tbody-citas").html(content);
    if ($.fn.DataTable.isDataTable("#dataTableCitas")) {
      destroyDataTable("#dataTableCitas");
    }
    content += `
        <tr>
            <td>${row.nombre_doctor}</td>
            <td>${row.nombre_paciente}</td>
            <td>${row.fecha_cita}</td>
            <td>${row.hora_cita}</td>
            <td>${row.estado}</td>
            <td class="d-flex justify-content-center">${
              row.id_estado != 3
                ? '<div class="d-flex justify-content-center" style="align-items: center;"><button type="button" class="btn btn-danger ml-3" onclick="cancelarCita(' +
                  row.id_cita +
                  ')">Cancelar cita</button></div>'
                : ""
            }</td>
        </tr>
        `;
  });
  $("#tbody-citas").html(content);
  renderDataTable("#dataTableCitas");
}

function cancelarCita(id) {
  Swal.fire({
    title: "¿Estas seguro?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, cancelar cita",
    cancelButtonText: "Salir"
  }).then(result => {
    if (result.value) {
      $.ajax({
        url: apiCitas + "cancelarCita",
        type: "post",
        data: {
            id_cita:id
        },
        datatype: "json"
      })
        .done(function(response) {
          //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
          if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                showTableCitas();
            }
          } else {
            console.log(response);
          }
        })
        .fail(function(jqXHR) {
          //Se muestran en consola los posibles errores de la solicitud AJAX
          console.log("Error: " + jqXHR.status + " " + jqXHR.statusText);
        });
      Swal.fire("Cita cancelada", "", "success");
    }
  });
}
