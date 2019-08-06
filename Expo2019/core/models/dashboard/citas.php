<?php
class Citas extends Validator
{
    //Declaración de variables a utilizar
    private $idcita = null;
    private $iddoctor = null;
    private $idpaciente = null;
    private $fecha = null;
    private $hora = null;
    private $idestado = null;


    //Métodos para la sobre carga de propiedades
    public function setIdcita($value)
    {
        if ($this->validateId($value)) {
            $this->idcita = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdcita()
    {
        return $this->idcita;
    }

    public function setIddoctor($value)
    {
        if ($this->validateId($value)) {
            $this->iddoctor = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIddoctor()
    {
        return $this->iddoctor;
    }

    public function setIdpaciente($value)
    {
        if ($this->validateId($value)) {
            $this->idpaciente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdpaciente()
    {
        return $this->idpaciente;
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

    public function readCitas()
    {
        $sql = 'SELECT id_cita, fecha_cita, hora_cita, d.nombre_doctor, d.apellido_doctor, p.nombre_paciente, p.apellido_paciente, estado FROM cita c INNER JOIN doctores d ON d.id_doctor = c.id_doctor INNER JOIN pacientes p ON p.id_paciente = c.id_paciente INNER JOIN estado_cita e ON e.id_estado = c.id_estado ORDER BY fecha_cita DESC';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function searchCitas($value)
	{
		$sql = 'SELECT id_cita, fecha_cita, hora_cita, d.nombre_doctor, d.apellido_doctor, p.nombre_paciente, p.apellido_paciente, estado FROM cita c INNER JOIN doctores d ON d.id_doctor = c.id_doctor INNER JOIN pacientes p ON p.id_paciente = c.id_paciente INNER JOIN estado_cita e ON e.id_estado = c.id_estado WHERE fecha_cita LIKE ? OR nombre_paciente LIKE ? OR apellido_paciente LIKE ? AND id_doctor = ? ORDER BY fecha_cita DESC ';
		$params = array("%$value%", "%$value%", "%$value%", $this->iddoctor);
		return Database::getRows($sql, $params);
	}

	public function createCita()
	{
		$sql = 'INSERT INTO cita(id_doctor, id_paciente, fecha_cita, hora_cita, id_estado) VALUES(?, ?, ?, ?, ?)';
		$params = array($this->iddoctor, $this->idpaciente, $this->fecha, $this->hora, $this->idestado);
		return Database::executeRow($sql, $params);
	}

	public function getCita()
	{
		$sql = 'SELECT id_cita, fecha_cita, hora_cita, d.nombre_doctor, d.apellido_doctor, p.nombre_paciente, p.apellido_paciente, estado FROM cita c INNER JOIN doctores d ON d.id_doctor = c.id_doctor INNER JOIN pacientes p ON p.id_paciente = c.id_paciente INNER JOIN estado_cita e ON e.id_estado = c.id_estado WHERE id_cita = ? ORDER BY fecha_cita DESC';
		$params = array($this->idcita);
		return Database::getRow($sql, $params);
	}

	public function updateCita()
	{
		$sql = 'UPDATE cita SET id_paciente = ?, fecha_cita = ?, hora_cita = ? WHERE id_cita = ?';
		$params = array($this->idpaciente, $this->fecha, $this->hora, $this->idcita);
		return Database::executeRow($sql, $params);
	}

	public function deleteDoctor()
	{
		$sql = 'DELETE FROM cita WHERE id_cita = ?';
		$params = array($this->idcita);
		return Database::executeRow($sql, $params);
    }
    
    public function rescheduleCita()
    {
        $sql = 'UPDATE cita SET fecha_cita = ?, hora_cita = ? WHERE id_cita = ?';
        $params = array($this->fecha, $this->hora, $this->idcita);
        return Database::executeRow($sql, $params);
    }

    public function acceptCita()
    {
        $sql = 'UPDATE cita SET id_estado = ?';
        $params = array(2);
        return Database::executeRow($sql, $params);
    }

    public function cancelCita()
    {
        $sql = 'UPDATE cita SET id_estado = ?';
        $params = array(3);
        return Database::executeRow($sql, $params);
    }

    public function showCitasCanceladas()
    {
        $sql = 'SELECT nombre_doctor, apellido_doctor, COUNT(id_cita) AS CitasCanceladas FROM cita c INNER JOIN doctores d ON c.id_doctor = d.id_doctor INNER JOIN estado_cita e ON c.id_estado = e.id_estado WHERE c.id_estado = 3 GROUP BY nombre_doctor ORDER BY id_cita LIMIT 10';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function showCitasRealizadas()
    {
        $sql = 'SELECT nombre_doctor, apellido_doctor, COUNT(id_cita) AS CitasRealizadas FROM cita c INNER JOIN doctores d ON c.id_doctor = d.id_doctor INNER JOIN estado_cita e ON c.id_estado = e.id_estado WHERE c.id_estado = 4 GROUP BY nombre_doctor ORDER BY id_cita LIMIT 10';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function showCitasEspecialidad()
    {
        $sql = 'SELECT c.id_doctor, nombre_especialidad, COUNT(id_cita) AS CitasRealizadas FROM cita c INNER JOIN doctores d ON c.id_doctor = d.id_doctor INNER JOIN especialidad es ON d.id_especialidad = es.id_especialidad INNER JOIN estado_cita e ON c.id_estado = e.id_estado WHERE c.id_estado = 4 GROUP BY nombre_doctor ORDER BY id_cita LIMIT 10';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}
