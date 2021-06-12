<?php
    include 'conexion.php';
    $titulo= $_POST['titulo'];
    $id = $_POST['idUsuario'];
    $razon = $_POST['razon'] ; //obtenemos el dato del textarea con name = "Message"
    $tipo = $_POST['tipo']; //obtenemos el dato del select con name = "tipo"
    // Se le asigna al reporte el estatus 'NR' (No Revisado)
    $query = "INSERT INTO reporte(idUsuario, tipo, motivo, estatus, titulo) VALUES ('$id', '$tipo', '$razon', 'NR' ,'$titulo')";
    $ejecutar = mysqli_query($conexion, $query);  ///mandamos la conexion junto al INSERT
    if ($ejecutar) //Si lo hizo correctamente 
    {
        echo"Reporte enviado"; //mandara este mensaje avisando que el registro fue hecho
    }
    else
    {
        echo 'Hubo un error';
    }
    mysqli_close($conexion); //Cerramos la conexion con BD
?>