<?php
class Pacientes extends Validator
{
	private $idpaciente = null;
	private $nombre = null;
	private $apellido = null;
	private $correo = null;
	private $usuario = null;
	private $clave = null;
	private $fecha = null;
	private $foto = null;
	private $peso = null;
	private $estatura = null;
	private $idestado = null;
	private $ruta = '../../../resources/img/dashboard/pacientes/';

	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->idpaciente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->idpaciente;
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

	public function setPeso($value)
	{
		if ($this->validateWeight($value)) {
			$this->peso = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPeso()
	{
		return $this->peso;
	}

	public function setEstatura($value)
	{
		if ($this->validateHeight($value)) {
			$this->estatura = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEstatura()
	{
		return $this->estatura;
	}

	public function setIdestado($value)
	{
		if ($value == 1 || $value == 0) {
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

	public function getRuta()
	{
		return $this->ruta;
	}

	public function checkPaciente()
	{
		$sql = 'SELECT id_paciente FROM pacientes WHERE usuario_paciente = ?';
		$params = array($this->usuario);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->idpaciente = $data['id_paciente'];
			return true;
		} else {
			return false;
		}
	}

	public function readPacientes()
	{
		$sql = 'SELECT id_paciente, nombre_paciente, apellido_paciente, correo_paciente, usuario_paciente, fecha_nacimiento, foto_paciente, peso_paciente, estatura_paciente, id_estado FROM pacientes ORDER BY apellido_paciente';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchUsuario($value)
	{
		$sql = 'SELECT id_paciente, nombre_paciente, apellido_paciente, correo_paciente, usuario_paciente FROM pacientes WHERE apellido_paciente LIKE ? OR nombre_paciente LIKE ? ORDER BY apellido_paciente';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createPaciente()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO pacientes(nombre_paciente, apellido_paciente, correo_paciente, usuario_paciente, contrasena_paciente, fecha_nacimiento, foto_paciente, peso_paciente, estatura_paciente, id_estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $hash, $this->fecha, $this->foto, $this->peso, $this->estatura, $this->idestado);
		return Database::executeRow($sql, $params);
	}

	public function getPaciente()
	{
		$sql = 'SELECT id_paciente, nombre_paciente, apellido_paciente, correo_paciente, usuario_paciente, contrasena_paciente, fecha_nacimiento, foto_paciente, peso_paciente, estatura_paciente, id_estado FROM pacientes WHERE id_paciente = ?';
		$params = array($this->idpaciente);
		return Database::getRow($sql, $params);
	}

	public function updatePaciente()
	{
		$sql = 'UPDATE pacientes SET nombre_paciente = ?, apellido_paciente = ?, correo_paciente = ?, usuario_paciente = ?, fecha_nacimiento = ?, foto_paciente = ?, id_estado = ? WHERE id_paciente = ?';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $this->fecha, $this->foto, $this->idestado, $this->idpaciente);
		return Database::executeRow($sql, $params);
	}

	public function deletePaciente()
	{
		$sql = 'DELETE FROM pacientes WHERE id_paciente = ?';
		$params = array($this->idpaciente);
		return Database::executeRow($sql, $params);
	}
}
