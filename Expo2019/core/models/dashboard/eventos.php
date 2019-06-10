<?php
class Eventos extends Validator
{
    private $id_doctor=null;

    public function setid_doctor($value) {
        if($this->validateId($value)){
            $this->id_doctor=$value;
            return true;
        }else{
            return false;
        }
    }

	public function readEventos()
	{
		$sql = 'SELECT id_paciente title, fecha_cita start FROM cita WHERE id_doctor=?';
		$params = array($this->id_doctor);
		return Database::getRows($sql, $params);
	}
}