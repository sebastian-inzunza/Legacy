
<?php
    include 'conexion.php';
    $playlist = $_POST['playlist']; //obtenemos el dato del select con name = "playlist"
    $idCancion = $_POST['idSong'] ; //obtenemos el dato  con name = "idCancion"

    $query = "SELECT * FROM playlist_cancion WHERE idCancion = '$idCancion' and idPlaylist = '$playlist'";
    $revisar = mysqli_query($conexion, $query); ///mandamos la conexion junto al SELECT; 

    if(mysqli_num_rows($revisar) > 0){ // La cancion esta en la playlist
        echo"Ya se encuentra en la playlist";
    }else{ // La cancion no esta en la playlist
        if($playlist != "Agregar Playlist") // No es el valor por defecto
        {
            $query = "INSERT INTO playlist_cancion(idCancion,idPlaylist) VALUES('$idCancion','$playlist')";
            $ejecutar = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
            if ($ejecutar) //Si lo hizo correctamente 
            {
                echo"Cancion agregada a la playlist"; //mandara este mensaje avisando que la playlist fue actualizada
            }
        }
    }

    mysqli_close($conexion); //Cerramos la conexion con BD
?>
