<?php
    session_start();

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
    <style type="text/css">
        .my-custom-scrollbar {
            position: relative;
            height: 300px;
            overflow-y: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        .classgeneral {
            display:none;
            overflow-y: auto;
        }
        .enlace {
            font-size: 2rem;
            text-align: center;
            }
    </style>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Legacy | Playlists</title>
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
                                        <li class="active"> <a href="playlists.php">Playlist</a> </li>
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

                <div class="text-bg relative">
                <p><br><span class="Perfect2">¡Hola <?php echo $usuario['NOMBRE']?>!</span><br></p>
                    <h2>Reproduce tus playlists y disfruta del momento</h2>
                    <p>La mejor aplicacion donde lo posible es posible.</p>
                </div>
            </div>   
        </div>
    </section>
        
<div class="container">
    <div class="myDivElement">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><h3 class="center negritas ">Mis playlist</h3></a></li>
            <li><a href="playlist-crear.php" target="_blank" onClick="window.open(this.href, this.target, 
            'width=400,height=400,left='+parseInt(window.innerWidth - 83)+',top=50, resizable=no'); return false;" 
            href="playlistC.php"><h3 class="center negritas">Crear playlist</h3></a></li>
        </ul>
    </div>
    <div class="tab-content table-dark table-responsive">
        <div id="home" class="tab-pane fade in active Scroll">
        <p><h3 class="center">Tus Playlist creadas</h3></p>
        <table  class="table table-responsive table-striped table-dark border">
            <tbody>
            <tr>
                <th width="350" scope="col"></th>
                <th scope="col" class="center">#</th>
                <th width="300" scope="col" class="center">Titulo de tu Playlist</th>
                <th width="40" scope="col" class=""></th>
                <th width="80" scope="col" class=""></th>
                <th width="300" scope="col" class=""></th>
            </tr>
            <?php
            include 'php/conexion.php';
            $i = 1;
            $query=mysqli_query($conexion, "SELECT * FROM playlist WHERE idUsuario='" . $usuario[ "ID" ] . "'");
            while($playlist = mysqli_fetch_array($query)) {
                $id = $playlist['id'];
                $cad = 'classid';
                $cad = $cad.$i;
            ?>
            <tr class="playlist">
                <th width="350" scope="col"></th>
                <th scope="col" class="center"><?php echo $i?></th>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <th scope="col" class="center" width="300" height="30"><a id="playlist_<?php echo $id?>" onclick="show('<?php echo$i?>')" href="javascript:void(0);"><?php echo $playlist['titulo']?></a>
<!-- tabla de las canciones de cada playlist-->
                <table width="450" id="<?php echo $i?>" class="classgeneral <?php echo $cad?>">
                    <tr height="20"></tr>
                    <?php
                        $todas = mysqli_query($conexion, "SELECT * FROM playlist_cancion WHERE idPlaylist='" . $playlist[ "id" ] . "'");
                        while($row = mysqli_fetch_array($todas)) {
                            $cancion = mysqli_query($conexion, "SELECT * FROM cancion WHERE id='" . $row[ "idCancion" ] . "'");
                            while($row2 = mysqli_fetch_array($cancion)){
                     ?>
                    <tr class="playlist-c">
                        <th  width="300" >
                            <p data-id="<?php echo $id;?>" id="song_<?php echo $row2['id']?>"><?php echo $row2['titulo']?></p>
                        </th>
                        <th width="60">
                        <button data-id="<?php echo $row2['id']?>" id="boton" type="submit" class="btn-padding"><img  src="icon/eliminar.png" alt="icon" width="30"></button>
                        </th>
                    </tr>
                    <?php } 
                    }?>
                </table>
                </th>
                <th width="40" scope="col"><a data-toggle="tab" href="#play_<?php echo $id?>"><img  src="icon/play.png" alt="icon" width="25"></a></form></th>
                <th width="40" scope="col" class=""><button data-id="<?php echo $id?>" id="boton" type="submit" class="btn-padding"><img  src="icon/boton-x.png" alt="icon" width="50"></button></th>
                <th width="300" scope="col"></th>
            </tr>
            <?php $i++; };// se cierra el while
            } ?> <!-- se cierra el foreach-->
            </tbody>
        </table>
        
    </div>
</div>
    <!-- music-box  --> 
    
<div class="music-box">
        <div class="container">
            <h2 class="center negritas">Reproductor</h2>
                <div class="tab-content table-dark"> <!-- Esto vamos a sacamr con un while de la base de datos-->
                    <!-- SECCION HOME-->
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

                                <?php
                            
                                $consulta= "SELECT * FROM cancion";
                                $resultado= mysqli_query($conexion,$consulta);
                               
                                while($data = mysqli_fetch_array($resultado))
                                { 
                                
                                    $name =  mysqli_query($conexion, "SELECT nombre FROM usuario WHERE  id = {$data['idUsuario']}");
                                    $result = mysqli_fetch_array($name);
                                     ?>
                                <tr class="FormPlaylist">
                                    <td class="center"><?php echo $result['nombre']?></td>
                                    <td class="center"><?php echo $data['titulo']?></td>
                                    <td class="display"><audio class="margin-reproductor"src="musica/<?php echo $data["titulo"];?>" preload="none" controls></audio></td>
                                    <td>
                                        <form action="Interfaz_Reportar_Contenido.php" method="POST">
                                            <input type="hidden" name="idCancion" value="<?php echo $data['id'];?>">
                                            <input type="hidden" name="titulo" value="<?php echo $data['titulo'];?>">
                                            <button type="submit" class="btn-padding"><img  src="icon/prohibido.png" alt="icon" width="30px"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <input type="hidden" id="idSong_<?php echo $data['id'];?>" name="idSong" value="<?php echo $data['id'];?>">
                                        <select class="selectpicker display" id="playlist_<?php echo $data['id'];?>" name="playlist" required>
                                                    <option disabled="hidden">Selecciona Playlist</option>
                                                    <?php
                                                        $list =  mysqli_query($conexion, "SELECT * FROM playlist  WHERE idUsuario ='{$usuario['ID']}'");
                                                        while($playlist = mysqli_fetch_array($list))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $playlist['id'];?>"> <?php echo $playlist['titulo'];?></option>
                                                    <?php 
                                                        }
                                                    ?>  
                                                </select>
                                              
                                        </td>
                                        <td>
                                            <button data-id='<?php echo $data['id'];?>' id="subir" type="submit" class="btn-padding">Agregar a Playlist</button>
                                        </td>
                                </tr>
                                <?php }
                                ?>
                            </table>
                        </div>
                    <!-- FIN SECCION HOME-->
                        
                        <!-- playlist con musica agregada-->
                        <?php
                            $Distinc= "SELECT DISTINCT idPlaylist FROM playlist_cancion";
                            $result= mysqli_query($conexion,$Distinc);
                         while($row = mysqli_fetch_array($result))
                           { 
                      ?>
                        <div id="play_<?php echo $row['idPlaylist'];?>" class="tab-pane fade Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                    <td></td>
                                    <td width = "200px"></td>
                                </tr>

                                <?php    
                                    //comparar con row ya que este tiene lis idPlaylists que si tienen canciones 
                                    $consultaPlaylist = mysqli_query($conexion,"SELECT * FROM playlist_cancion WHERE idPlaylist={$row['idPlaylist']}");
                                    while($cancionPlay = mysqli_fetch_array($consultaPlaylist)){
                                        $resultado= mysqli_query($conexion,"SELECT * FROM cancion WHERE id='" . $cancionPlay[ "idCancion" ] . "'");
                                        while($data = mysqli_fetch_array($resultado)){ 
                                            $name =  mysqli_query($conexion, "SELECT nombre FROM usuario WHERE  id = {$data['idUsuario']}");
                                            $nombre = mysqli_fetch_array($name);
                                ?>
                                <tr class="FormPlaylist">
                                    <td class="center"><?php echo $nombre['nombre']?></td>
                                    <td class="center"><?php echo $data['titulo']?></td>
                                    <td class="display"><audio class="margin-reproductor"src="musica/<?php echo $data["titulo"];?>"  preload="none" controls></audio></td>
                                    <td>
                                        <form action="Interfaz_Reportar_Contenido.php" method="POST">
                                            <input type="hidden" name="idCancion" value="<?php echo $data['id'];?>">
                                            <input type="hidden" name="titulo" value="<?php echo $data['titulo'];?>">
                                            <button type="submit" class="btn-padding"><img  src="icon/prohibido.png" alt="icon" width="30px"></button>
                                        </form>
                                    </td>
                                        <td>
                                        <input type="hidden" id="idSong_<?php echo $data['id'];?>" name="idSong" value="<?php echo $data['id'];?>">
                                        <select class="selectpicker display" id="playlist_<?php echo $data['id'];?>" name="playlist" required>
                                                    <option disabled="hidden">Selecciona Playlist</option>
                                                    <?php
                                                        $list =  mysqli_query($conexion, "SELECT * FROM playlist  WHERE idUsuario ='{$usuario['ID']}'");
                                                        while($playlist = mysqli_fetch_array($list))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $playlist['id'];?>"> <?php echo $playlist['titulo'];?></option>
                                                    <?php 
                                                        }
                                                    ?>  
                                                </select>
                                              
                                        </td>
                                        <td>
                                            <button data-id='<?php echo $data['id'];?>' id="subir" type="submit" class="btn-padding">Agregar a Playlist</button>  
                                        </td>
                                </tr>

                                <?php
                                } //Cierre de los while para comparar si existen canciones en la playlist
                             }?>

                            </table>
                        </div>
                        <?php
                              // fin de if row
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
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/Legacy-Logo.jpg"/></figure>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/Huevo-Pascua.jpg" /></figure>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/music3.jpg" /></figure>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6 ">
                                    <figure><img src="img/music4.jpg" /></figure>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>© 2021 Todos los Derechos Reservados por El Proyecto Bacano.</p>
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
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
<script>
    function show(id) {
        if( $('.classid'+id).is(":visible") ){
           $(".classgeneral").hide();
        } else {
           $(".classgeneral").hide();
           $('.classid'+id).show();
        } 
    }
</script>
<script type="text/javascript">
    //esto es codigo Ajax, nos ayudara a mandar los mensajes de error  
//Eliminar una playlist
        $('.playlist #boton').click(function(){
            var id = $(this).data('id');
            Swal.fire({
                title: "¿Seguro que quieres eliminar esta playlist?",
                text: "Esta operación no se puede deshacer",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
                type: 'warning'
            })
            .then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: 'php/eliminar-playlist.php',
                        type: 'POST',
                        data: {'id': id},
                        success: function(data){//entra aca si el archivo eliminar-playlist.php da una respuesta
                            if(data == "1"){ ///Si la respuesta del archivo es "1"
                                Swal.fire({
                                    'title': 'Hecho!',
                                    'text': "Se elimino la playlist", //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                    'type': 'warning'
                                    }).then(function(result){
                                        window.location = "playlists.php"; //Despues redirecciona a playlists.php
                                    })
                            }
                            else{ /// si la respuesta del archivo es otra entrara aca
                                Swal.fire({ 
                                    'title': 'Error',
                                    'text': data, //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                                    'type': 'error'
                                    }) 
                            }		
                        },
                    });
                    } 
                });
            // AJAX request
            
        });
//Eliminar una cancion de una playlist
        $('.playlist-c #boton').click(function(){
            var idC = $(this).data('id');
            var idP = $('#song_'+idC).data('id');
            Swal.fire({
                title: "¿Seguro que quieres eliminar esta canción de tu playlist?",
                text: "",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: "Eliminar",
                cancelButtonText: "Cancelar",
                type: 'warning'
            })
            .then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: 'php/eliminar-playlist-c.php',
                        type: 'POST',
                        data: {'idP': idP, 'idC': idC},
                        success: function(data){//entra aca si el archivo eliminar-playlist.php da una respuesta
                            if(data == "1"){ ///Si la respuesta del archivo es "1"
                                Swal.fire({
                                    'title': 'Hecho!',
                                    'text': "Se elimino la canción", //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                    'type': 'warning'
                                    }).then(function(result){
                                        window.location = "playlists.php"; //Despues redirecciona a playlists.php
                                    })
                            }
                            else{ /// si la respuesta del archivo es otra entrara aca
                                Swal.fire({ 
                                    'title': 'Error',
                                    'text': data, //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                                    'type': 'error'
                                    }) 
                            }		
                        },
                    });
                    } 
                });
            // AJAX request
            
        });
    
    </script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
    $(document).ready(function (){
        $('.FormPlaylist #subir').click(function(){
            var id = $(this).data('id');
            // Selecting image source
            var idSong = $('#idSong_'+id).attr("value");
            var playlist = $('#playlist_'+id).val();
            $.ajax({
            url: 'php/actualizar-playlist.php',
            type: 'POST',
            data: {'idSong': idSong,'playlist':playlist},
            success: function(data){//entra aca si el archivo login.php da una respuesta
                if(data == 1){
                    Swal.fire({
                        'title': 'Hecho!',
                        'text': "Se agrego a la playlist", //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                        'type': 'success'
                        })
                }
                else{
                    Swal.fire({ 
                        'title': 'Error',
                        'text': data, //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                        'type': 'error'
                    }) 
                }
                   
            }
        });          
    });
    });
    </script>    
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>


</body>

</html>