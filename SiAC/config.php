<?php
class Buscador {
var $host='localhost', $user='root', $pass='', $db='eedd', $c_servidor='Se conecto con el servidor correctamente',$i_servidor='No se conecto con el servidor', $c_DB='Se selecciono correctamente la DB', $i_DB='No se selecciono la DB';


function Conectar()
{
	if (!@mysql_connect($this->host,$this->user,$this->pass))
	{

		print $this->i_servidor;

	 } else {
			if (!@mysql_select_db($this->db)){
			  print $this->i_DB;
			
			} 
	
		}
   }

}
$c = new Buscador;
$c->Conectar();
?>
