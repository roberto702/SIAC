<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SiAC - Sistema de Aministraci&oacute;n y Control</title>
<meta charset="utf-8">
 <style type="text/css"> body {margin-left:30px; font-family: sans-serif;} h4 {margin:0;} div {float:left;}
.estiloForm, #encuadraImagen, #datos {background-color: #f3f3f3; border: solid 2px black; margin-left:10px; width:300px; }
 .estiloForm{ width: 330px; padding:10px;} #datos {margin-top: 20px; height:226px; padding:10px;}
#encuadraImagen {width:100px; height:100px; text-align:center;}
 .estiloForm label {display: block; width: 120px; float: left; text-align:right; margin-bottom: 35px; padding-right: 20px;}
 br {clear: left;} input[type="submit"], input[type="reset"] {margin:25px 5px 10px 5px;}
 </style>
<script type="text/javascript">
window.onload = function () {
 /* Variables globales (por estar declaradas sin var) */
 casillaDatos = document.getElementById('datos'); //Nodo donde vamos a mostrar los datos
 radioButTrat = document.getElementsByName("tratamiento"); //Nodos radio buttons
 checkboxElements = new Array();

 var elementosDelForm = document.getElementsByTagName('input'); //Elementos input
 var elementosSelect = document.getElementsByTagName('select');
 for(var i=0; i<elementosDelForm.length;i++) {
 if (elementosDelForm[i].type == 'radio') {elementosDelForm[i].addEventListener("click", actualizarDatos);}
 else {elementosDelForm[i].addEventListener("change", actualizarDatos);}
 if (elementosDelForm[i].type == 'checkbox') {checkboxElements.push(elementosDelForm[i]);}
 }
 for (var i=0; i<elementosSelect.length;i++) {elementosSelect[i].addEventListener("change", actualizarDatos);}
} 

function actualizarDatos() {
var rutaImagen = '';
var radioButSelValue = '';
for (var i=0; i<radioButTrat.length; i++) {if (radioButTrat[i].checked == true) { radioButSelValue= radioButTrat[i].value;} }
if (radioButSelValue != ''){
 if (radioButSelValue =='Sr.') {rutaImagen='caraHombre.jpg';} else {rutaImagen='caraMujer.jpg';}
 document.getElementById('encuadraImagen').innerHTML = '';
 document.getElementById('encuadraImagen').style.background='url("'+rutaImagen+'") no-repeat';
}
var checkBoxSel = new Array();
for (var i=0; i<checkboxElements.length;i++) {
if (checkboxElements[i].checked ==true) {checkBoxSel.push(checkboxElements[i].name);}
}
var elementoCiudad = document.getElementById('ciudad');
var elementoClase = document.getElementById('clase');
casillaDatos.innerHTML='<h4> Datos introducidos: </h4><p>Tratamiento: '+(radioButSelValue||' --- ')+'</p>'+
'<p>Nombre: '+document.getElementById('nombre').value+'</p>'+
'<p>Apellidos: ' + (document.getElementById('apellidos').value||' --- ')+'</p>'+
'<p>Dirección: ' + (document.getElementById('direccion1').value||' --- ')+'</p>'+
'<p>Ciudad: ' + (elementoCiudad.options[elementoCiudad.selectedIndex].text||' --- ')+'</p>'+
'<p>Clase: ' + (elementoClase.options[elementoClase.selectedIndex].text||' --- ')+'</p>'+
'<p>Preferencias: ' + (checkBoxSel||' --- ')+'</p>';
}
</script>
</head>
<h2>Registro de Alumnos</h2><h3></h3>
<body>


<table width="67%" height="270" border="3">
<tr align="left" bordercolor="#F0F0F0">
  <td>


 <div class="estiloForm">
 <form name ="formularioContacto" method="get" action="#">
 <label> 
 <div align="left">Hermano o Hermana</div>
 </label>
 <input type="radio" name="tratamiento" id="tratarSr" value="Sr."/>Sr.
 <input type="radio" name="tratamiento" id ="tratarSra" value="Sra."/>Sra.<br/>
 <label>Nombre</label><input id="nombre" name="nombre" type="text"/><br/>
 <label>Apellidos</label><input id="apellidos" name="apellidos" type="text"/><br/>
 <label>Dirección</label>
 <input id="direccion1" name="direccion1" type="text"/><br/>
 <label>Ciudad</label><select id="ciudad" name="ciudad">
   <option value="">Elija opci&oacute;n</option>
   <option value="Quilpu&eacute;">Quilpu&eacute;</option>
   <option value="Villa Alemana">Villa Alemana</option>
   <option value="Vi&ntilde;a del Mar">Vi&ntilde;a del Mar</option>
   <option value="Belloto Centro">Belloto Centro</option>
   <option value="Belloto Sur">Belloto Sur</option>
   <option value="Belloto Norte">Belloto Norte</option>
 </select><br/>
<label>Clase</label>
<select id="clase" name="clase">
   <option value="">Elija opci&oacute;n</option>
   <option value="Samuel;">Samuel;</option>
   <option value="David">David</option>
   <option value="Ester">Ester</option>
   <option value="Joel">Joel</option>
   <option value="Timoteo">Timoteo</option>
   <option value="Gedeon">Gedeon</option>
   <option value="Daniel">Daniel</option>
   <option value="Josue">Josue</option>
   <option value="Caleb">Caleb</option>
   <option value="Abraham">Habraham</option>
   
 </select><br/>

 <label>Preferencias</label><input name="Libros" type="checkbox" />Libros
 <input name="Peliculas" type="checkbox" />Películas
 <input type="submit" value="Enviar"/> <input type="reset" value="Cancelar"/>
 </form>
 </div>
 <div style="float:left;">
 <div id="encuadraImagen"><h1> ? </h1></div> <br/>
 <div id="datos" style="float:left;"><h4> Datos introducidos: </h4></div>
 </div>
 	</td>
  </tr>
</table>
<p>
  <label>
  <a href="principal.php"><button>Regresar</button></a> 
  </label>
</p>
</body></html> 

   
