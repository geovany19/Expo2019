<?php
class Disponibilidad extends Validator
{
    private $iddisponilidad = null;
    private $dia = null;
    private $horainicio = null;
    private $horafin = null;
    private $iddoctor = null;
    private $nombre = null;
    private $apellido = null;

    public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->iddisponilidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->iddisponilidad;
    }
    
    public function setDia($value)
	{
		if ($this->validateAlphabetic($value, 1, 10)) {
			$this->dia = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDia()
	{
		return $this->dia;
    }
    
    public function setHoraInicio($value)
    {
        if ($this->validateHour($value)) {
            $this->horainicio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getHoraInicio()
    {
        return $this->horainicio;
    }

    public function setHoraFin($value)
    {
        if ($this->validateHour($value)) {
            $this->horafin = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getHoraFin()
    {
        return $this->horafin;
    }

    public function setIdDoctor($value)
	{
		if ($this->validateId($value)) {
			$this->iddoctor = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdDoctor()
	{
		return $this->iddoctor;
    }

    public function setNombre($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
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
		if ($this->validateAlphabetic($value, 1, 50)) {
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

    //Métodos para el manejo del CRUD
    //Consulta optimizada que devuelve las disponibilidades de horarios entre las tablas disponibilidad y doctores
    public function readDisponibilidad()
	{ 
		$sql = 'SELECT id_disponibilidad, dia_disponible, hora_inicio, hora_fin, nombre_doctor, apellido_doctor FROM disponibilidad INNER JOIN doctores ON doctores.id_doctor = disponibilidad.id_doctor';
		$params = array(null);
		return Database::getRow($sql, $params);
	}
}