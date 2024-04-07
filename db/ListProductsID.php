<?php
    require('dbConection.php');

    if(isset($_POST['ID'])) {
        $Filter = $_POST['ID'];
    }else{
        $Filter = "''";
    }
    //Llamada al procedimiento almacenado
    $StoreProcedure = "CALL VerZapatosDetallesID (" . $Filter .")";

    $Resultado = $Conection->query($StoreProcedure);
    $count = 1;
    //Verificacion de los resultados
    if($Resultado){
        while($fila = $Resultado->fetch_assoc()){
            echo 
            '<div class="card list_pruduct">
                <div class="imgsProducts">
                    <img id="VISOR_img" src="' . $fila["ft_principal"] . '.png" alt="" class="card-img-top">
                    <div class="d-flex imgsProducts_Secondary">
                        <img onclick="SelectedIMG(event);" src="' . $fila["ft_principal"] . '.png" alt="Lateral" class="card-img-top">
                        <img onclick="SelectedIMG(event);" src="' . $fila["ft_alternative1"] . '.png" alt="Frente" class="card-img-top">
                        <img onclick="SelectedIMG(event);" src="' . $fila["ft_alternative2"] . '.png" alt="Diagonal" class="card-img-top">
                    </div>
                </div>

                <div class="card-body">
                    <h4 class="card-title">'.$fila['Marca'].'</h4>
                    <h5 class="card-subtitle">'.$fila["Estilo"].'</h5>
                    <h6 class="card-subtitle color_size">'. $fila["color"] . ' | ' . $fila["size"] .'</h6>
                    <h5 class="card-subtitle price">US$ '.$fila["precio"].'</h5>
                    <span class="text_available">Available: '.$fila["existencia"].'</span>
                    <p>'.$fila["Description"].'</p>
                </div>
                <div class="card-footer">
                    <button href="" class="btn btn-secondary botton_cart_Details w-100" id="'.$fila["ID"] .'">
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

