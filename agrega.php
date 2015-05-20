<?php
include('conexiondb.php');
$nombre=$_POST['nombre'];
$codigo=$_POST['codigo'];
$stock= $_POST['stock'];
$categoria= $_POST['categoria'];
if(isset($_POST['nombre']))
{

mysql_query("insert into Herramientas values (NULL,'$nombre',$codigo,$stock,$stock,'$categoria')");
$fetch= mysql_query("SELECT Nombre,idHerramientas FROM Herramientas order by idHerramientas desc");
$row=mysql_fetch_array($fetch);
}
?>

<div class="showbox"> <?php 
echo"Agregaste:";

echo $row['Nombre']; ?> </div>