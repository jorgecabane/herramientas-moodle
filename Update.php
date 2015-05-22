<?php
include "conexiondb.php";
$id=$_POST['id'];
$nombre=$_POST['nombre'];
        $codigo=$_POST['codigo'];
        $stock=$_POST['stock'];
        $disponible=$_POST['disponible'];
        $categoria=$_POST['categoria'];


$query="update Herramientas SET Nombre='$nombre', Codigo='$codigo', Stock='$stock', Disponible='$disponible', Categoria='$categoria' Where idHerramientas='$id'";
$resultado = mysql_query($query) or die(mysql_error());

if($resultado){
    ?>
    <meta http-equiv="Refresh" content="1;url=index.php">
    <?php
}

?>
