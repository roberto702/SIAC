<?php
class Consultar_Salones{
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM salones WHERE id='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}
class Consultar_Alumnos{
	
	private $consulta;
	private $fetch;
	
	function __construct($codigo){
		$this->consulta = mysql_query("SELECT * FROM alumnos WHERE id=$codigo or rut='$codigo' or nombre='$codigo' or apellido='$codigo'");
		$this->fetch = mysql_fetch_array($this->consulta);
	}
	
	function consultar($campo){
		return $this->fetch[$campo];
	}
}

class Proceso_Salones{
	var $nombre;	var $curso;	var $id;
	
	function __construct($nombre, $curso, $id){
		$this->nombre = $nombre; 		$this->curso = $curso;		$this->id = $id;
	}
	
	function crear(){
		$nombre=$this->nombre;	$curso=$this->curso;
		mysql_query("INSERT INTO salones (nombre, curso, estado) VALUES ('$nombre','$curso','s')");
	}
	
	function actualizar(){
		$nombre=$this->nombre;	$curso=$this->curso;	$id=$this->id;
		mysql_query("Update salones Set	nombre='$nombre', curso='$curso' Where id=$id");
	}
	
	
}

class Proceso_Alumnos{
	var $id;			var $email;			var $nombre;		var $curso;
	var $apellido;		var $director;		var $rut;			var $vive_con;
	var $telefono;		var $barrio;		var $fechan;		var $estado_civil;		var $grado;
		
	function __construct($id,$nombre,$apellido,$rut,$telefono,$fechan,$email,$curso,$director,$vive_con,$barrio,$estado_civil,$grado){
		$this->id=$id;						$this->email=$email;
		$this->nombre=$nombre;				$this->curso=$curso;
		$this->apellido=$apellido;			$this->maestro=$director;
		$this->rut=$rut;					$this->vive_con=$vive_con;
		$this->telefono=$telefono;			$this->domicilio=$barrio;
		$this->fechan=$fechan;				$this->estado_civil=$estado_civil;
		$this->grado=$grado;	
							
	}
		
	function crear(){
		$id=$this->id;						$email=$this->email;
		$nombre=$this->nombre;				$curso=$this->curso;		
		$apellido=$this->apellido;			$director=$this->maestro;
		$rut=$this->rut;					$vive_con=$this->vive_con;
		$telefono=$this->telefono;			$barrio=$this->domicilio;
		$fechan=$this->fechan;				$estado_civil=$this->estado_civil;
		$grado=$this->grado;
			
		mysql_query("INSERT INTO alumnos (nombre, apellido, rut, telefono, fechan, email, curso, estado, maestro, vive_con, domicilio, estado_civil) 
				VALUES ('$nombre','$apellido','$rut','$telefono','$fechan','$email','$curso','s','$director','$vive_con','$barrio','$estado_civil')");
	}
	
	function actualizar(){
		$id=$this->id;						$email=$this->email;
		$nombre=$this->nombre;				$curso=$this->curso;		
		$apellido=$this->apellido;			$director=$this->maestro;
		$rut=$this->rut;					$vive_con=$this->vive_con;
		$telefono=$this->telefono;			$barrio=$this->domicilio;
		$fechan=$this->fechan;				$estado_civil=$this->estado_civil;
		$grado=$this->grado;
		
		mysql_query("Update alumnos Set	nombre='$nombre',
										apellido='$apellido',
										rut='$rut',
										telefono='$telefono',
										fechan='$fechan',
										email='$email',
										curso='$curso',
										maestro='$director',
										vive_con='$vive_con',
										domicilio='$barrio',
										estado_civil='$estado_civil',
										grado='$grado'
									Where id=$id");
	}	
}
?>