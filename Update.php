<?php
include "conexiondb.php";
$id=$_POST['id'];
$nombre=$_POST['nombre'];
        $codigo=$_POST['codigo'];
        $stock=$_POST['stock'];
        $disponible=$_POST['disponible'];
        $categoria=$_POST['categoria'];


$query="update mdl_local_herramientas SET nombre='$nombre', codigo='$codigo', stock='$stock', disponible='$disponible', categoria='$categoria' Where idherramientas='$id'";
$resultado = mysql_query($query) or die(mysql_error());

if($resultado){
    ?>
    <meta http-equiv="Refresh" content="1;url=index.php">
    <?php
}

?>
