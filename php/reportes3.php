<?php   
    include "conexion.php";

    $id = $_POST['id'];
    $song = $_POST['song'];
    $idCancion = $_POST['idCancion'];
    $song = "../".$song;

    $query =  mysqli_query($conexion,"DELETE FROM reporte WHERE  id = '$id'");
    $eliminar =  mysqli_query($conexion, "DELETE FROM cancion WHERE id = '$idCancion'"); 
    if($query && $eliminar){
        if(file_exists($song)) //si el archivo existe
        {
            unlink($song); //eliminalo
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