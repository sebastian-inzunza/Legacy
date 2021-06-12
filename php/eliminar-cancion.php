<?php
   include 'conexion.php';

    $id=$_POST['id'];
    $path=$_POST['path'];
    $path = "../".$path;
    $eliminar =  mysqli_query($conexion, "DELETE FROM cancion WHERE id = '$id'"); 
    if($eliminar){//Si se elimino correctamente
        if(file_exists($path)) //si el archivo existe
        {
            unlink($path); //eliminalo
            echo '1';
            die;
        }
        else{
            echo '1'; //solo elimino en BD
            die;
        }
       
    }
    else
    {
        echo'No se pudo eliminar la cancion';
        die;
    }

?>