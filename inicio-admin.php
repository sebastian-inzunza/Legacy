<?php
    session_start();

    if (!isset($_SESSION['nombre'])){
        echo '
        <script>
            alert("Por favor debes iniciar session");
            window.location ="index.php";
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
    <title>Legacy | Inicio admin</title>
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
                                <div class="logo">
                                    <a href="inicio-admin.php"><img src="img/Legacy-Logo.jpg" width="85px" alt="logo"/></a>
                                    <spam class = "user">Administrador</spam>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                     require "php/conexion.php";
                     $count= "SELECT COUNT(*) FROM reporte ";
                     $result= mysqli_query($conexion,$count);
                     $num= mysqli_fetch_array($result);
                    ?>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <?php
                                            if($num[0]>0){
                                        ?>
                                        <li> <a href="reportes.php">Reportes <span class = "circulo"><?php 
                                            echo $num[0];
                                        ?> </span></a> </li> 
                                        
                                        <?php
                                            }else{ 
                                        ?>
                                         <li> <a href="#">Reportes <span class = "circulo"><?php 
                                            echo $num[0];
                                        ?> </span></a> </li> 

                                        <?php 
                                          }
                                        ?>
                                        
                                        <li> <a href="php/logout.php">Logout</a> </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->
   <section class="banner_section">
        <div class="banner-main">
            <img src="img/banner2.jpg" />
            <div class="container">

                <div class="text-bg relative">
                    <h1>LEGACY<br><span class="Perfect">Tu Musica Favorita</span><br>Agrega Canciones Sin costo alguno!</h1>
                    <p>La mejor aplicacion donde lo posible es posible.</p>
                </div>

            </div>
        </div>

    </section>

    <!-- music-box  -->
    
    <div class="music-box">
        <div class="container">
            <h2 class="center negritas">Escucha el contenido de otros Creadores:</h2>
            <div class="row">
                <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><img class ="dividir" src="icon/icon1.png" alt="icon"/><h3 class="center negritas">POP </h3></a></li>
                <?php
                      require "php/conexion.php";
                      $Distinc= "SELECT DISTINCT genero FROM cancion";
                      $result= mysqli_query($conexion,$Distinc);
                      while($row = mysqli_fetch_array($result))
                           { 
                             if($row['genero']!= "Pop"){
                      ?>
                    
                    <li class=><a data-toggle="tab" href="#<?php echo $row['genero']?> "><img class ="dividir" src="icon/icon1.png" alt="icon"/><h3 class="center negritas"><?php echo $row['genero']?> </h3></a></li>
                <?php
                    }// se cierra el if 
                }//se cierra el while
                ?>
                </ul>
                
              
            </div>
                <div class="tab-content table-dark"> <!-- Esto vamos a sacamr con un while de la base de datos-->
                        <!-- SECCION POP-->
                        <div id="home" class="tab-pane fade in active Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                </tr>
                                <tr>

                                <?php
                            
                                $consulta= "SELECT * FROM cancion";
                                $resultado= mysqli_query($conexion,$consulta);
                               
                                while($data = mysqli_fetch_array($resultado))
                                { 
                                if($data['genero']=="Pop"){
                                     ?>
                                    <td class="center"></td>
                                    <td class="center"><?php echo $data['titulo']?></td>
                                    <td class="display"><audio class="margin-reproductor"src="musica/<?php echo $data["titulo"];?>" preload="none" controls></audio></td>
                                </tr>
                                <?php
                               }
                             }
                        ?>
                            </table>
                        </div>
                        <!-- FIN SECCION POP-->
                        
                        <!-- las demas secciones-->
                        <?php
                            $Distinc= "SELECT DISTINCT genero FROM cancion";
                            $result= mysqli_query($conexion,$Distinc);
                         while($row = mysqli_fetch_array($result))
                           { 
                             if($row['genero']!= "Pop"){
                      ?>
                        <div id="<?php echo $row['genero'];?>" class="tab-pane fade Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                </tr>
                                <tr>

                                <?php    
                                    $consulta= "SELECT * FROM cancion";
                                    $resultado= mysqli_query($conexion,$consulta);
                                while($data = mysqli_fetch_array($resultado)){ 
                                    if($data['genero']==$row['genero']){
                                ?>
                                    <td class="center"></td>
                                    <td class="center"><?php echo $data['titulo']?></td>
                                    <td class="display"><audio class="margin-reproductor"src="musica/<?php echo $data["titulo"];?>"  preload="none" controls></audio></td>
                                </tr>
                                <?php
                               }
                             }?>

                            </table>
                        </div>
                        <?php
                             } // fin de if row
                            } //fin del while  row
                        ?>
               </div>
        </div>
    </div>
    <!--  footer -->
    <footr id="footer_with_contact">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>SIGUENOS EN:</h3>
                            <ul class="locarion_icon">
                                <li><img src="icon/1.png" alt="icon" />Guadalajara,Jal</li>
                                <li><img src="icon/2.png" alt="icon" />Phone : ( +71 5896547 )</li>
                                <li><img src="icon/3.png" alt="icon" />Email : Ayuda@Legacy.com</li>

                            </ul>
                            <ul class="contant_icon">
                                <li><img src="icon/fb.png" alt="icon" /></li>
                                <li><img src="icon/tw.png" alt="icon" /></li>
                                <li><img src="icon/lin(2).png" alt="icon" /></li>
                                <li><img src="icon/instagram.png" alt="icon" /></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 width">
                      
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Legacy</h3>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/Legacy-Logo.jpg"/></figure>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/Huevo-Pascua.jpg" /></figure>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/music3.jpg" /></figure>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/music4.jpg" /></figure>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>?? 2021 Todos los Derechos Reservados por El Proyecto Bacano.</p>
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
        
</body>

</html>