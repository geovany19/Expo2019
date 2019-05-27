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
		if ($this->validateAlphanumeric($value, 1, 50)) {
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
    
    // Métodos para manejar la sesión del usuario
	public function checkUser()
	{
		$sql = 'SELECT id_usuario FROM usuarios_a WHERE usuario_usuario = ?';
		$params = array($this->alias);
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
		if (password_verify($this->clave, $data['clave_usuario'])) {
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

	
}