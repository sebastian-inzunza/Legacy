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
            echo'
             <script>
                alert("Ese correo ya esta registrado, intente con otro");
            </script>';
            exit;
        }
        
        $ejecutar = mysqli_query($conexion, $query);
    
        if ($ejecutar)
        {
            echo'<script>
                alert("Usuario registrado");
                </script>';
        }
        mysqli_close($conexion);

    }else{

        echo'<center>
            <div class="alert alert-warning">Login Error!!</div>
        </center>';
       
    }

   

?>