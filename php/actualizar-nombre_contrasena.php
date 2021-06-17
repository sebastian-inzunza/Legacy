<?php
    session_start();
    include 'conexion.php';
    foreach($_SESSION['usuario'] as $indice => $usuario){
        $id = $usuario['ID'];
    }
    $nombre = $_POST['nombre'];
    $contrasena1 = $_POST['contrasena1'];
    $contrasena2 = $_POST['contrasena2'];

    $select = mysqli_query($conexion, "SELECT * FROM usuario WHERE id = '$id' ");
    $usuario = mysqli_fetch_array($select); 

    // Inicializa la verificacion
    $verifica_nombre = 0;
    $verifica_contrasena = 0;
    // Valida que los campos no lleguen vacios
    if(!empty($nombre)){ 
        $verifica_nombre = $nombre != $usuario['nombre'] ;
    }
    if( !empty($contrasena1) && !empty($contrasena2) && ($contrasena1==$contrasena2) ){
        $verifica_contrasena = $contrasena1 != $usuario['contrasena'];
    }
    

    if($verifica_nombre && $verifica_contrasena){ // Cambia nombre y contrasena
        $query = "UPDATE usuario SET nombre = '$nombre', contrasena = '$contrasena1' WHERE id = '$id'";
        $actualizar = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
        echo"Se actualizo nombre y contrasena";
        session_destroy();
        die();
    }else{
        if(!$verifica_nombre && !$verifica_contrasena){ // No cumplio en ningun requisito 
            echo"Usuario y/o Contrasaeña invalidos";
        }else{
            if($verifica_nombre){   // se actualiza nombre
                $query = "UPDATE usuario SET nombre = '$nombre' WHERE id = '$id'";
                $actualizar = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
                echo"Se actualizo nombre";
                session_destroy();
                die();
            }else{ // se actualiza contrasena
                $query = "UPDATE usuario SET contrasena = '$contrasena1' WHERE id = '$id'";
                $actualizar = mysqli_query($conexion, $query); ///mandamos la conexion junto al UPDATE
                echo"Se actualizo contrasena";
            }
        }
    }
    mysqli_close($conexion); //Cerramos la conexion con BD
?>