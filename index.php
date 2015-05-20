<?php
include "conexiondb.php";
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        <div align="center" >
            <?php


$resultado = mysql_query("SELECT * from Herramientas order by Nombre asc") or die(mysql_error());

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
while ($row = mysql_fetch_array($resultado)) {
    

    
   
  echo "<tr>";
  echo  "<td>" . $row['Nombre'] . "</td>";
  echo  "<td>" . $row['Codigo'] . "</td>" ;
  echo  "<td>" . $row['Stock'] . "</td>";
  echo  "<td>" . $row['Disponible'] . "</td>" ;
  echo  "<td>" . $row['Categoria'] . "</td>";
  ?>
            <td>
     <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idHerramientas']; ?>" />
        <input type="submit" value="Editar" />
     </form>
 </td>
 <td>
     <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['idHerramientas']; ?>" />
        <input type="submit" value="Eliminar" />
     </form>
     </td>
     
<?php     
     
  echo  "</tr>" ;
 
  

};
echo "</table>";
};?>
<form action="guardar.html">
                <input type="submit" value="Agregar Inventario">
</form>
        </div>  
    </body>
</html>
