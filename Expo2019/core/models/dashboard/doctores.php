<?php
class Doctores extends Validator
{
	//Declaración de variables a utilizar
	private $iddoctor = null;
	private $nombre = null;
	private $apellido = null;
	private $correo = null;
	private $usuario = null;
	private $clave = null;
	private $fecha = null;
	private $foto = null;
	private $telefono = null;
	private $idespecialidad = null;
	private $idestado = null;
	private $ruta = '../../../resources/img/dashboard/doctores/';

	//Métodos para la sobre carga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->iddoctor = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->iddoctor;
	}

	public function setNombre($value)
	{
		if ($this->validateAlphabetic($value, 1, 25)) {
			$this->nombre = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setApellido($value)
	{
		if ($this->validateAlphabetic($value, 1, 25)) {
			$this->apellido = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellido()
	{
		return $this->apellido;
	}

	public function setCorreo($value)
	{
		if ($this->validateEmail($value)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setUsuario($value)
	{
		if ($this->validateAlphanumeric($value, 1, 25)) {
			$this->usuario = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setClave($value)
	{
		if ($this->validatePassword($value)) {
			$this->clave = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getClave()
	{
		return $this->clave;
	}
	public function setFecha($value)
	{
		if ($this->validateDate($value)) {
			$this->fecha = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setFoto($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->foto = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getFoto()
	{
		return $this->foto;
	}

	public function getRuta()
	{
		return $this->ruta;
	}

	public function setIdespecialidad($value)
	{
		if ($this->validateId($value)) {
			$this->idespecialidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdespecialidad()
	{
		return $this->idespecialidad;
	}

	public function setTelefono($value)
	{
		if ($this->validatePhoneNumber($value)) {
			$this->telefono = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setIdestado($value)
	{
		if ($value == '1' || $value == '0') {
			$this->idestado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdestado()
	{
		return $this->idestado;
	}

	//Métodos para manejar el CRUD
	public function readDoctores()
	{
		$sql = 'SELECT id_doctor, nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor, fecha_nacimiento, foto_doctor, telefono_doctor, es.id_estado, e.id_especialidad, e.nombre_especialidad, es.estado, id_sesion FROM doctores d INNER JOIN especialidad e ON e.id_especialidad = d.id_especialidad INNER JOIN estado_usuarios es ON es.id_estado = d.id_estado  ORDER BY id_doctor';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function fillDoctores()
	{
		$sql = 'SELECT id_doctor, CONCAT(nombre_doctor,\' \',apellido_doctor) AS NombreDoc FROM doctores';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchDoctores($value)
	{
		$sql = 'SELECT id_doctor, nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor FROM doctores WHERE apellido_doctor LIKE ? OR nombre_doctor LIKE ? ORDER BY apellido_doctor';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createDoctor()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO doctores(nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor, contrasena_doctor, fecha_nacimiento, foto_doctor, telefono_doctor, id_estado, id_especialidad) VALUES(?,?,?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $hash, $this->fecha, $this->foto, $this->telefono, $this->idestado, $this->idespecialidad);
		return Database::executeRow($sql, $params);
	}

	public function getDoctor()
	{
		$sql = 'SELECT id_doctor, nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor, contrasena_doctor, fecha_nacimiento, foto_doctor, telefono_doctor, id_estado, id_especialidad FROM doctores WHERE id_doctor = ?';
		$params = array($this->iddoctor);
		return Database::getRow($sql, $params);
	}

	public function updateDoctor()
	{
		$sql = 'UPDATE doctores SET nombre_doctor = ?, apellido_doctor = ?, correo_doctor = ?, usuario_doctor = ?, fecha_nacimiento = ?, foto_doctor = ?, telefono_doctor = ?, id_estado = ?,id_especialidad = ? WHERE id_doctor = ?';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $this->fecha, $this->foto, $this->telefono, $this->idestado, $this->idespecialidad, $this->iddoctor);
		return Database::executeRow($sql, $params);
	}
	public function doctoresEspecialidad($id_especialidad)
	{
		$sql = 'SELECT doctores.nombre_doctor, doctores.apellido_doctor, especialidad.nombre_especialidad,foto_doctor FROM (doctores INNER JOIN especialidad ON especialidad.id_especialidad=doctores.id_especialidad) WHERE especialidad.id_especialidad=?';
		$params = array($id_especialidad);
		return Database::getRows($sql, $params);
	}
	public function deleteDoctor()
	{
		$sql = 'DELETE FROM doctores WHERE id_doctor = ?';
		$params = array($this->iddoctor);
		return Database::executeRow($sql, $params);
	}

	public function graficoCalificacionesD()
	{
		$sql = 'SELECT nombre_doctor, apellido_doctor, SUM(calificacion) / COUNT(DISTINCT(id_calificacion)) AS Promedio FROM calificacion_doctor c INNER JOIN doctores d USING(id_doctor) GROUP BY id_doctor ORDER BY Promedio DESC';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
