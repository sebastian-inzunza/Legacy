<?php 
    session_start();
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $password = $_POST['password'];  
    //para encriptar
    //$password = hash('sha512',$password);  
   

    $validar_login_usuario =  mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre= '$nombre' and contrasena = '$password' and tipo = 'u'" );
    $validar_login_admin =  mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre= '$nombre' and contrasena = '$password' and tipo = 'a'" );
    
    if (mysqli_num_rows($validar_login_usuario) > 0){
        //Aqui hacemos lo de la otra pagina
        $_SESSION['nombre'] = $nombre;
         echo '1';
         exit();
    } elseif (mysqli_num_rows($validar_login_admin) > 0) {
        $_SESSION['nombre'] = $nombre;
        echo '2';
        exit();
    }
    else{
        echo'Usuario y/o Contrasaeña invalidos, Verifica tus datos PUTO';
        exit();
    }
    
?>