<?php
class Especialidad extends Validator
{
    private $idespecialidad = null;
    private $especialidad = null;
    private $descripcion = null;

    public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->idespecialidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->idespecialidad;
	}

	public function setEspecialidad($value)
	{
		if ($this->validateAlphabetic($value, 1, 25)) {
			$this->especialidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEspecialidad()
	{
		return $this->especialidad;
	}

	public function setDescripcion($value)
	{
		if ($this->validateAlphabetic($value, 1, 130)) {
			$this->descripcion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function readEspecialidad()
	{
		$sql = 'SELECT id_especialidad, nombre_especialidad, descripcion_especialidad FROM especialidad ORDER BY nombre_especialidad';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchEspecialidad($value)
	{
		$sql = 'SELECT * FROM especialidad WHERE nombre_especialidad LIKE ? OR descripcion_especialidad LIKE ? ORDER BY nombre_especialidad';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createEspecialidad()
	{
		$sql = 'INSERT INTO especialidad(nombre_especialidad, descripcion_especialidad) VALUES(?, ?)';
		$params = array($this->nombre, $this->descripcion);
		return Database::executeRow($sql, $params);
	}

	public function selectEspecialidad()
	{
		$sql = 'SELECT id_especialidad, nombre_especialidad, descripcion_especialidad FROM especialidad WHERE id_especialidad = ?';
		$params = array($this->idespecialidad);
		return Database::getRow($sql, $params);
	}

	public function updateEspecialidad()
	{
		$sql = 'UPDATE especialidad SET nombre_especialidad = ?, descripcion_especialidad = ? WHERE id_especialidad = ?';
		$params = array($this->nombre, $this->descripcion, $this->idespecialidad);
		return Database::executeRow($sql, $params);
	}

	public function deleteEspecialidad()
	{
		$sql = 'DELETE FROM especialidad WHERE id_especialidad = ?';
		$params = array($this->idespecialidad);
		return Database::executeRow($sql, $params);
	}
}