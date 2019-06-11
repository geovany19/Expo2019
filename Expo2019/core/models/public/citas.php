<?php
class Citas extends Validator
{
    //Declaración de variables a utilizar
    private $id_cita = null;
    private $id_doctor = null;
    private $id_paciente = null;
    private $fecha = null;
    private $hora = null;
    private $id_estado = null;


	//Métodos para la sobre carga de propiedades
	public function setIdcita($value)
	{
		if ($this->validateId($value)) {
			$this->id_cita = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdcita()
	{
		return $this->id_cita;
	}

	public function setIddoctor($value)
	{
		if ($this->validateId($value)) {
			$this->id_doctor = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIddoctor()
	{
		return $this->id_doctor;
	}

	public function setIdpaciente($value)
	{
		if ($this->validateId($value)) {
			$this->id_paciente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId_paciente()
	{
		return $this->id_paciente;
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

	public function setHora($value)
	{
		if ($this->validateHour($value)) {
			$this->hora = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getHora()
	{
		return $this->hora;
	}

	public function setIdestado($value)
	{
		if ($this->validateId($value)) {
			$this->id_estado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdestado()
	{
		return $this->id_estado;
	}

	//Métodos para manejar el CRUD
	public function readCitas()
	{
		$sql = 'SELECT a.id_cita, d.nombre_doctor, c.nombre_paciente, a.fecha_cita, a.hora_cita, b.estado, b.id_estado FROM cita a, estado_cita b, pacientes c, doctores d WHERE a.id_doctor = d.id_doctor AND a.id_paciente = c.id_paciente AND a.id_estado = b.id_estado  ORDER BY a.fecha_cita';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createCita()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO cita(id_doctor, id_paciente, fecha_cita, hora_cita, id_estado) VALUES(?,?,?,?,?)';
		$params = array($this->id_doctor, $this->id_paciente, $this->fecha, $this->hora, $this->id_estado);
		return Database::executeRow($sql, $params);
	}

	public function getCita()
	{
		$sql = 'SELECT id_doctor, id_paciente, fecha_cita, hora_cita, id_estado FROM cita WHERE id_cita = ?';
		$params = array($this->id_cita);
		return Database::getRow($sql, $params);
	}

	public function updateEstado()
	{
		$sql = 'UPDATE cita SET id_estado = ? WHERE id_cita = ?';
		$params = array($this->id_estado, $this->id_cita);
		return Database::executeRow($sql, $params);
	}

	public function deleteCita()
	{
		$sql = 'DELETE FROM cita WHERE id_cita = ?';
		$params = array($this->id_cita);
		return Database::executeRow($sql, $params);
	}
}
