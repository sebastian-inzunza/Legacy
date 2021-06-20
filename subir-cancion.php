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
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Legacy | Mis Canciones</title>
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
        <div class="loader"><img src="img/Disc.gif" alt="#" /></div>
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
                                        <li class="active"> <a href="#">Mis Canciones</a> </li>
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
            <img src="img/Banner-Legacy.png"/>
            <div class="container">

                <div class="text-bg relative">
                <p><br><span class="Perfect2">¡Hola <?php echo $usuario['NOMBRE']?>!</span><br></p>
                    <h3>Sube tus Canciones y comienza tu Legado</h3>
                    <p>La mejor aplicacion donde lo posible es posible.</p>
                </div>

            </div>
        </div>

    </section>
    <!-- music-box  -->
    
    <div class="music-box">
        <div class="container">
            <div class="myDivElement">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home"><h3 class="center negritas ">Mi musica</h3></a></li>
                    <li><a data-toggle="tab" href="#menu1"><h3 class="center negritas">Subir canciones</h3></a></li>
                </ul>
            </div>

                <div class="tab-content table-dark"> <!-- Esto vamos a sacamr con un while de la base de datos-->
                        <!-- mi musica-->
                        <div id="home" class="tab-pane fade in active Scroll">
                            <table class="display margin_top_30 ">
                                <tr>
                                    <td><p>Artista</p></td>
                                    <td><p>Cancion</p></td>
                                    <td class = "center"><p>Reproducir</p></td>
                                </tr>

                                <?php
                                    include 'php/conexion.php';
                                    $query=mysqli_query($conexion, "SELECT * FROM cancion WHERE idUsuario='" . $usuario[ "ID" ] . "'");
                                    while($row = mysqli_fetch_array($query))
                                    { 
                                    ?>
                                <tr class="song">
                                    <td class="center"><?php echo $usuario["NOMBRE"];?></td>
                                    <td class="center"><?php echo $row["titulo"];?></td>
                                    <td class="display"><audio class="margin-reproductor"src='musica/<?php echo $row["titulo"];?>' id='song_<?php echo $row['id'];?>' preload="none" controls></audio></td>                               
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                    <input type="hidden" name="archivo2" id="archivo2" value="<?php echo $row['titulo'];?>">
                                    <td><button data-id='<?php echo $row['id'];?>' id="boton" type="submit" class="btn-padding"><img  src="icon/boton-x.png" alt="icon" width="30px"></button></td>
                                    <td>
                                    <input type="hidden" id="idSong_<?php echo $row['id'];?>" name="idSong" value="<?php echo $row['id'];?>">
                                        <select class="selectpicker display" id="playlist_<?php echo $row['id'];?>" name="playlist" required>
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
                                        <button data-id='<?php echo $row['id'];?>' id="subir" type="submit" class="btn-padding">Agregar a Playlist</button>  
                                    </td>
                                </tr>
                                <?php }// se cierra el while
                                        } ?> <!-- se cierra el foreach-->
                            </table>
                        </div>
                        <!-- FIN SECCION POP-->
                        
                        <!-- Subir canciones-->

                        <div id="menu1" class="tab-pane fade Scroll">
                            
                                <div class="address ">
                                    <h3 class="center">Sube tus archivos</h3>

                                    <form enctype="multipart/form-data" class="display" id="fupForm" action="php/subir-musica.php" method="POST" >
                                        <div class="row">
                                            <div class="col-sm-12"> 
                                                <input class="contactus" type="file" id="archivo" name="archivo" accept='audio/*' required>
                                            </div>
                                            <div class="col-sm-12">
                                                <select class=" display contactus" id="genero" name="genero">                                                   
                                                    <option value="">Genero</option>
                                                    <option value="Pop">Pop</option>
                                                    <option value="Rock">Rock</option>
                                                    <option value="Rap">Rap</option>
                                                    <option value="Reggae">Reggae</option>
                                                    <option value="Hip-Hop">Hip-Hop</option>
                                                    <option value="Trap">Trap</option>
                                                    <option value="Salsa">Salsa</option>
                                                    <option value="Electronica">Electronica</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 center" >
                                                <button type="submit" class="send" name="subir" id="subir" value="Subir Archivo" >Subir</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                         
                      </div>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
    //esto es codigo Ajax, nos ayudara a mandar los mensajes de error  

    $(document).ready(function (){
        
        $("#fupForm").on('submit',(function(e) { //Este valida Subir cancion 
        var btnEnviar =  $("#subir");
        var textoSubir = btnEnviar.text();
        var textoSubiendo = "Cargando Cancion";
        e.preventDefault();
        $.ajax({
            url: "php/subir-musica.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(data){
                btnEnviar.html(textoSubiendo);
                btnEnviar.attr("disable",true);
            },
            success: function(data)
                {
                    if(data=='Cancion subida')
                    {
                        Swal.fire({
                            title: "La Cancion se subio!",
                            text: "¿Quieres subir otra cancion?",
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: "Sí, Otra!",
                            cancelButtonText: "No",
                            type: 'success'
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    // Hicieron click en "Sí"
                                    btnEnviar.html("Subir otra cancion");
                                    btnEnviar.attr("disable",false);
                                } else {
                                    // Dijeron que no
                                    window.location = "subir-cancion.php";
                                }
                            });
                    }
                    else
                    {
                        Swal.fire({ 
                            'title': 'Error',
                            'text': data, //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                            'type': 'error'
                            })
                    }
                },
                error: function(e) 
                {
                    Swal.fire({ 
                       'title': 'Error',
                       'text': "Se supone que esto no debia pasar, ahorita vemos", //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                       'type': 'error'
                    })
                }          
            });
        }));

        $('.song #boton').click(function(){
            var id = $(this).data('id');
            // Selecting image source
            var songElement_src = $('#song_'+id).attr("src");
            Swal.fire({
                title: "¿Seguro que quieres eliminar esta cancion?",
                text: "Esta operacion no tendra retroceso",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Eliminar",
                cancelButtonText: "No",
                type: 'warning'
            })
            .then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: 'php/eliminar-cancion.php',
                        type: 'POST',
                        data: {'path':songElement_src, 'id': id},
                        success: function(data){//entra aca si el archivo login.php da una respuesta
                            if(data == "1"){ ///Si la respuesta del archivo es "Usuario registrado"
                                Swal.fire({
                                    'title': 'Hecho!',
                                    'text': "Se elimino la cancion", //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                    'type': 'warning'
                                    }).then(function(result){
                                        window.location = "subir-cancion.php"; //Despues redirecciona a index.php
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
        $('.song #subir').click(function(){
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    
</body>

</html>