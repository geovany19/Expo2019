$(document).ready(function() {
		showTableCitas();
	});
	
	const apiCitas = "../../core/api/public/citas.php?action=";
	
	//Función para obtener y mostrar los registros disponibles
	function showTableCitas() {
		$.ajax({
			url: apiCitas + "getByPaciente",
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
							<td>${row.nombre_doctor} ${row.apellido_doctor}</td>
							<td>${row.fecha_cita}</td>
							<td>${row.hora_cita}</td>
							<td>${row.estado}</td>
							<td class="d-flex justify-content-center">${
								row.id_estado == 2
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
		swal({
				title: 'Advertencia',
				text: '¿Quiere cancelar la cita?',
				icon: 'warning',
				buttons: ['Cancelar', 'Aceptar'],
				closeOnClickOutside: false,
				closeOnEsc: false
		}).then(function(value) {
			if (value) {
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
							if (result.status == 1) {
									showTableCitas();
									swal({
										title: 'Enhorabuena',
										text: 'Se ha cancelado la cita',
										icon: 'success',
										button: 'Aceptar',
										closeOnClickOutside: false,
										closeOnEsc: false
								});
							} else if (result.status == 2) {
								sweetAlert(3, 'La cita ha sido aceptada anteriormente', null);
							} else if (result.status == 3) {
								sweetAlert(3, 'La cita ha sido cancelada anteriormente y no puede ser modificada debido a que excedió el tiempo permitido', null);
							} else if (result.status == 4) {
								sweetAlert(3, 'La cita ya fue realizada', null);
							} else if (result.status == 5) {
								sweetAlert(3, 'Se ha agotado el horario permitido para cancelar la cita', null);
							} else if (result.status == 6) {
								sweetAlert(3, 'Se ha agotado el periodo permitido para cancelar la cita', null);
							} else if (result.status == 7) {
								sweetAlert(3, 'Ya no es posible cancelar la cita', null);
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
		});
	}