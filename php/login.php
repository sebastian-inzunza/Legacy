<?php 
    session_start();
    include 'conexion.php'; ///Requerimos el archivo que hace la conexion con BD

    $nombre = $_POST['nombre']; //obtenemos el dato del input con name = "nombre"
    $password = $_POST['password'];  //obtenemos el dato del input con name = "password"
    //para encriptar
    //$password = hash('sha512',$password);  
   

    ///Se hace una consulta con BD a la tabla usuario
    $validar_login_usuario =  mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre= '$nombre' and contrasena = '$password' and tipo = 'u'" );
    $validar_login_admin =  mysqli_query($conexion, "SELECT * FROM usuario WHERE nombre= '$nombre' and contrasena = '$password' and tipo = 'a'" );
    
    //Si la consulta en cuentra 1 usuario con el cual coencida con nombre y password entra al if
    if (mysqli_num_rows($validar_login_usuario) > 0){
        //Aqui hacemos lo de la otra pagina
        $_SESSION['nombre'] = $nombre; //iniciamos la sesion 
         echo '1'; //el archivo responde con 1 al ajax el cual se encuentra en index.html y nos resdirecciona a inicio.php
         exit();
    } elseif (mysqli_num_rows($validar_login_admin) > 0) {
        $_SESSION['nombre'] = $nombre;
        echo '2';//el archivo responde con 1 al ajax el cual se encuentra en index.html y nos resdirecciona a inicio-admin.php
        exit();
    }
    else{ /// si no encuentra un usuario en el coicida nombre y contraseña
        echo'Usuario y/o Contrasaeña invalidos, Verifica tus datos'; ///Retorna esta respuest al dofigo ajax el cual imprimira como error 
        exit();
    }
    
?>