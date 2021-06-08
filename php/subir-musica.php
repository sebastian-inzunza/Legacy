<?php
session_start();
include 'conexion.php';
$archivo = "../musica/"; 
$archivo .= $archivo.basename($_FILES['archivo']['name']); 
$tipo_archivo = $_FILES['archivo']['type'];
$genero =$_POST['genero'];
if(move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) 
{
        foreach($_SESSION['usuario'] as $indice => $usuario){
                $Id= $usuario['ID'];
              }
              $archivo_BD  = $_FILES['archivo']['name']; 
              $query = "INSERT INTO cancion(titulo, idUsuario, genero) VALUES ('$archivo_BD','$Id','$genero')";
              $ejecutar = mysqli_query($conexion, $query); ///mandamos la conexion junto al Insert
              if ($ejecutar) //Si lo hizo correctamente 
              {
                  echo"Cancion subida"; //mandara este mensaje avisando que el registro fue hecho
              }
              mysqli_close($conexion); //Cerramos la conexion con BD
} 
else
{ 
echo "Hubo un error al subir tu archivo! Por favor intenta de nuevo."; 
}

?>
