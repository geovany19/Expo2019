<?php
class Usuarios extends Validator
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
	private $ruta = '../../../resources/img/usuarios/';
	private $idestado = null;

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
		if ($this->validatePassword($value)) {
			$this->clave = $value;
			return true;
		} else {
			return false;
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
		if ($this->validateId($value)) {
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

	// Métodos para manejar la sesión del usuario
	public function checkUser()
	{
		$sql = 'SELECT id_usuario FROM usuarios_a WHERE usuario_usuario = ?';
		$params = array($this->usuario);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->idusuario = $data['id_usuario'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasena_usuario FROM usuarios_a WHERE id_usuario = ?';
		$params = array($this->idusuario);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->clave, $data['contrasena_usuario'])) {
			return true;
		} else {
			return false;
		}
	}

	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE usuarios_a SET contrasena_usuario = ? WHERE id_usuario = ?';
		$params = array($hash, $this->idusuario);
		return Database::executeRow($sql, $params);
	}

	//Métodos para manejar el CRUD
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
		$sql = 'INSERT INTO usuarios_a(nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario, contrasena_usuario, fecha_nacimiento, foto_usuario, id_estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido, $this->correo, $this->usuario, $hash, $this->fecha, $this->foto, $this->idestado);
		return Database::executeRow($sql, $params);
	}

	public function getUser()
	{
		$sql = 'SELECT id_usuario, nombre_usuario, apellido_usuario, correo_usuario, usuario_usuario, contrasena_usuario, fecha_nacimiento, foto_usuario FROM usuarios_a WHERE id_usuario = ?';
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
}
