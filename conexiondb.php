<?php
 


// datos para la coneccion a mysql
define('DB_SERVER','localhost');
define('DB_NAME','moodle');
define('DB_USER','admin');
define('DB_PASS','Admin_1234');
 
    $con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    mysql_select_db(DB_NAME,$con);
 mysql_query("SET NAMES 'utf8'");
?>