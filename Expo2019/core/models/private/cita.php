<?php
class Citas extends Validator
{
	// Declaración de propiedades
	private $id = null;
    private $id_doc = null;
    private $id_pac = null;
    private $fecha = null;
    private $hora = null;
    private $estado = null;


    public function getCita()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente, c.fecha_cita, c.hora_cita from cita c, pacientes p, estado_cita e WHERE p.id_paciente=c.id_paciente and e.id_estado=1 and c.id_doctor=? GROUP by p.id_paciente';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

}
?>