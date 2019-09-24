<?php
class Usuario extends Validator
{
	//Declaración de variables a utilizar
	private $idusuario = null;
	private $nombre = null;
	private $apellido = null;
	private $correo = null;
	private $usuario = null;
	private $clave = null;
	private $fecha = null;
	private $foto = null;
	private $ruta = '../../../resources/img/dashboard/usuarios/';
	private $idestado = null;
	private $intentos = null;
	private $token = null;
	private $sesion = null;
	private $pin = null;

	//Métodos para la sobre carga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->idusuario = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->idusuario;
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

	public function setUsuario($value)
	{
		if ($this->validateAlphanumeric($value, 1, 25)) {
			$this->usuario = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getUsuario()
	{
		return $this->usuario;
	}

	public function setClave($value)
	{
		$validator = $this->validatePassword($value);
        if ($validator[0]) {
            $this->clave = $value;
            return array(true, '');
        } else {
            return array(false, $validator[1]);
        }
	}

	public function getClave()
	{
		return $this->clave;
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

	public function setFoto($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->foto = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getFoto()
	{
		return $this->foto;
	}

	public function getRuta()
	{
		return $this->ruta;
	}

	public function setEstado($value)
	{
		if ($value == '1' || $value == '0') {
			$this->idestado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEstado()
	{
		return $this->idestado;
	}

	public function setIntentos($value)
	{
		if ($this->validateNumeric($value)) {
			$this->intentos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIntentos()
	{
		return $this->intentos;
    }

    public function setToken($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 32)) {
            $this->token = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getToken()
    {
        return $this->token;
	}
	
	public function setSession($value)
	{
		if ($value == '1' || $value == '2') {
			$this->sesion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getSession()
	{
		return $this->sesion;
	}

	public function setPin($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 32)) {
            $this->pin = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getPin()
    {
        return $this->pin;
	}

	// Métodos para manejar la sesión del usuario
	public function checkUser()
	{
		$sql = 'SELECT id_usuario, cuenta_bloqueada, id_sesion FROM usuarios_a WHERE usuario_usuario = ? LIMIT 1';
		$params = array($this->usuario);
		$data = Database::getRow($sql, $params);
		$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
		$nueva_fecha = strtotime (date($data['cuenta_bloqueada']) .'+ 24 hours'  );
		//$estado_sesion = $data['id_sesion'];
		if ($data) {
			if($data['cuenta_bloqueada']) {
				if($fecha_actual<$nueva_fecha) {
					$this->idusuario = $data['id_usuario'];	
					return 2;
				} else {
					$this->idusuario = $data['id_usuario'];				
					return 1;
				}
			} else {
				$this->idusuario = $data['id_usuario'];				
				return 1;
			}
		} else {
			return 0;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasena_usuario, clave_actualizada, id_sesion, id_estado FROM usuarios_a WHERE id_usuario = ?';
		$params = array($this->idusuario);
		$data = Database::getRow($sql, $params);
		$fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
		$nueva_fecha = strtotime(date($data['clave_actualizada']).'+ 90 days') ;
		if (password_verify($this->clave, $data['contrasena_usuario'])) {
			if ($fecha_actual>$nueva_fecha) {
				return 1;
			} else {
				if ($data['id_sesion'] == 2 && $data['id_estado'] == 1) {
					return 2;
				} else if ($data['id_sesion'] == 1) {
					return 3;
				} else if ($data['id_estado'] == 0) {
					return 4;
				}
			}	
		} else {
			return 0;
		}
	}

	public function checkCorreo()
	{
		$sql = 'SELECT correo_usuario from usuarios_a where correo_usuario = ?';
		$params = array($this->correo);
		return Database::getRow($sql, $params);
	}

	public function setTokenAutenticacion()
	{
		$sql = 'UPDATE usuarios_a SET autenticar_usuario = ? WHERE usuario_usuario = ?';
		$params = array($this->token, $this->usuario);
		return Database::executeRow($sql, $params);
	}

	public function deleteTokenAutenticacion()
	{
		$sql = 'UPDATE usuarios_a SET autenticar_usuario = null WHERE id_usuario = ?';
		$params = array($this->idusuario);
		return Database::executeRow($sql, $params);
	}

	public function getTokenAutenticacion()
	{
		$sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, usuario_usuario, correo_usuario FROM usuarios_a WHERE autenticar_usuario = ?';
		$params = array($this->token);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->idusuario = $data['id_usuario'];
			$this->nombre = $data['nombre_usuario'];
			$this->apellido = $data['apellido_usuario'];
			$this->usuario = $data['usuario_usuario'];
			$this->correo = $data['correo_usuario'];
			return true;
		} else {
			return false;
		}
	}

	public function autenticarEstado()
		{
			$sql = 'UPDATE usuarios_a SET id_estado = 1 where id_usuario = ?';
			$params = array($this->idusuario);
			return Database::executeRow($sql, $params);
		}

	public function blockAccount()
	{
		$sql = 'UPDATE usuarios_a set cuenta_bloqueada = ? WHERE usuario_usuario = ?';
		$params = array(date('Y-m-d'), $this->getUsuario());
		$data = Database::executeRow($sql, $params);
		if ($data) {
			return true;
		} else {
			return false;
		}
	}

	public function checkTipo()
	{
		$sql = 'SELECT usuarios_a.id_usuario FROM usuarios_a WHERE usuario_usuario = ? GROUP BY usuarios_a.id_usuario LIMIT 1';
		$params = array($this->usuario);
		$data = Database::getRows($sql, $params);
		if ($data) {
			return true;
		} else {
			return false;
		}
	}

	//Método para setear el estado de la sesión en línea, recibe el id y el nombre de usuario
	public function setOnline()
	{
		$sql = 'UPDATE usuarios_a SET id_sesion = ? WHERE usuario_usuario = ?';
		$params = array(1, $this->usuario);
		Database::executeRow($sql, $params);
	}

	//Método para setear 
	public function setOffline()
	{
		$sql = 'UPDATE usuarios_a SET id_sesion = ? WHERE id_usuario = ?';
		$params = array(2, $_SESSION['idUsuario']);
		Database::executeRow($sql, $params);
	}

	//Método para restablecer la sesion en caso permanezca activa
	public function restoreSession()
	{
		$sql = 'UPDATE usuarios_a SET id_sesion = ? WHERE usuario_usuario = ?';
		$params = array(2, $this->usuario);
		Database::executeRow($sql, $params);
	}

	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE usuarios_a SET contrasena_usuario = ? WHERE id_usuario = ?';
		$params = array($hash, $this->idusuario);
		return Database::executeRow($sql, $params);
	}

	//Métodos para manejar el CRUD
	public function getUsuarios()
	{
		$sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario, fecha_nacimiento, foto_usuario, id_estado FROM usuarios_a ORDER BY apellido_usuario';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function readUsuarios()
	{
		$sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario, fecha_nacimiento, foto_usuario, id_estado FROM usuarios_a ORDER BY apellido_usuario';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchUsuario($value)
	{
		$sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario FROM usuarios_a WHERE apellido_usuario LIKE ? OR nombre_usuario LIKE ? ORDER BY apellido_usuario';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createUsuario()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO usuarios_a(nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario, contrasena_usuario, fecha_nacimiento, foto_usuario, id_estado, id_sesion) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $hash, $this->fecha, $this->foto, 0, 2);
		return Database::executeRow($sql, $params);
	}

	public function getUser()
	{
		$sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario, contrasena_usuario, fecha_nacimiento, foto_usuario, id_estado FROM usuarios_a WHERE id_usuario = ? LIMIT 1';
		$params = array($this->idusuario);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE usuarios_a SET nombre_usuario = ?, apellido_usuario = ?, correo_usuario = ?, usuario_usuario = ?, fecha_nacimiento = ?, foto_usuario = ?, id_estado = ? WHERE id_usuario = ?';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $this->fecha, $this->foto, $this->idestado, $this->idusuario);
		return Database::executeRow($sql, $params);
	}

	public function updatePerfil()
	{
		$sql = 'UPDATE usuarios_a SET nombre_usuario = ?, apellido_usuario = ?, correo_usuario = ?, usuario_usuario = ?, fecha_nacimiento = ?, foto_usuario = ? WHERE id_usuario = ?';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $this->fecha, $this->foto, $this->idusuario);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM usuarios_a WHERE id_usuario = ?';
		$params = array($this->idusuario);
		return Database::executeRow($sql, $params);
	}

	public function tokensito()
	{
		$sql = 'UPDATE usuarios_a SET token_usuario = ? WHERE correo_usuario = ?';
		$params = array($this->token, $this->correo);
		return Database::executeRow($sql, $params);
	}
	
	public function getDatosTokensito()
	{
		$sql = 'SELECT id_usuario FROM usuarios_a WHERE token_usuario = ? LIMIT 1';
		$params = array($this->token);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->idusuario = $data['id_usuario'];
			return true;
		} else {
			return false;
		}
	}



	/*public function changePasswordByToken()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET contrasena_usuario = ? WHERE token_usuarios = ?';
        $params = array($hash, $this->token);
        return Database::executeRow($sql, $params);
	}
	
	public function getUserByToken()
	{
		$sql = 'SELECT id_usuario FROM usuarios WHERE token_usuarios = ?';
		$params = array($this->token);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->idusuario = $data['IdUsuario'];
			return true;
		} else {
			return false;
		}
	}
	
	public function updateToken()
	{
		$sql = 'UPDATE usuarios SET token_usuarios = ? WHERE correo_usuario = ?';
		$params = array($this->token, $this->email);
		return Database::executeRow($sql, $params);
    }
    
    public function getEmailUser()
	{
		$sql = 'SELECT correo_usuario FROM usuarios WHERE correo_usuario = ?';
		$params = array($this->email);
		return Database::getRow($sql, $params);
	}*/
}
