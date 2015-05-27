<?php
include "conexiondb.php";


$resultado = mysql_query("SELECT * from mdl_local_herramientas order by Nombre asc") or die(mysql_error());
mysql_fetch_array($resultado)


?>