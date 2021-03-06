<?php
    session_start();
    include 'php/conexion.php'; ///Requerimos el archivo que hace la conexion con BD

    if (!isset($_SESSION['usuario'])){
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
    <title>Legacy | Perfil</title>
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
                        <form action="buscando.php" method="post" class="search">
                            <input class="form-control" type="text" placeholder="Buscar..." name="buscador">
                            <button><img src="img/search_icon.png" href="buscando.php"></button>
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
                            <h2 class= "">Bienvenido: <?php echo $usuario['NOMBRE']?></h2>
                            <span> Total de canciones subidas: </span>
                            <!--<span><br>Total de playlist:</br> </span>
                            <span>Total de reportes: </span> -->
                            <br><a href="editar-perfil.php">Editar perfil</a></br>
                        </div>                

                        <div class="col display">
                                <div class="img-perfil ">
                                    <?php
                                        /// Se hace una consulta con BD a la tabla perfil
                                        $select =  mysqli_query($conexion, "SELECT * FROM perfil WHERE id='" . $usuario[ "ID" ] . "'" );
                                        $usuario =  mysqli_fetch_array($select);
                                        
                                        if($usuario['foto']==''){// Se le asigna imagen default si no tiene una en la base de datos
                                            $usuario['foto'] = "perfil.jpg";
                                        }
                                        
                                    ?>
                                    <img src= "avatar/<?php echo $usuario['foto'] ?>" class="img-thumbnail">                                  
                                    <div class="col-sm-12 margin_top_20">
                                        <textarea class="textarea" type="text" readonly name="descripcion"><?php echo $usuario['detalle']?></textarea>
                                    </div>        
                                </div>
                        </div>         
                    </div>
                    <a href="Editar perfil"></a>    

    </section>
<?php } ?>
    <!-- music-box  -->
    
    <div class="music-box-perfil">
        <div class="container">
            <h2 class="center negritas">Mis playlist:</h2>
                <div class="tab-content table-dark"> <!-- Esto vamos a sacamr con un while de la base de datos-->
                        <!-- SECCION POP-->
                        <div id="home" class="tab-pane fade in active Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                    <td></td>
                                    <td width = "200px"></td>
                                </tr>
                                <tr>
                                    <td class="center">Yung Bae</td>
                                    <td class="center">I??m Willing</td>
                                    <td class="display"><audio class="margin-reproductor"src="YUNG BAE - Bae - 05 I'm Willing (w-tuuwa).mp3" preload="none" controls></audio></td>
                                    <td><a data-toggle="tab" href="#"><img class ="dividir" src="icon/prohibido.png" alt="icon" width="30px"/></a></td>
                                    <td >
                                        <select class="selectpicker display">
                                            <option value="">Agregar Playlist</option>
                                            <option value="1">PlayList 1</option>
                                            <option value="2">Playlist 2</option>
                                            <option value="3">Playlist 3</option>
                                        </select>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td class="center">MGMT</td>
                                    <td class="center">Kids</td>
                                    <td class="display"><audio class="margin-reproductor"src="KIDS.mp3" preload="none" controls></audio></td>
                                    <td><a data-toggle="tab" href="#"><img class ="dividir" src="icon/prohibido.png" alt="icon" width="30px"/></a></td>
                                    <td >
                                        <select class="selectpicker display">
                                            <option value="">Agregar Playlist</option>
                                            <option value="1">PlayList 1</option>
                                            <option value="2">Playlist 2</option>
                                            <option value="3">Playlist 3</option>
                                        </select>
                                       
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- FIN SECCION POP-->
                        
                        <!-- SECCION ROCK-->
                        <div id="menu1" class="tab-pane fade Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                    <td></td>
                                    <td width = "200px"></td>
                                </tr>
                                <tr>
                                    <td class="center">Yung Bae</td>
                                    <td class="center">I??m Willing</td>
                                    <td class="display"><audio class="margin-reproductor"src="YUNG BAE - Bae - 05 I'm Willing (w-tuuwa).mp3" preload="none" controls></audio></td>
                                    <td><a data-toggle="tab" href="#"><img class ="dividir" src="icon/prohibido.png" alt="icon" width="30px"/></a></td>
                                    <td>
                                        <select class="selectpicker display">
                                            <option value="">Agregar Playlist</option>
                                            <option value="1">PlayList 1</option>
                                            <option value="2">Playlist 2</option>
                                            <option value="3">Playlist 3</option>
                                        </select>
                                       
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- FIN SECCION ROCK-->

                        <!-- SECCION RAP -->
                        <div id="menu2" class="tab-pane fade Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                    <td></td>
                                    <td width = "200px"></td>
                                </tr>
                                <tr>
                                    <td class="center">Yung Bae</td>
                                    <td class="center">I??m Willing</td>
                                    <td class="display"><audio class="margin-reproductor"src="YUNG BAE - Bae - 05 I'm Willing (w-tuuwa).mp3" preload="none" controls></audio></td>
                                    <td><a data-toggle="tab" href="#"><img class ="dividir" src="icon/prohibido.png" alt="icon" width="30px"/></a></td>
                                    <td>
                                        <select class="selectpicker display">
                                            <option value="">Agregar Playlist</option>
                                            <option value="1">PlayList 1</option>
                                            <option value="2">Playlist 2</option>
                                            <option value="3">Playlist 3</option>
                                        </select>
                                       
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- FIN SECCION RAP -->

                        <!-- SECCION REGGAE -->
                        <div id="menu3" class="tab-pane fade Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                    <td></td>
                                    <td width = "200px"></td>
                                </tr>
                                <tr>
                                    <td class="center">Yung Bae</td>
                                    <td class="center">I??m Willing</td>
                                    <td class="display"><audio class="margin-reproductor"src="YUNG BAE - Bae - 05 I'm Willing (w-tuuwa).mp3" preload="none" controls></audio></td>
                                    <td><a data-toggle="tab" href="#"><img class ="dividir" src="icon/prohibido.png" alt="icon" width="30px"/></a></td>
                                    <td >
                                        <select class="selectpicker display">
                                            <option value="">Agregar Playlist</option>
                                            <option value="1">PlayList 1</option>
                                            <option value="2">Playlist 2</option>
                                            <option value="3">Playlist 3</option>
                                        </select>
                                       
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- FIN SECCION REGGAE -->
  
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