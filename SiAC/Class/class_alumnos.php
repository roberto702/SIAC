<?php
include_once('Connections/Local.php');

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
	var $id;			var $folio;			var $nombre;		var $curso;
	var $apellido;		var $director;		var $rut;			var $pension;
	var $telefono;		var $barrio;		var $fechan;		var $sangre;		var $grado;
		
	function __construct($id,$nombre,$apellido,$rut,$telefono,$fechan,$folio,$curso,$director,$pension,$barrio,$sangre,$grado){
		$this->id=$id;						$this->folio=$folio;
		$this->nombre=$nombre;				$this->curso=$curso;
		$this->apellido=$apellido;			$this->maestro=$director;
		$this->rut=$rut;					$this->pension=$pension;
		$this->telefono=$telefono;			$this->domicilio=$barrio;
		$this->fechan=$fechan;				$this->estado=$sangre;
		$this->grado=$grado;	
							
	}
		
	function crear(){
		$id=$this->id;						$folio=$this->folio;
		$nombre=$this->nombre;				$curso=$this->curso;		
		$apellido=$this->apellido;			$director=$this->maestro;
		$rut=$this->rut;					$pension=$this->pension;
		$telefono=$this->telefono;			$barrio=$this->domicilio;
		$fechan=$this->fechan;				$sangre=$this->estado;
		$grado=$this->grado;
			
		mysql_query("INSERT INTO alumnos (nombre, apellido, rut, telefono, fechan, folio, curso, estado, maestro, pension, domicilio, estado) 
				VALUES ('$nombre','$apellido','$rut','$telefono','$fechan','$folio','$curso','s','$director','$pension','$barrio','$sangre')");
	}
	
	function actualizar(){
		$id=$this->id;						$folio=$this->folio;
		$nombre=$this->nombre;				$curso=$this->curso;		
		$apellido=$this->apellido;			$director=$this->maestro;
		$rut=$this->rut;					$pension=$this->pension;
		$telefono=$this->telefono;			$barrio=$this->domicilio;
		$fechan=$this->fechan;				$sangre=$this->estado;
		$grado=$this->grado;
		
		mysql_query("Update alumnos Set	nombre='$nombre',
										apellido='$apellido',
										rut='$rut',
										telefono='$telefono',
										fechan='$fechan',
										folio='$folio',
										curso='$curso',
										maestro='$director',
										pension='$pension',
										domicilio='$barrio',
										estado='$sangre',
										grado='$grado'
									Where id=$id");
	}	
}
?>