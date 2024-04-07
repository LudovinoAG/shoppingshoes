<?php
    require("parameterDB.php");

    //Creando la conexion
   $Conection = new mysqli($host, $user, '', $db);
        
   //Verificando
   if($Conection->connect_error){
        die("Error de conexión: " . $Conection->connect_error);
   }
?>