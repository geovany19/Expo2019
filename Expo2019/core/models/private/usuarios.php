<?php
class Usuarios extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;
	private $fecha = null;
	private $especialidad = null;
	//para insertar en citas 
	private $padecimientos = null;
	private $id_paciente = null;
	private $id_cita = null;
	private $receta = null;
	private $peso = null;
	private $estatura = null;
	private $presion = null;
	private $token = null;

	//Métodos para sobrecarga de propiedades
	public function setTipo($value)
	{
		if ($this->validateId($value)) {
			$this->tipo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setToken($value)
	{
		$this->token = $value;
		return true;
	}

	public function getToken()
	{
		return $this->token;
	}

	/*aqui va algo de prueba */
	public function getPeso()
	{
		return $this->peso;
	}

	public function setPeso($value)
	{
		$this->peso = $value;
		return true;
	}
//as
public function getEstatura()
	{
		return $this->estatura;
	}

	public function setEstatura($value)
	{
		$this->estatura = $value;
		return true;
	}

//as
public function getPresion()
	{
		return $this->presion;
	}

	public function setPresion($value)
	{
		$this->presion = $value;
		return true;

	}

public function setId_paciente($value)
	{
		if ($this->validateId($value)) {
			$this->id_paciente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId_cita()
	{
		return $this->id_cita;
	}
	public function setId_cita($value)
	{
		if ($this->validateId($value)) {
			$this->id_cita = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId_paciente()
	{
		return $this->id_paciente;
	}


public function setReceta($value)
	{
		if ($this->validateAlphabetic($value, 1, 130)) {
			$this->receta = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPadecimientos()
	{
		return $this->padecimientos;
	}

	public function setPadecimientos($value)
	{
		if ($this->validateAlphabetic($value, 1, 130)) {
			$this->padecimientos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getReceta()
	{
		return $this->descripcion;
	}
	/* */

	// Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombres($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombres = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setApellidos($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->apellidos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setCorreo($value)
	{
		if ($this->validateEmail($value)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
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


	public function setAlias($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->alias = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function setClave($value)
	{
		$val = $this->validatePassword2($value);
		if ($val[0]) {
			$this->clave = $value;
			return array(true,'');
		} else {
			return array(false, $val[1]);
		}
	}


	public function getClave()
	{
		return $this->clave; 
	}

	// Métodos para manejar la sesión del usuario
	public function checkAlias()
	{
		$sql = 'SELECT id_doctor, cuenta_bloqueada FROM doctores WHERE usuario_doctor = ? LIMIT 1';
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);

		$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));

		$nueva_fecha = strtotime ( date($data['cuenta_bloqueada']) .'+ 24 hours'  ) ;

		if ($data) {
			if($data['cuenta_bloqueada']){
				if($fecha_actual<$nueva_fecha){
					return 2;
				}
			}else{
				$this->id = $data['id_doctor'];
				return 1;
			}
		} else {
			return 0;
		}
	}	


	public function checkTipo()
	{
		$sql = 'SELECT pacientes.id_paciente, usuarios_a.id_usuario FROM pacientes, usuarios_a WHERE usuario_paciente = ? OR usuario_usuario = ? GROUP BY usuarios_a.id_usuario LIMIT 1';
		$params = array($this->alias, $this->alias);
		$data = Database::getRows($sql, $params);
		if ($data) {
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasena_doctor, clave_actualizada,id_doctor, id_sesion, id_estado, nombre_doctor, apellido_doctor FROM doctores WHERE id_doctor = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);

		$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));

		$nueva_fecha = strtotime(date($data['clave_actualizada']).'+ 90 days') ;
			
		if (password_verify($this->clave, $data['contrasena_doctor'])) {
			if ($fecha_actual>$nueva_fecha) {
				return 1;
			} else {
				if ($data['id_estado'] == 0) {
					$this->id = $data['id_doctor'];
					$this->nombres = $data['nombre_doctor'];
					$this->apellidos = $data['apellido_doctor'];
					return 4;
				} else {
					if ($data['id_sesion'] == 2) {
						$this->nombres = $data['nombre_doctor'];
						$this->apellidos = $data['apellido_doctor'];
						return 2;
					} else {
						return 3;
					}
				}
			}			
		} else {
			return 0;
		}
	}

	public function setOnline(){
		$sql = 'UPDATE doctores SET id_sesion = ? WHERE usuario_doctor = ?';
		$params = array(1, $this->alias);
		$data = Database::executeRow($sql, $params);
		if($data){
			$this->id = $data['id_doctor'];
			return true;
		}else{
			return false;
		}
	}

	public function setOffline(){
		$sql = 'UPDATE doctores SET id_sesion = ? WHERE id_doctor = ?';
		$params = array(2, $_SESSION['idDoctor']);
		$data = Database::executeRow($sql, $params);
	}

	public function getUsuario()
	{
		$sql = 'SELECT id_doctor, nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor  FROM doctores WHERE id_doctor = ? LIMIT 1';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}
	public function updateUsuario()
	{
		$sql = 'UPDATE doctores SET nombre_doctor = ?, apellido_doctor = ?, correo_doctor = ?, usuario_doctor = ? WHERE id_doctor = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
		return Database::executeRow($sql, $params);
	}


	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE doctores SET contrasena_doctor = ? WHERE id_doctor = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function getCitas()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente,p.id_paciente, c.fecha_cita, c.hora_cita from cita c, pacientes p, estado_cita e WHERE p.id_paciente=c.id_paciente and c.id_estado=1 and c.id_doctor=? GROUP by p.id_paciente';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function reporteExpediente($id)
	{
		$sql = 'SELECT p.nombre_paciente, p.apellido_paciente, co.padecimientos, co.receta, c.fecha_cita, d.nombre_doctor, d.apellido_doctor from pacientes p, cita c, consulta co, doctores d where c.id_paciente=p.id_paciente and co.id_paciente=c.id_paciente 
		and d.id_doctor=co.id_doctor and co.id_doctor=c.id_doctor and c.id_paciente=? GROUP by c.id_cita order by c.fecha_cita asc';
		$params = array($id);
		return Database::getRows($sql, $params);
	}
	public function reporteExpediente2($id)
	{
		$sql = 'SELECT nombre_paciente, apellido_paciente from pacientes  where id_paciente=?';
		$params = array($id);
		return Database::getRows($sql, $params);
	}

	public function getCitaspendientes()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente, c.fecha_cita, c.hora_cita from cita c, pacientes p, estado_cita e WHERE p.id_paciente=c.id_paciente and c.id_estado=2 and c.id_doctor=? GROUP by p.id_paciente';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}
	//Obtener cita para el calendario
	public function getCita()
	{
		$sql = 'SELECT c.id_cita, p.nombre_paciente, c.fecha_cita from cita c, pacientes p WHERE c.id_doctor=? and c.id_estado=4 and c.id_paciente=p.id_paciente group by c.fecha_cita';
		$params = array($this->id);
		return Database::getRows($sql, $params);
	}

	public function cancelCita()
	{
		$sql = 'UPDATE cita SET id_estado = 3 WHERE  id_cita = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function aceptarCita()
	{
		$sql = 'UPDATE cita SET id_estado = 4 WHERE  id_cita = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function readPaciente()
	{
		$sql = 'SELECT id_paciente, id_cita, c.id_estado, p.nombre_paciente FROM cita c  INNER JOIN pacientes p USING (id_paciente) WHERE id_cita = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	//Insertar en la tabla consulta

	public function insertConsulta()
	{
		$sql = 'INSERT INTO consulta (padecimientos, id_doctor, id_paciente, receta, id_cita) VALUES (?,?,?,?,?)';
		$params = array($this->padecimientos, $this->id, $this->id_paciente,$this->receta, $this->id_cita);
		return Database::executeRow($sql, $params);
	}

	public function updateEstadocita()
	{
		$sql = 'UPDATE cita SET id_estado = 1 WHERE cita.id_cita = ?';
		$params = array($this->id_cita);
		return Database::executeRow($sql, $params);
	}
	
	//Consulta para el reporte de receta 

	public function reporteReceta1($id)
	{
		$sql = 'SELECT d.nombre_doctor, d.apellido_doctor, c.receta, p.nombre_paciente, p.apellido_paciente from doctores d, consulta c, pacientes p where d.id_doctor=c.id_doctor and c.id_paciente= ? and p.id_paciente =?';
		$params = array($id,$id);
		return Database::getRows($sql, $params);
	}

	public function checkCorreo()
	{
		$sql = 'SELECT correo_doctor FROM doctores WHERE correo_doctor=? LIMIT 1';
		$params = array($this->correo);
		return Database::getRow($sql, $params);
	}

	public function tokensito()
	{
		$sql = 'UPDATE doctores set token_doctor = ? where correo_doctor = ?';
		$params = array($this->token, $this->correo);
		return Database::executeRow($sql, $params);
	}
	
	public function getDatosTokensito()
	{
		$sql = 'SELECT id_doctor FROM doctores WHERE token_doctor = ?';
		$params = array($this->token);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id_doctor'];
			return true;
		} else {
			return false;
		}
	}

	public function blockAccount()
	{
		$sql = 'UPDATE doctores set cuenta_bloqueada = ? WHERE usuario_doctor = ?';
		$params = array(date('Y-m-d'), $this->getUsuario());
		$data = Database::executeRow($sql, $params);
		if ($data) {
			return true;
		} else {
			return false;
		}
	}

	public function createDoctores()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO doctores(nombre_doctor, apellido_doctor, correo_doctor, usuario_doctor, contrasena_doctor, fecha_nacimiento, id_estado, is_sesion) VALUES(?, ?, ?, ?, ?, ?, 0, 2)';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash, $this->fecha);
		if(Database::executeRow($sql, $params)) {
			$sql = 'UPDATE doctores SET clave_actualizada = ? WHERE id_doctor = ?';
			$params = array(date('Y-m-d'), Database::getLastRowId());
			return Database::executeRow($sql, $params);
		} else {
			return false;
		}
	}

	//AUTENTIFICAR
	public function setTokenAutenticacion()
	{
		$sql = 'UPDATE doctores SET autenticar_doctor = ? WHERE usuario_doctor = ?';
		$params = array($this->token, $this->alias);
		return Database::executeRow($sql, $params);
	}

	public function deleteTokenAutenticacion()
	{
		$sql = 'UPDATE doctores SET autenticar_doctor = null WHERE id_doctor = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function getTokenAutenticacion()
	{
		$sql = 'SELECT id_doctor, nombre_doctor, apellido_doctor, usuario_doctor, correo_doctor FROM doctores WHERE autenticar_doctor = ?';
		$params = array($this->token);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id_doctor'];
			$this->nombre = $data['nombre_doctor'];
			$this->apellido = $data['apellido_doctor'];
			$this->alias = $data['usuario_doctor'];
			$this->correo = $data['correo_doctor'];
			return true;
		} else {
			return false;
		}
	}

	public function autenticarEstado()
		{
			$sql = 'UPDATE doctores SET id_estado = 1 where id_doctor = ?';
			$params = array($this->id);
			return Database::executeRow($sql, $params);
		}
}
?>
