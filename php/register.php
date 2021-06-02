<?php 

    include 'conexion.php';
    $nombre = $_POST['nombre']; //obtenemos el dato del input con name = "nombre"
    $correo = $_POST['correo']; //obtenemos el dato del input con name = "correo"
    $contraseña =  $_POST['password'];//obtenemos el dato del input con name = "password"
    $verificarContraseña = $_POST['password2'];//obtenemos el dato del input con name = "password2"
    //para encriptar 
    //$contrasena = hash('sha512',$contrasena);  

    //Valida si la contraseña ingresada en el campo contraseña y verificar contraseña son iguales
    if($contraseña == $verificarContraseña){ 

        //escribimos  Insert a la tabla usuario donde ingresamos los valores obteidos del html y lo gusrdamos en una variable
        $query = "INSERT INTO usuario(nombre, email, contrasena,tipo) VALUES ('$nombre', '$correo','$contraseña','u')";
        
        // Hacemos una consulta  si para verificar si el correo no se encuentra registrado 
        $verificar = mysqli_query($conexion, "SELECT * FROM usuario WHERE email= '$correo'");
        
        //Si verificar tiene 1 registro encontrado 
        if (mysqli_num_rows($verificar) > 0){ //se cumple la condicion 
            echo 'El correo se encuentra registrado.'; //manda este respuesta el cual el Ajax imprimira como erro
            exit; //y sale del programa sin hacer el registro
        }
        
        $ejecutar = mysqli_query($conexion, $query); ///mandamos la conexion junto al Insert
    
        if ($ejecutar) //Si lo hizo correctamente 
        {
            echo"Usuario registrado"; //mandara este mensaje avisando que el registro fue hecho
        }
        mysqli_close($conexion); //Cerramos la conexion con BD

    }
    else{ // Entra aca si las contraseña y validar contraseña no son los mismos 
        echo 'Contraseña Invalida'; //manda este mensaje y Ajax lo imprime como error
    }
   

?>