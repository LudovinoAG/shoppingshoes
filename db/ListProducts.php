<?php
    require('dbConection.php');

    if(isset($_POST['Filter']) && 
        isset($_POST['Parameter1'])&&
        isset($_POST['Parameter2'])&&
        isset($_POST['Parameter3'])&&
        isset($_POST['Parameter4'])) {

        $Filter = $_POST['Filter'];
        $Parameter1 = $_POST['Parameter1'];
        $Parameter2 = $_POST['Parameter2'];
        $Parameter3 = $_POST['Parameter3'];
        $Parameter4 = $_POST['Parameter4'];

    }else{
        $Filter = "''";
        $Parameter1 = "''";
        $Parameter2 = "''";
        $Parameter3 = "''";
        $Parameter4 = "''";
    }
    
    //Llamada al procedimiento almacenado
    $StoreProcedure = "Call VerZapatos('" . $Filter ."'". "," 
                        . "'" . $Parameter1 . "'" . "," 
                        . "'" . $Parameter2 . "'" . "," 
                        . "'" . $Parameter3 . "'" . "," 
                        . "'" . $Parameter4 . "'" . 
                        ")";

    $Resultado = $Conection->query($StoreProcedure);
    $count = 1;
    //Verificacion de los resultados
    if($Resultado){
        while($fila = $Resultado->fetch_assoc()){
            echo 
            '<div class="card list_pruduct ProductDetails" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img id="imgProduct" src="' . $fila["ft_principal"] . '.png" alt="">
                <div class="card-body">
                    <h4 class="card-title">'.$fila['Marca'].'</h4>
                    <h5 class="card-subtitle">'.$fila["Estilo"].'</h5>
                    <h6 class="card-subtitle color_size">'. $fila["color"] . ' | ' . $fila["size"] .'</h6>
                    <h5 class="card-subtitle price">US$ '.$fila["precio"].'</h5>
                    <span class="text_available">Available: '.$fila["existencia"].'</span>
                    <p>'.$fila["Description"].'</p>
                </div>
                <div class="card-footer">
                    <button href="" class="btn btn-secondary botton_cart" id="'.$fila["ID"] .'">
                        <img src="./img/cart.png" alt=""> 
                        <span>Add Cart</span>
                    </button>
                </div>
            </div>';
            $count++;
        }
    }else{
        echo "Error al llamar el procedimiento" . $Conection->error;
    }

    //Cerrardo conexion
    $Conection->close();

?>

