<?php
    require('dbConection.php');

    //Llamada al procedimiento almacenado
    $StoreProcedure = "select * from ListarEstilos";

    $Resultado = $Conection->query($StoreProcedure);
    //Verificacion de los resultados
    if($Resultado){
        while($fila = $Resultado->fetch_assoc()){
            echo 
            '<option>'. $fila["nombre"] .'</option>';
        }
    }else{
        echo "Error al llamar el procedimiento" . $Conection->error;
    }

    //Cerrardo conexion
    $Conection->close();
?>