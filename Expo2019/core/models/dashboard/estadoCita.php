<?php
class Estado extends Validator
{
    private $idestado = null;
    private $estadocita = null;

    //Métodos para la sobre carga de propiedades
	public function setIdEstado($value)
	{
		if ($this->validateId($value)) {
			$this->idestado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->idestado;
	}

	public function setEstado($value)
	{
		if ($this->validateAlphabetic($value, 1, 25)) {
			$this->estado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEstado()
	{
		return $this->estado;
    }
    
    //Métodos para manejar el CRUD
	public function readEstados()
	{
		$sql = 'SELECT id_estado, estado FROM estado_cita';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function fillEstados()
	{
		$sql = 'SELECT id_estado, estado FROM estado_cita';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function getEstadoCita()
	{
		$sql = 'SELECT id_estado, estado_cita FROM estado_cita WHERE id_estado = ? LIMIT 1';
		$params = array($this->idestado);
		return Database::getRow($sql, $params);
	}
    
    public function createEstado()
    {
        $sql = 'INSERT INTO estado_cita(estado) VALUES(?)';
        $params = array($this->estadocita);
        return Database::executeRow($sql, $params);
    }

    public function updateEstado()
    {
        $sql = 'UPDATE estado_cita SET estado = ? WHERE id_estado = ?';
        $params = array($this->estadocita, $this->idestado);
        return Database::executeRow($sql, $params);
    }

    public function deleteEstado()
    {
        $sql = 'DELETE FROM estado_cita WHERE id_estado = ?';
        $params = array($this->idestado);
        return Database::executeRow($sql, $params);
    }
}