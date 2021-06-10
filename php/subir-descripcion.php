<?php
    session_start();
    include 'conexion.php';
    foreach($_SESSION['usuario'] as $indice => $usuario){
        $Id= $usuario['ID'];
    }
    $detalle = $_POST['descripcion'] ; //obtenemos el dato del textarea con name = "descripcion"
    $query = "UPDATE perfil SET detalle = '$detalle' WHERE id = '$Id'";
    $ejecutar = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
    if ($ejecutar) //Si lo hizo correctamente 
    {
        echo"Descripcion actualizada"; //mandara este mensaje avisando que el registro fue hecho
    }
    mysqli_close($conexion); //Cerramos la conexion con BD
?>