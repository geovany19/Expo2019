<?php
class Cita extends Validator
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
        $sql = 'SELECT id_cita, fecha_cita, hora_cita, d.nombre_doctor, d.apellido_doctor, p.nombre_paciente, p.apellido_paciente, estado FROM cita c INNER JOIN doctores d ON d.id_ d octor = c.id_doctor INNER JOIN pacientes p ON p.id_paciente = c.id_paciente INNER JOIN estado_cita e ON e.id_estado = c.id_estado ORDER BY fecha_cita DESC';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
}
