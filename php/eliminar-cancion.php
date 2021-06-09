<?php
   include 'conexion.php';

    $id=$_POST['id'];
    $eliminar =  mysqli_query($conexion, "DELETE FROM cancion WHERE id = '$id'");
    
    if($eliminar){
        echo "eliminao";
    }
    else{
        echo "no eliminao";
    }

?>