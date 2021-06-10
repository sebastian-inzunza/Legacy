<?php
   include 'conexion.php';

    $id=$_POST['id'];
    $archivo =$_POST['archivo2'];
    $eliminar =  mysqli_query($conexion, "DELETE FROM cancion WHERE id = '$id'");
    $archivo = "../musica/".$archivo;    
    if(unlink($archivo) && $eliminar){
        echo 'Musica Eliminada';
    }
    else
    {
        echo'Error al eliminar';
    }

?>