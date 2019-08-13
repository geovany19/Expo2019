<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/consultas.php');

if (isset($_GET['action'])) {
    session_start();
    $consultas = new Consultas;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $consultas->readDoctores()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Doctores registrados';
                }
                break;
            case 'search':
                $_POST = $consultas->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $consultas->searchDoctores($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se encontraron coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
                //casos utilizados para la realización de gráficos
                //caso para mostrar consultas totales de cada mes
            case 'consultasFecha':
                if ($result['dataset'] = $consultas->consultasPorFecha()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos por mostrar.';
                }
                break;
                //caso utilizado para mostrar las consultas totales por hora 
            case 'consultasHora':
                if ($result['dataset'] = $consultas->consultasPorHorario()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay datos por mostrar.';
                }
                break;
                //caso utilizado para mostrar las consultas totales en un rango de fechas
                //recibe los valores a través de los date del dashboard (pagina.php)
                //Fecha1 y Fecha2
            case 'consultasConFecha':
                if ($consultas->setFecha1($_POST['Fecha1'])) {
                    if ($consultas->setFecha2($_POST['Fecha2'])) {
                        if ($result['dataset'] = $consultas->consultasConFechas()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay datos por mostrar';
                        }
                    }
                }
                break;
                //caso utilizado pra mostrar las consultas por fecha de cada mes
                //recibe el valor del mes a través del select 'mes' de pagina.php
            case 'consultasMensuales':
                if ($consultas->setMes($_POST['Mes'])) {
                    if ($result['dataset'] = $consultas->consultasMensuales()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos por mostrar';
                    }
                } else {
                    $result['exception'] = 'Mes incorrecto';
                }
                break;
            case 'consultasMensualesHora':
                if ($consultas->setMes($_POST['Mes'])) {
                    if ($result['dataset'] = $consultas->consultasMensualesHoras()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos por mostrar';
                    }
                } else {
                    $result['exception'] = 'Mes incorrecto';
                }
                break;
                //caso utilizado para mostrar las consultas mensuales de doctor
                //recibe el valor del mes a través del select 'mes' de pagina.php
            case 'consultasMensualesDoc':
                if ($consultas->setMes($_POST['Mes'])) {
                    if ($result['dataset'] = $consultas->consultasMensualesDoc()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos por mostrar';
                    }
                } else {
                    $result['exception'] = 'Mes incorrecto';
                }
                break;
                /*case 'create':
                $_POST = $consultas->validateForm($_POST);
                if ($consultas->setNombre($_POST['create_nombre'])) {
                    if ($consultas->setApellido($_POST['create_apellido'])) {
                        if ($consultas->setCorreo($_POST['create_correo'])) {
                            if ($consultas->setUsuario($_POST['create_usuario'])) {
                                if ($consultas->setFecha($_POST['create_fecha'])) {
                                    if ($consultas->setIdespecialidad($_POST['create_especialidad'])) {
                                        if ($consultas->setIdestado(isset($_POST['create_estado']) ? 1 : 0)) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($consultas->setFoto($_FILES['create_archivo'], null)) {
                                                    if ($consultas->createDoctor()) {
                                                        $result['status'] = 1;
                                                        if ($consultas->saveFile($_FILES['create_archivo'], $consultas->getRuta(), $consultas->getFoto())) {
                                                            $result['message'] = 'Doctor creado correctamente';
                                                        } else {
                                                            $result['message'] = 'Doctor no creado. No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $consultas->getImageError();
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }
                                        } else {
                                            $result['exception'] = 'Error con el estado';
                                        }
                                    } else {
                                        $result['exception'] = 'Error con la especialidad';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha no válida';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'get':
                if ($consultas->setId($_POST['id_doctor'])) {
                    if ($result['dataset'] = $consultas->getDoctor()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Doctor inexistente';
                    }
                } else {
                    $result['exception'] = 'Doctor incorrecto';
                }
                break;
            case 'update':
                $_POST = $consultas->validateForm($_POST);
                if ($consultas->setId($_POST['id_doctor'])) {
                    if ($consultas->getDoctor()) {
                        if ($consultas->setNombre($_POST['update_nombre'])) {
                            if ($consultas->setApellido($_POST['update_apellido'])) {
                                if ($consultas->setCorreo($_POST['update_correo'])) {
                                    if ($consultas->setUsuario($_POST['update_usuario'])) {
                                        if ($consultas->setFecha($_POST['update_fecha'])) {
                                            if ($consultas->setIdespecialidad($_POST['update_especialidad'])) {
                                                if ($consultas->setIdestado(isset($_POST['update_estado']) ? 1 : 0)) {
                                                    if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                        if ($consultas->setFoto($_FILES['update_archivo'], $_POST['foto_doctor'])) {
                                                            $archivo = true;
                                                        } else {
                                                            $result['exception'] = $producto->getImageError();
                                                            $archivo = false;
                                                        }
                                                    } else {
                                                        if (!$consultas->setFoto(null, $_POST['foto_doctor'])) {
                                                            $result['exception'] = $consultas->getImageError();
                                                        }
                                                        $archivo = false;
                                                    }
                                                    if ($consultas->updateDoctor()) {
                                                        $result['status'] = 1;
                                                        if ($archivo) {
                                                            if ($consultas->saveFile($_FILES['update_archivo'], $consultas->getRuta(), $consultas->getFoto())) {
                                                                $result['message'] = 'Doctor modificado correctamente';
                                                            } else {
                                                                $result['message'] = 'Doctor modificado. No se guardó el archivo';
                                                            }
                                                        } else {
                                                            $result['message'] = 'Doctor modificado. No se subió ningún archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Error con el estado';
                                                }
                                            } else {
                                                $result['exception'] = 'Error con la especialidad';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de doctor incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos3';
                        }
                    } else {
                        $result['exception'] = 'Doctor inexistente';
                    }
                } else {
                    $result['exception'] = 'Doctor incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_doctor'] != $_SESSION['idUsuario']) {
                    if ($consultas->setId($_POST['id_doctor'])) {
                        if ($consultas->getDoctor()) {
                            if ($consultas->deleteDoctor()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Doctor inexistente';
                        }
                    } else {
                        $result['exception'] = 'Doctor incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;*/
            default:
                exit('Acción no disponible');
        }
    } else {
        switch ($_GET['action']) {
                /*case 'read':
                if ($consultas->readDoctores()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un doctor registrado';
                } else {
                    $result['message'] = 'No existen doctores registrados';
                }
                break;*/
            default:
                exit('Acción no disponible');
        }
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
