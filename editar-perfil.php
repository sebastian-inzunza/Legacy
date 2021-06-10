<?php
    session_start();
    include 'php/conexion.php'; ///Requerimos el archivo que hace la conexion con BD

    if (!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Por favor debes iniciar session");
            window.location ="index.html";
            </script>
        ';
        session_destroy();
        die();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Legacy | Editar-perfil</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style2.css">   
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="img/Legacy-Logo.jpg" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
 
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="img/disc.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                            <?php foreach($_SESSION['usuario'] as $indice => $usuario){?>
                                <div class="logo menu-area-main">
                                    <li><a href="inicio.php"><img src="img/Legacy-Logo.jpg" width="85px" alt="logo"/></a></li>
                                    <spam class = "user">Nickname: <?php echo $usuario['NOMBRE'];?></spam>
                                </div>     
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li> <a href="subir-cancion.php">Mis Canciones</a> </li>
                                        <li> <a href="playlists.php">Playlist</a> </li>
                                        <li> <a href="perfil.php">Perfil</a> </li>
                                        <li> <a href="php/logout.php">Logout</a> </li>
                                    </ul>
                                </nav>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <form class="search">
                            <input class="form-control" type="text" placeholder="Buscar...">
                            <button><img src="img/search_icon.png"></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="banner_section">
        <div class="banner-main">
            <img src="img/Banner-Legacy-perfil.png"/>
                <div class="container">
                    <div class="row relative text-bg ">
                        <div class="col">
                        
                        <h2 >Bienvenido: <?php echo $usuario['NOMBRE'];?></h2>
                        <p>Correo: <?php echo $usuario['EMAIL'];?>  </p>

                        <input class="contactus-perfil" type="text" placeholder="Escribe tu nombre: ">
                        <input class="contactus-perfil" type="text" placeholder="Escribe tu contraseña: ">
                        <input class="contactus-perfil" type="text" placeholder="Conftima tu contraseña: ">
                        </div>                

                        <div class="col display">
                                <div class="img-perfil ">
                                    <?php
                                        /// Se hace una consulta con BD a la tabla perfil
                                        $select =  mysqli_query($conexion, "SELECT * FROM perfil WHERE id='" . $usuario[ "ID" ] . "'" );
                                        $usuario =  mysqli_fetch_array($select);

                                        if($usuario['foto']==''){// Se le asigna imagen default si no tiene una en la base de datos
                                            $usuario['foto'] = "avatar/perfil.jpg";
                                        }
                                    ?>
                                    <img src= "avatar/<?php echo $usuario['foto'] ?>" " class="img-thumbnail">
                                    <form enctype="multipart/form-data" class="display" id="fupForm" action="php/subir-foto.php" method="POST" >
                                        <div class="col-sm-12 margin_top_30" > 
                                            <input class="contactus" type="file" id="archivo" name="archivo" accept='image/*' required>
                                        </div>
                                        
                                        <div class="col-sm-12 center margin_top_30" >
                                            <button type="submit" class="send" name="subir" id="subir" value="Subir Archivo" >Actualizar imagen</button>
                                        </div>
                                    </form>

                                    <form action="php/subir-descripcion.php" method="POST" name="area_texto">                                    
                                        <div class="col-sm-12">
                                            <textarea class="textarea" type="text" id="descripcion" name="descripcion" maxlength="200" ><?php echo $usuario['detalle']?></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="send" name="subir" id="subir" value="Subir Archivo" >Actualizar descripcion</button>
                                        </div>
                                    </form>
                                </div>
                        </div>         
                    </div>
                    <a href="Editar perfil"></a>    
    </section>
    <?php } ///Se cierra el foreach que trae todo los datos de session ?>     
    <!--  footer -->
    <footr id="footer_with_contact">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 width">
                        <div class="address">
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 width">
                      
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 width">
                        <div class="address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footr>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    //esto es codigo Ajax, nos ayudara a mandar los mensajes de error  (foto)
       $(document).ready(function(){
           var frm = $("#fupForm");
           var btnEnviar = $("button[type=submit]");

           var textoSubir = btnEnviar.text();
           var textoSubiendo = "Cargando foto";


           frm.bind("submit",function(){
               var frmData = new FormData;
               frmData.append("archivo",$("input[name=archivo]")[0].files[0]);
               
               $.ajax({
                   url: frm.attr("action"),
                   type: frm.attr("method"),
                   data: frmData,
                   processData: false,
                   contentType: false,
                   cache: false,
                   beforeSend: function(data){
                        btnEnviar.html(textoSubiendo);
                        btnEnviar.attr("disable",true);
                   },
                   success: function(data){
                       if(data = "Foto actualizada")
                        Swal.fire({
                                'title': 'Hecho!',
                                'text': "Se actualizo la foto correctamente", //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                'type': 'success'
                                })
                        else{
                            Swal.fire({ 
                                'title': 'Error',
                                'text': "No se pudo actualizar la foto :(", //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                                'type': 'error'
                                })
                        }
                        btnEnviar.html("Subir otra foto");
                        btnEnviar.attr("disable",false);

                   }
               });


               return false;
           });
       });
    </script>  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    
</body>

</html>