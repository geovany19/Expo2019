<?php
class Usuarios extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;
	private $fecha = null;
	private $especialidad = null;

	// Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombres($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombres = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setApellidos($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->apellidos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellidos()
	{
		return $this->apellidos;
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

	public function setAlias($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->alias = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAlias()
	{
		return $this->alias;
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

	// Métodos para manejar la sesión del usuario
	public function checkAlias()
	{
		$sql = 'SELECT id_doctor FROM doctores WHERE usuario_doctor = ?';
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id_doctor'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasena_doctor FROM doctores WHERE id_doctor = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->clave, $data['contrasena_doctor'])) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getUsuario()
	{
		$sql = 'SELECT id_doctor, nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor  FROM doctores WHERE id_doctor = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}
	public function updateUsuario()
	{
		$sql = 'UPDATE doctores SET nombre_doctor = ?, apellido_doctor = ?, correo_doctor = ?, usuario_doctor = ? WHERE id_doctor = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
		return Database::executeRow($sql, $params);
	}


	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE doctores SET contrasena_doctor = ? WHERE id_doctor = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function getCitas()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente, c.fecha_cita, c.hora_cita from cita c, pacientes p, estado_cita e WHERE p.id_paciente=c.id_paciente and c.id_estado=1 and c.id_doctor=? GROUP by p.id_paciente';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function getCitaspendientes()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente, c.fecha_cita, c.hora_cita from cita c, pacientes p, estado_cita e WHERE p.id_paciente=c.id_paciente and c.id_estado=2 and c.id_doctor=? GROUP by p.id_paciente';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}
	//Obtener cita para el calendario
	public function getCita()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente, c.fecha_cita from cita c, pacientes p WHERE c.id_doctor=? and c.id_estado=4 and c.id_paciente=p.id_paciente group by c.fecha_cita';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function cancelCita()
	{
		$sql = 'UPDATE cita SET id_estado = 3 WHERE  id_cita = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function aceptarCita()
	{
		$sql = 'UPDATE cita SET id_estado = 4 WHERE  id_cita = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
