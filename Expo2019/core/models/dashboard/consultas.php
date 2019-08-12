<?php
class Consultas extends Validator
{
    private $idconsulta = null;
    private $padecimientos = null;
    private $iddoctor = null;
    private $idpaciente = null;
    private $receta = null;
    private $idcita = null;
    private $fecha1 = null;
    private $fecha2 = null;
    private $mes = null;

    public function setIdConsulta($value)
    {
        if ($this->validateId($value)) {
			$this->idconsulta = $value;
			return true;
		} else {
			return false;
		}
    }

    public function getIdConsulta()
    {
        return $this->idconsulta;
    }

    public function setPadecimientos($value)        
    {
        if ($this->validateAlphabetic($value, 1, 200)) {
			$this->padecimientos = $value;
			return true;
		} else {
			return false;
		}
    }

    public function getPadecimientos()
    {
        return $this->padecimientos;
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

    public function setIdPaciente($value)
    {
        if ($this->validateId($value)) {
			$this->idpaciente = $value;
			return true;
		} else {
			return false;
		}
    }

    public function getIdPaciente()
    {
        return $this->idpaciente;
    }

    public function setReceta($value)
    {
        if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->receta = $value;
			return true;
		} else {
			return false;
		}
    }

    public function getReceta()
    {
        return $this->receta;
    }

    public function setIdCita($value)
    {
        if ($this->validateId($value)) {
			$this->idcita = $value;
			return true;
		} else {
			return false;
		}
    }

    public function getIdCita()
    {
        return $this->idcita;
    }

    public function setFecha1($value)
    {
        $this->fecha1 = $value;
        return true;
    }

    public function setFecha2($value)
    {
        $this->fecha2 = $value;
        return true;
    }

    public function setMes($value)
    {
        $this->mes = $value;
        return true;
    }

    public function consultasPorFecha()
    {
        $sql = 'SELECT NumeroMes, NombreMes, CantidadCitas FROM (SELECT MONTH(fecha_cita) AS NumeroMes, COUNT(cn.id_cita) AS CantidadCitas, m.mes AS NombreMes FROM cita c INNER JOIN consulta cn USING(id_cita) INNER JOIN estado_cita e ON c.id_estado = e.id_estado INNER JOIN meses m WHERE c.id_estado = 4 AND MONTH(fecha_cita) = id_mes GROUP BY NumeroMes ORDER BY NumeroMes LIMIT 10) COUNTTABLE';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function consultasPorHorario()
    {
        $sql = 'SELECT Hora, CantidadCitas FROM (SELECT HOUR(hora_cita) AS Hora, COUNT(cn.id_cita) AS CantidadCitas FROM cita c INNER JOIN consulta cn USING(id_cita) INNER JOIN estado_cita e ON c.id_estado = e.id_estado WHERE c.id_estado = 4 GROUP BY Hora ORDER BY Hora LIMIT 10) COUNTTABLE';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function consultasConFechas()
    {
        $sql = 'SELECT NumeroMes, NombreMes, CantidadCitas FROM (SELECT MONTH(fecha_cita) AS NumeroMes, COUNT(cn.id_cita) AS CantidadCitas, m.mes AS NombreMes FROM cita c INNER JOIN consulta cn USING(id_cita) INNER JOIN estado_cita e ON c.id_estado = e.id_estado INNER JOIN meses m WHERE c.id_estado = 4 AND MONTH(fecha_cita) = id_mes AND fecha_cita BETWEEN ? AND ? GROUP BY NumeroMes ORDER BY NumeroMes LIMIT 10) COUNTTABLE';
        $params = array($this->fecha1, $this->fecha2);
        return Database::getRows($sql, $params);
    }

    public function consultasMensuales()
    {
        $sql = 'SELECT COUNT(id_consulta) AS Consultas, DAY(fecha_cita) AS Dia, MONTH(fecha_cita) AS Mes FROM consulta c INNER JOIN cita ci USING(id_cita) WHERE MONTH(fecha_cita) = ? GROUP BY fecha_cita ORDER BY fecha_cita LIMIT 10';
        //$sql = 'SELECT COUNT(id_consulta) AS Consultas, fecha_cita FROM consulta c INNER JOIN cita ci USING(id_cita) WHERE MONTH(fecha_cita) = ? GROUP BY fecha_cita ORDER BY fecha_cita LIMIT 10';
        $params = array($this->mes);
        return Database::getRows($sql, $params);
    }

    public function consultasMensualesDoc()
    {
        $sql = 'SELECT COUNT(id_consulta) AS Consultas, nombre_doctor, apellido_doctor FROM consulta c INNER JOIN cita ci USING(id_cita) INNER JOIN doctores d ON c.id_doctor = d.id_doctor INNER JOIN estado_cita e ON ci.id_estado = e.id_estado WHERE MONTH(fecha_cita) = ? AND ci.id_estado = 4 GROUP BY c.id_doctor ORDER BY Consultas DESC LIMIT 10';
        $params = array($this->mes);
        return Database::getRows($sql, $params);
    }
}