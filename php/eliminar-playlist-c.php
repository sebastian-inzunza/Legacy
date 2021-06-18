<?php
   include 'conexion.php';

    $idP = $_POST['idP'];
    $idC = $_POST['idC']; 
    $eliminar =  mysqli_query($conexion, "DELETE FROM playlist_cancion WHERE (idPlaylist = '$idP') AND (idCancion = '$idC')"); 
    if($eliminar){//Si se elimino correctamente
        echo "1";
       
    }
    else
    {
        echo'No se pudo eliminar la cancion';
        die;
    }

?>