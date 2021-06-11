<?php
   include 'conexion.php';

    $id=$_POST['id'];
    $path=$_POST['path'];
    $path = "../".$path;
    $eliminar =  mysqli_query($conexion, "DELETE FROM cancion WHERE id = '$id'"); 
    if(unlink($path) && $eliminar){
        echo '1';
        die;
    }
    else
    {
        echo'0';
        die;
    }

?>