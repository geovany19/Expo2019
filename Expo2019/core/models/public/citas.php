<?php
class Cita extends Validator
{
    //Declaración de variables a utilizar
    private $id_cita = null;
    private $id_doctor = null;
    private $id_paciente = null;
    private $fecha = null;
    private $hora = null;
	private $id_estado = null;
	private $fechamaxima = null;


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

	public function setFechaMaxima($value)
	{
		if ($this->validateDate($value)) {
			$this->fechamaxima = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getFechaMaxima()
	{
		return $this->fechamaxima;
	}

	//Métodos para manejar el CRUD
	public function readCitas()
	{
		$sql = 'SELECT a.id_cita, d.nombre_doctor, c.nombre_paciente, a.fecha_cita, a.hora_cita, b.estado, b.id_estado FROM cita a, estado_cita b, pacientes c, doctores d WHERE a.id_doctor = d.id_doctor AND a.id_paciente = c.id_paciente AND a.id_estado = b.id_estado  ORDER BY a.fecha_cita';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function checkCita()
	{
		$sql = 'SELECT id_cita, id_doctor, id_paciente, fecha_cita, hora_cita, id_estado FROM cita WHERE id_cita = ?';
		$params = array($this->id_cita);
		$data = Database::executeRow($sql, $params);
		//$fecha_actual = strtotime(date('d-m-Y H:i:00',time()));
		$fecha_actual = date('Y-m-d');
		$fecha_maxima = strtotime(date($data['fecha_cita'].'+ 3 days'));
		if ($fecha_maxima > $fecha_actual) {
			return 1;
		} else {
			return 0;
		}
		/*if ($hora_actual > $hora_maxima) {
			return 7;
		} else if ($fecha_actual > $fecha_maxima) {
			return 6;
		} else if ($hora_maxima > $hora_actual) {
			return 5;
		} else if ($estado_cita == 1 && $fecha_actual > $data['fecha_cita']) {
            return 4;
        } else if ($estado_cita == 3 && $fecha_actual > $data['fecha_cita']) {
            return 3;
        } else if ($estado_cita == 4) {
            return 2;
        } else {
            return 1;
        }*/
	}

	public function getFechaCita()
	{
		$sql = 'SELECT fecha_cita FROM cita WHERE id_cita = ?';
		$params = array($this->id_cita);
		return Database::getRows($sql, $params);
	}

	public function getHoraCita()
	{
		$sql = 'SELECT hora_cita FROM cita WHERE id_cita = ?';
		$params = array($this->id_cita);
		return Database::getRows($sql, $params);
	}

	public function getCitaByPaciente()
	{
		$sql = 'SELECT cita.id_cita, pacientes.nombre_paciente, pacientes.apellido_paciente, doctores.nombre_doctor, doctores.apellido_doctor, cita.fecha_cita, cita.hora_cita, especialidad.nombre_especialidad, cita.id_estado, estado_cita.estado from estado_cita, cita, doctores, pacientes, especialidad WHERE cita.id_paciente = pacientes.id_paciente AND cita.id_doctor = doctores.id_doctor AND especialidad.id_especialidad = doctores.id_especialidad AND cita.id_paciente = ? AND estado_cita.id_estado = cita.id_estado ORDER BY cita.fecha_cita';
		$params = array($this->id_paciente);
		return Database::getRows($sql, $params);
	}
	
	public function createCita()
	{
		$sql = 'INSERT INTO cita(id_doctor, id_paciente, fecha_cita, hora_cita, id_estado, fecha_maxima) VALUES (?,?,?,?,?,?)';
		$params = array($this->id_doctor, $this->id_paciente, $this->fecha, $this->hora, $this->id_estado, ($this->fecha - 1));
		return Database::executeRow($sql, $params);
	}
	
	public function obtenerCita()
	{
		// $hash = password_hash($this->clave, PASSWORD_DEFAULT);
		//$sql = 'INSERT INTO cita(id_doctor, id_paciente, fecha_cita, hora_cita, id_estado) VALUES(?,?,?,?,?)';
		$sql = 'SELECT c.id_cita, c.id_doctor, p.nombre_paciente, c.id_paciente, c.fecha_cita, c.hora_cita, c.id_estado FROM cita c INNER JOIN pacientes p ON c.id_paciente = p.id_paciente WHERE c.fecha_cita = ? and c.id_doctor = ?';
		$params = array( $this->fecha, $this->id_doctor);
		return Database::getRows($sql, $params);
	}
	
	public function getCita()
	{
		$sql = 'SELECT id_doctor, id_paciente, fecha_cita, hora_cita, id_estado FROM cita WHERE id_cita = ? LIMIT 1';
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

	//reportes

	public function reporteCitas()
	{
		$sql = 'SELECT pacientes.nombre_paciente, cita.id_paciente, doctores.nombre_doctor, cita.fecha_cita as fecha, cita.hora_cita, estado_cita.estado from cita, pacientes, doctores, estado_cita WHERE pacientes.id_paciente = cita.id_paciente AND doctores.id_doctor = cita.id_doctor AND cita.id_estado = estado_cita.id_estado AND cita.id_paciente = 1 ORDER BY cita.fecha_cita';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
