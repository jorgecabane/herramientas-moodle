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

//include "conexiondb.php";
//$resultado = mysql_query("SELECT * from mdl_local_herramientas order by Nombre asc") or die(mysql_error());

$resultado=$DB->get_records_sql("SELECT * from mdl_local_herramientas order by Nombre asc");

if($resultado){

echo "<table cellspacing='0'>"; 
echo "<tr class='even'>";
  echo  "<td>Nombre</td>";
  echo  "<td>Codigo</td>" ;
  echo  "<td>Stock</td>";
  echo  "<td>Disponible</td>" ;
  echo  "<td>Categoria</td>";
  echo  "<td>Editar</td>";
  echo  "<td>Eliminar</td>";
  echo  "</tr>" ;
//while ($row = mysql_fetch_array($resultado)) {
    foreach($resultado as $row){

    
   
  echo "<tr>";
  echo  "<td>" . $row->nombre . "</td>";
  echo  "<td>" . $row->codigo . "</td>" ;
  echo  "<td>" . $row->stock . "</td>";
  echo  "<td>" . $row->disponible . "</td>" ;
  echo  "<td>" . $row->categoria . "</td>";
  ?>
  
<link rel="stylesheet" href="styles.css/style.css">
            <td>
     <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row->idherramientas; ?>" />
        <input type="submit" value="Editar" />
     </form>
 </td>
 <td>
     <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row->idherramientas; ?>" />
        <input type="submit" value="Eliminar" />
     </form>
     </td>
     
<?php     
     
  echo  "</tr>" ;
 
  

};
echo "</table>";
};?>
<form action="guardar.php">
                <input type="submit" value="Agregar Inventario">
</form>






<?php

//hasta aqui llega el body
   
echo $OUTPUT->footer (); //shows footer 
