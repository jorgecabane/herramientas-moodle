<?php
include "conexiondb.php";
$id=$_POST['id'];
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        
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
        </div>  
    </body>
</html>
