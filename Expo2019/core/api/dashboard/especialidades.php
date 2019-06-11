<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/especialidades.php');

if (isset($_GET['action'])) {
	session_start();
	$especialidad = new Especialidad;
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	if (isset($_SESSION['idUsuario']) || true) {
		switch ($_GET['action']) {
			case 'read':
				if ($result['dataset'] = $especialidad->readEspecialidad()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay especialidades registradas';
				}
				break;
			case 'search':
				$_POST = $especialidad->validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $especialidad->searchEspecialidad($_POST['busqueda'])) {
						$result['status'] = 1;
						$rows = count($result['dataset']);
						if ($rows > 1) {
							$result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
						} else {
							$result['message'] = 'Solo existe una coincidencia';
						}
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
			case 'create':
				$_POST = $especialidad->validateForm($_POST);
				if ($especialidad->setEspecialidad($_POST['create_especialidad'])) {
					if ($especialidad->setDescripcion($_POST['create_descripcion'])) {
						if ($especialidad->createEspecialidad()) {
							$result['id'] = Database::getLastRowId();
							$result['status'] = 1;
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Descripción incorrecta';
					}
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
				break;
			case 'get':
				if ($especialidad->setId($_POST['id_especialidad'])) {
					if ($result['dataset'] = $especialidad->selectEspecialidad()) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'Especialidad inexistente';
					}
				} else {
					$result['exception'] = 'Especialidad incorrecta';
				}
				break;
			case 'update':
				$_POST = $especialidad->validateForm($_POST);
				if ($especialidad->setId($_POST['id_especialidad'])) {
					if ($especialidad->selectEspecialidad()) {
						if ($especialidad->setEspecialidad($_POST['update_nombre'])) {
							if ($especialidad->setDescripcion($_POST['update_descripcion'])) {
								if ($especialidad->updateEspecialidad()) {
									$result['status'] = 1;
									$result['message'] = 'Especialidad modificada correctamente';
								} else {
									$result['exception'] = 'Operación fallida';
								}
							} else {
								$result['exception'] = 'Descripción incorrecta. El campo posee caracteres no permitidos.';
							}
						} else {
							$result['exception'] = 'Nombre incorrecto. El campo posee caracteres no permitidos.';
						}
					} else {
						$result['exception'] = 'Especialidad inexistente';
					}
				} else {
					$result['exception'] = 'Especialidad incorrecta';
				}
				break;
			case 'delete':
				if ($especialidad->setId($_POST['id_especialidad'])) {
					if ($especialidad->selectEspecialidad()) {
						if ($especialidad->deleteEspecialidad()) {
							$result['status'] = 1;
							$result['message'] = 'Especialidad eliminada correctamente';
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Especialidad inexistente';
					}
				} else {
					$result['exception'] = 'Especialidad incorrecta';
				}
				break;
			default:
				exit('Acción no disponible');
		}
		print(json_encode($result));
	} else {
		exit('Acceso no disponible');
	}
} else {
	exit('Recurso denegado');
}
