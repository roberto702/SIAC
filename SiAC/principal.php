
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SiAC - Sistema de Administración y Control</title>
<script type="text/JavaScript">
function llamarAlumno()
{
location.href='formulario_alumno.php';
}

function llamarRegistrosemanal()
{
location.href='registro_semanal.php';
}

</script>
<style type="text/css">
body{
	background-color: #FFFFFF;
}
nav{
	/*Bordes redondeados*/
	-webkit-border-radius:10px;/*Para chrome y Safari*/
	-moz-border-radius:10px;/*Para Firefox*/
	-o-border-radius:10px;/*Para Opera*/
	border-radius:10px;/*El estandar por defecto*/
	background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#CCC));/*Para chrome y Safari*/
	/*Degradados*/
	background-image: -moz-linear-gradient(top center, #FFF, #CCC);/*Para Firefox*/
	background-image: -o-linear-gradient(top, #FFF, #CCC);/*Para Opera*/
	background-image: linear-gradient(top, #FFF, #CCC);/*El estandar por defecto*/
	overflow:hidden;
	padding:10px;
	width:950px;
}
nav ul{
	list-style:none;
	margin:0 10px 0 10px;
	padding:0;
}
nav ul li{
	/*Bordes redondeados*/
	-webkit-border-radius:5px;/*Chrome y Safari*/
	-moz-border-radius:5px;/*Firefox*/
	-o-border-radius:5px;/*Opera*/
	border-radius:5px;/*Estandar por defecto*/
	float:left;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
	margin-right:10px;
	text-align:center;
	/*Sombras para texto, los mismos parametros que box-shadow*/
	text-shadow: 0px 1px 0px #FFF;
}
nav ul li:hover{
	/*Degradado de fondo*/
	background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to( #E3E3E3));/*Chrome y Safari*/
	background-image: -moz-linear-gradient(top center, #FFF, #E3E3E3);/*Firefox*/
	background-image: -o-linear-gradient(top, #FFF, #E3E3E3);/*Opera*/
	background-image: linear-gradient(top, #FFF, #E3E3E3);/*Estandar por defecto*/
	/*Sombras para bloques o cajas*/
	-webkit-box-shadow:  1px -1px 0px #999;/*Chrome y Safari*/
	-moz-box-shadow:  1px -1px 0px #999;/*Firefox*/
	-o-box-shadow:  1px -1px 0px #999;/*Opera*/
	box-shadow:  1px -1px 0px #999;/*Estandar por defecto*/
	border:1px solid #E3E3E3;
}
nav ul li a{
	color:#999;
	display:block;
	padding:10px;
	text-decoration:none;
	/*Transiciones: Tiempo, Efecto y Propiedades aplicadas*/
	-webkit-transition: 0.4s linear all;/*Chrome y Safari*/
  	-moz-transition: 0.4s linear all;/*Firefox*/
  	-o-transition: 0.4s linear all;/*Opera*/
  	transition: 0.4s linear all;/*Estandar por defecto*/
}
nav ul li a:hover {
	color:#000;
}

</style>
</head>

<body>
 <div align="center">
	<nav>
    	<ul id="menu">
        	<li><a title="Modulo Asistencia" target="_parent" onClick="llamarRegistrosemanal()">Modulo Asistencia</a></li>
        	<li><a title="Modulo Tesoreria" href="#">Modulo Tesorería</a></li>
        	<li><a title="Modulo Clases" href="#">Modulo Clases</a></li>
			<li><a title="Modulo Alumnos" target="_parent" onClick="llamarAlumno()" >Modulo Alumnos</a></li>
			<li><a title="Modulo Maestros" href="#">Modulo Maestros</a></li>
			<li><a title="Salir" href="#">Salir</a></li>
        </ul>
	</nav>
</div>
</body>
</html>


