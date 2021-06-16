<?php 
    session_start();
    include 'conexion.php';
    

    $nombre = $_POST['nombre'];
    $usuario = $_SESSION['usuario'][0]['ID'];
    $query = "INSERT INTO playlist(titulo, idUsuario) VALUES ('$nombre', '$usuario')";
    
    $ejecutar = mysqli_query($conexion, $query); ///mandamos la conexion junto al Insert
    
        if ($ejecutar) //Si lo hizo correctamente 
        {
            echo "Playlist creada con éxito!"; //mandara este mensaje avisando que el registro fue hecho
        }
        else{
            echo "Error al crear, intente de nuevo";
        }

        mysqli_close($conexion);
        
?>