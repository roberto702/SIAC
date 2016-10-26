<?php
 		session_start();
		include_once('Connections/Local.php'); 
		include_once('Class/funciones.php'); 
		include_once('Class/class_alumnos.php');
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){
		}else{
			header('location:error.php');
		}
		
		$id='';					$existe=FALSE;			$titulo='Registrar Alumnos';
		$nombre='';				$apellido='';			$rut='';			$telefono='';
		$fechan=date('Y-m-d');	$email='';				$curso='';			$estado_civil='';
		$director='';			$vive_con='';			$grado='';			$barrio='';
		$dibu='<img src="alumnos/defecto.jpg" width="100" height="100">';
		
		if(!empty($_GET['doc'])){
			$doc=limpiar($_GET['doc']);
			$sql=mysql_query("SELECT * FROM alumnos WHERE rut='$doc'");
			if($row=mysql_fetch_array($sql)){
				$id=$row['id'];						$existe=TRUE;
				$nombre=$row['nombre'];				$apellido=$row['apellido'];			$rut=$row['rut'];					$telefono=$row['telefono'];
				$fechan=$row['fechan'];				$email=$row['email'];				$curso=$row['curso'];				$estado_civil=$row['estado_civil'];
				$director=$row['maestro'];			$vive_con=$row['vive_con'];			$grado=$row['grado'];				$barrio=$row['domicilio'];
				$titulo='Actualizar Alumno "'.$nombre.' '.$apellido.'"';
				
				if (file_exists("alumnos/".$rut.".jpg")){
					$dibu='<img src="alumnos/'.$rut.'.jpg" width="100" height="100" class="img-circle img-polaroid">';
				}else{
					$dibu='<img src="alumnos/defecto.jpg" width="100" height="100">';
				}
				
			}else{
				header('Location: alumnos.php');
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/application.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
<div align="center">
    <table width="90%">
      <tr>
        <td>
        
		<?php 
            if(!empty($_POST['nombre'])){
                $nombre=limpiar($_POST['nombre']);			$apellido=limpiar($_POST['apellido']);
                $rut=limpiar($_POST['rut']);				$telefono=limpiar($_POST['telefono']);
                $fechan=limpiar($_POST['fechan']);			$email=limpiar($_POST['email']);
                $curso=limpiar($_POST['curso']);			$estado_civil=limpiar($_POST['estado_civil']);
                $director=limpiar($_POST['maestro']);		$vive_con=limpiar($_POST['vive_con']);
                $grado=limpiar($_POST['grado']);			$barrio=limpiar($_POST['domicilio']);
                
                if($existe==FALSE){
                    $oProceso=new Proceso_Alumnos('',$nombre,$apellido,$rut,$telefono,$fechan,$email,$curso,$director,$vive_con,$barrio,$estado_civil,$grado);						
                    $oProceso->crear();
                
                    //subir la imagen del articulo
                    $nameimagen = $_FILES['imagen']['name'];
                    $tmpimagen = $_FILES['imagen']['tmp_name'];
                    $extimagen = pathinfo($nameimagen);
                    $ext = array("png","jpg");
                    $urlnueva = "alumnos/".$rut.".jpg";			
                    if(is_uploaded_file($tmpimagen)){
                        if(array_search($extimagen['extension'],$ext)){
                            copy($tmpimagen,$urlnueva);	
                        }else{
                            echo mensajes("Error al Cargar la Imagen","rojo");
                        }
                    }
                    
                    echo mensajes('El Alumno/a "'.$nombre.' '.$apellido.'" Ha Sido Registrado Con Exito','verde');
                }elseif($existe==TRUE){
                    $idd=limpiar($_POST['id']);
                    $oProceso=new Proceso_Alumnos($idd,$nombre,$apellido,$rut,$telefono,$fechan,$email,$curso,$director,$vive_con,$barrio,$estado_civil,$grado);
                    $oProceso->actualizar();
                    
                    //subir la imagen del articulo
                    $nameimagen = $_FILES['imagen']['name'];
                    $tmpimagen = $_FILES['imagen']['tmp_name'];
                    $extimagen = pathinfo($nameimagen);
                    $ext = array("png","jpg");
                    $urlnueva = "alumnos/".$rut.".jpg";			
                    if(is_uploaded_file($tmpimagen)){
                        if(array_search($extimagen['extension'],$ext)){
                            copy($tmpimagen,$urlnueva);	
                        }else{
                            echo mensajes("Error al Cargar la Imagen","rojo");
                        }
                    }
                    
                    echo mensajes('El Alumno/a "'.$nombre.' '.$apellido.'" Ha Sido Actualizado Con Exito','verde');
                }
            }
        ?>
        	
            <table class="table table-bordered">
              <tr class="success">
                <td><h2 align="center"><?php echo $dibu.' '.$titulo; ?></h2></td>
              </tr>
            </table>
			
            <table class="table table-bordered">
              <tr>
                <td>
                	<form name="form1" enctype="multipart/form-data" method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                	<div class="row-fluid">
                        <div class="span6">
                        	<strong>Nombre del Alumno</strong><br>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Rut Alumno</strong><br>
                            <input type="text" name="rut" value="<?php echo $rut; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Fecha de Nacimiento</strong><br>
                            <input type="date" name="fechan" value="<?php echo $fechan; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Nombre Clase</strong><br>
                            <select name="curso" class="input-xxlarge">
								<?php
                                    $c=mysql_query("SELECT * FROM salones WHERE estado='s'");
                                    while($d=mysql_fetch_array($c)){
                                        if($d['id']==$curso){	
                                            echo '<option value="'.$d['id'].'" selected>'.$d['nombre'].'</option>';
                                        }else{
                                            echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
                                        }
                                    }
                                ?>
                            </select><br>
                            <strong>Vive con</strong><br>
                            <input type="text" name="vive_con" value="<?php echo $vive_con; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Nombre Maestro</strong><br>
                            <input type="text" name="maestro" value="<?php echo $director; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Fotografia o Imagen</strong><br>
                            <input type="file" name="imagen"><br>
                        </div>
                        <div class="span6">
	                        <strong>Apellido del Alumno</strong><br>
                            <input type="text" name="apellido" value="<?php echo $apellido; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Telefono / Celulares</strong><br>
                            <input type="text" name="telefono" value="<?php echo $telefono; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Correo Electronico</strong><br>
                            <input type="text" name="email" value="<?php echo $email; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Grado</strong><br>
                            <input type="text" name="grado" value="<?php echo $grado; ?>" required class="input-xxlarge" autocomplete="off"><br>
                            <strong>Estado Civil</strong><br>
                            <select name="estado_civil" class="input-xxlarge">
							 <?php
							 	$c=mysql_query("SELECT * FROM estadocivil WHERE con_estado='s'");
									while($d=mysql_fetch_array($c)){
										if($d['id_estado']==$estado_civil){
												echo '<option value="'.$d['id_estado'].'" selected>'.$d['nom_estado'].'</option>';
										}else{
												echo '<option value="'.$d['id_estado'].'">'.$d['nom_estado'].'</option>';
										}		
							
									}
							   ?>
							</select><br>
                            <strong>Domicilio</strong><br>
                            <input type="text" name="domicilio" value="<?php echo $barrio; ?>" required class="input-xxlarge" autocomplete="off"><br><br>
                            <button type="submit" class="btn btn-success"><strong>Registrar</strong></button>
                            <a href="crear_alumno.php" class="btn"><strong>Cancelar</strong></a>
                        </div>
                    </div>
                    </form>
                </td>
              </tr>
            </table>
        
        </td>
      </tr>
    </table>
</div>
</body>
</html>