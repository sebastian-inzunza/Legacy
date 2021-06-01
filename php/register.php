<?php 

    include 'conexion.php';
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo']; 
    $contraseña =  $_POST['password'];
    $verificarContraseña = $_POST['password2'];
    //para encriptar 
    //$contrasena = hash('sha512',$contrasena);  

    if($contraseña == $verificarContraseña){

        $query = "INSERT INTO usuario(nombre, email, contrasena,tipo) VALUES ('$nombre', '$correo','$contraseña','u')";
    
        $verificar = mysqli_query($conexion, "SELECT * FROM usuario WHERE email= '$correo'");
        
        if (mysqli_num_rows($verificar) > 0){
            echo 'El correo se encuentra registrado.';
            exit;
        }
        
        $ejecutar = mysqli_query($conexion, $query);
    
        if ($ejecutar)
        {
            echo"Usuario registrado";
        }
        mysqli_close($conexion);

    }else{
        echo 'Contraseña Invalida';
    }
   

?>