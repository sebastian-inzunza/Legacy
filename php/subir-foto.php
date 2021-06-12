<?php
    session_start();
    include 'conexion.php';
    $archivo = "../avatar/"; 
    $archivo .= $archivo.basename($_FILES['archivo']['name']); 
    $descripcion = $_POST['descripcion'];
    $id = $_POST['idUsuario'];

    $select = mysqli_query($conexion, "SELECT * FROM perfil WHERE id= '$id'");
    $perfil = mysqli_fetch_array($select); 
    $eliminar = "../avatar/";
    $eliminar .= $eliminar.$perfil['foto'];
        if(!empty( $_FILES["archivo"]["name"])) //si ambos campos vienen con datos
        {
            $archivo_BD  = $_FILES['archivo']['name']; 
            if($descripcion != $perfil['detalle'] && move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) //si las descripcion es diferente
            {
                
                $query = "UPDATE perfil SET foto = '$archivo_BD', detalle = '$descripcion' WHERE id = '$id'";
                $foto = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
                if(file_exists($eliminar)){
                    unlink($eliminar);
                    echo"Se Actualizo foto y Descripcion";
                }
                else{
                   echo"Se Actualizo foto y Descripcion";
                }       
            }
            else{
                if(move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo))
                {
                $query = "UPDATE perfil SET foto = '$archivo_BD' WHERE id = '$id'";
                $foto = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
                if(file_exists($eliminar)){
                    unlink($eliminar);
                    echo"Se Actualizo foto ";
                }
                else{
                    echo"Se Actualizo foto ";
                }
                }else
                {
                   echo'Problema con fichero';
               }
                //}
                //else{
                  //  echo"Se Actualizo foto y Descripcion";
                //} 
            }
        }
        if(!empty($descripcion) && empty( $_FILES["archivo"]["name"]))
        {
            if($descripcion != $perfil['detalle']){
                $query = "UPDATE perfil SET detalle = '$descripcion' WHERE id = '$id'";
                $foto = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
                echo "Se Actualizo descripcion";
            }
            else{
                echo "No hay cambios";
            }
        }
    
    /*
    if(move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) 
    {
        foreach($_SESSION['usuario'] as $indice => $usuario){
            $Id= $usuario['ID'];
        }
        $archivo_BD  = $_FILES['archivo']['name']; 
        $query = "UPDATE perfil SET foto = '$archivo_BD' WHERE id = '$Id'";
        $ejecutar = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
        if ($ejecutar) //Si lo hizo correctamente 
        {
            echo"Foto actualizada"; //mandara este mensaje avisando que el registro fue hecho
        }
        mysqli_close($conexion); //Cerramos la conexion con BD
    } 
    else
    { 
    echo "Hubo un error al subir tu archivo! Por favor intenta de nuevo."; 
    }*/
?>