<?php
class Buscador {
var $host='https://mysql.robertoadvance.dreamhosters.com', $user='robertoadvance', $pass='3KZTb?SQ', $db='robertoadvance1', $c_servidor='Se conecto con el servidor correctamente',$i_servidor='No se conecto con el servidor', $c_DB='Se selecciono correctamente la DB', $i_DB='No se selecciono la DB';


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
