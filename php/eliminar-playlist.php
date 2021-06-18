<?php
   include 'conexion.php';

    $id=$_POST['id'];
   
    $eliminar =  mysqli_query($conexion, "DELETE FROM playlist WHERE id = '$id'"); 
    if($eliminar){//Si se elimino correctamente
        echo "1";
       
    }
    else
    {
        echo'No se pudo eliminar la playlist';
        die;
    }

?>