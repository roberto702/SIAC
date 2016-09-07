<?php require_once('Connections/Local.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
$_bandera = 0;
//$_bandera = $_GET['bandera'];

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "principal.php";
  
  $MM_redirectLoginFailed = "login.php?bandera=1";
  $MM_redirecttoReferrer = false; //true
  mysql_select_db($database_Local, $Local);
  
  $LoginRS__query=sprintf("SELECT user, password FROM login WHERE user='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $Local) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
	  
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed ); //redirige y recarga la página
  }
  

 
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/2000/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SiAC - Sistema de Administraci&oacute;n y Control</title>
<link href="estilo_1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {color: #0000A0}
-->
</style>

<script language="javascript">
function msg() {
alert ("Usuario no Existe")
}
</script>


</head>

<body>

<table width="607" height="253" border="1" align="center">
  <tr>
    <td width="573" height="51"><div align="center">
      <h2><strong>Iniciar Sesi&oacute;n </strong></h2>
	  <?php if($_bandera==1){
	    msg();
		echo "<p>Usuario no Existe</p>";
	}
	?>
    </div></td>
  </tr>
  <tr>
    <td><p>Usuario: 
    </p>
      <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
	   <p>
        <label for="textfield"></label>
		<input type="text" name="textfield" id="textfield" maxlength="15" checked="checked" />
        </p>
		
       <p>Contrase&ntilde;a: </p>
	   <label for="textfield2"></label>
	   <p>
	     <input type="password" name="textfield2" id="textfield2" maxlength="8" checked="checked"/>
	   </p>
	   <p>
	     <input type="submit" name="submit" value="Iniciar Sesión" />
	</p>
      </form>    
    </td>
  </tr>
</table>
<p align="center" class="Estilo1">Departamento Escuela Dominical - Asambleas de Dios - Iglesia Quilp&uacute;e Los Carrera </p>
<p>&nbsp;</p>
</body>

</html>
