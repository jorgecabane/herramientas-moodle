<?php
include "conexiondb.php";
$id=$_POST['id'];


$resultado = mysql_query("DELETE from mdl_local_herramientas Where idherramientas=$id") or die(mysql_error());

           
if($resultado){
    ?>
    <meta http-equiv="Refresh" content="1;url=index.php">
    <?php
}

?>
