<?php
class Doctores extends Validators
{
    //Declaración de variables a utilizar
    private $iddoctor = null;
    private $nombre = null;
    private $apellido = null;
    private $correo = null;
    private $usuario = null;
    private $clave = null;
    private $fecha = null;
    private $foto = null;
    private $calificacion = null;
    private $idespecialidad = null;
    private $idestado = null;
    private $ruta = '../../resources/img/doctores/';
}
	//Métodos para la sobre carga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->iddoctor = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->iddoctor;
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
    public function setFecha()
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
    
    public function setCalificacion($value)
	{
		if ($value >= 1 && $value <= 5) {
			$this->calificacion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCalificacion()
	{
		return $this->calificacion;
	}
