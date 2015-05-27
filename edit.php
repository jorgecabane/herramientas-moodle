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


include "conexiondb.php";
$id=$_POST['id'];
?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css/style.css">
        
    </head>
    <body>
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT * from Herramientas Where idHerramientas=$id") or die(mysql_error());
$hola=  mysql_fetch_assoc($resultado);

            $nombre=$hola['Nombre'];
            $codigo=$hola['Codigo'];
            $stock=$hola['Stock'];
            $disponible=$hola['Disponible'];
            $categoria=$hola['Categoria'];
            $id=$hola['idHerramientas'];
            
if($resultado){

echo "<table cellspacing='0'>"; 
echo "<tr class='even'>";
  echo  "<td>Nombre</td>";
  echo  "<td>Codigo</td>" ;
  echo  "<td>Stock</td>";
  echo  "<td>Disponible</td>" ;
  echo  "<td>Categoria</td>";

  echo  "</tr>" ;

    
?>
    
   <form action="update.php" method="POST">

  <tr>
  <td><input type="text" name="nombre"  value="<?php echo $nombre; ?>" required></td>
  <td><input type="number" name="codigo"  value="<?php echo $codigo; ?>" required></td>
  <td><input type="number" name="stock"  value="<?php echo $stock; ?>" required></td>
  <td><input type="number" name="disponible"  value="<?php echo $disponible; ?>" required></td>
  <td><input type="text" name="categoria"  value="<?php echo $categoria; ?>" required></td>
<?php     
     
  echo  "</tr>" ;
 
  

};
echo "</table>";
;?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="submit" value="Editar">
</form>
  <br><br>
  <form action="index.php">
                <input type="submit" value="Cancelar">
</form>






<?php

//hasta aqui llega el body
   
echo $OUTPUT->footer (); //shows footer 