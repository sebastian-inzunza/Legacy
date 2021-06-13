<?php   
    include "conexion.php";

    $id = $_POST['id'];
    $query =  mysqli_query($conexion,"DELETE FROM reporte WHERE  id = '$id'");
    if($query){
        echo "1";
    }else{
        echo "0";
    }
?>