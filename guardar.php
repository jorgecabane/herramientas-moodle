<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * MOODLE VERSION INFORMATION
 *
 *
 * @package    local
 * @copyright  Jorge Cabané (jcabane@alumnos.uai.cl)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once (dirname (__FILE__) . '/../../config.php');
global $DB, $USER, $CFG;
require_login (); 
$baseurl = new moodle_url ('/local/herramientas/index2.php'); //clase pagina
$context = context_system::instance();
$PAGE->set_context( $context );
$PAGE->set_url( $baseurl );
$PAGE->set_pagelayout ( 'standard' );
$PAGE->set_title ( get_string ('title', 'local_herramientas') );
$PAGE->set_heading ( get_string ('title', 'local_herramientas') );
$PAGE->navbar->add( get_string('herramientas', 'local_herramientas') );
//$PAGE->navbar->add('index','reservar.php');
echo $OUTPUT->header (); //shows header 
//<link rel="stylesheet" href="css/style.css">

echo $OUTPUT->heading ( get_string ('title', 'local_herramientas'));
echo $USER->firstname . " " . $USER->lastname . "  -  " . $USER->email;
echo "<br>";
//test
/*
$user = $DB->get_record('user', array('id'=>'2'));
foreach($user as $data){
	echo $data . "<br>";
}
*/
//$table = 'local_fitness';
$email = $USER ->email;
//$result = $DB->get_records_sql('SELECT * FROM {local_fitness} WHERE email = ?', array($email));

//hasta aqui llega el header

?>

   <link href="styles.css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <div class="main">
    <h1>Agregue sus Herramientas</h1>

 
	
	<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" class="form-control" id="Nombre" placeholder="ej: Martillo" style="height: 23px;" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Codigo</label>
    <input type="number" class="form-control" id="Codigo" placeholder="Ingrese codigo de barra" style="height: 23px;" required>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Stock</label>
    <input type="number" id="Stock" class="form-control"  placeholder="Ingrese cantidad de Stock" style="height: 23px;" required>
 
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Categoría</label>
    <input type="text" id="Categoria" class="form-control"  placeholder="ej: Portatiles" style="height: 23px;" required>
 
  </div>
  
  <button type="submit" id="boton" class="btn btn-default">Submit</button>
   
</form>
    <br>
<form action="index.php">
                    <button type="submit" id="boton" class="btn btn-default">Volver al Inventario</button>
</form>
	 
	</div> <!-- container -->
	<div class="space"></div>
<div id="flash"></div>
<div id="show"></div>
</div>
	
	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	 $( document ).ready(function() {
	 $("#Nombre").focus();
	
	
$(function() {
$("#boton").click(function() {
var ssnombre = $("#Nombre").val();
var sscodigo = $("#Codigo").val();
var ssstock = $("#Stock").val();
var sscategoria = $("#Categoria").val();


$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "agrega.php",
data: { nombre: ssnombre,
        codigo: sscodigo,
		stock: ssstock,
		categoria: sscategoria

},
cache: true,
success: function(html){
$("#show").after(html);
document.getElementById('Nombre').value='';
document.getElementById('Codigo').value='';
document.getElementById('Stock').value='';
document.getElementById('Categoria').value='';
$("#flash").hide();
$("#Nombre").focus();
}  
});

return false;
});
});
	 });
	
	 
		</script>















<?php

//hasta aqui llega el body
   
echo $OUTPUT->footer (); //shows footer 