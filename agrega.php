<?php
include('conexiondb.php');
$nombre=$_POST['nombre'];
$codigo=$_POST['codigo'];
$stock= $_POST['stock'];
$categoria= $_POST['categoria'];
if(isset($_POST['nombre']))
{

mysql_query("insert into mdl_local_herramientas values (NULL,'$nombre',$codigo,$stock,$stock,'$categoria')");
$fetch= mysql_query("SELECT nombre,idherramientas FROM mdl_local_herramientas order by idherramientas desc");
$row=mysql_fetch_array($fetch);
}
?>

<div class="showbox"> <?php 
echo"Agregaste:";

echo $row['nombre']; ?> </div>