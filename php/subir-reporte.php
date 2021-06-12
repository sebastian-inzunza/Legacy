<?php
    session_start();
    include 'conexion.php';
    foreach($_SESSION['usuario'] as $indice => $usuario){
        $Id= $usuario['ID'];
    }
    $message = $_POST['Message'] ; //obtenemos el dato del textarea con name = "Message"
    $tipo = $_POST['tipo'] ; //obtenemos el dato del select con name = "tipo"
    // Se le asigna al reporte el estatus 'NR' (No Revisado)
    $query = "INSERT INTO reporte(idUsuario, tipo, motivo, estatus) VALUES ('$Id', '$tipo', '$message', 'NR')";
    $ejecutar = mysqli_query($conexion, $query);  ///mandamos la conexion junto al INSERT
    if ($ejecutar) //Si lo hizo correctamente 
    {
        echo"Reporte enviado"; //mandara este mensaje avisando que el registro fue hecho
    }
    mysqli_close($conexion); //Cerramos la conexion con BD
?>