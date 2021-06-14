<?php
    session_start();

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
    <style type="text/css">
        .my-custom-scrollbar {
        position: relative;
        height: 300px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
    </style>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Legacy | Interfaz reportar</title>
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

    <!-- loader --> 
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
                            <?php 
                            $titulo = $_POST['titulo'];
                            $idCancion = $_POST['idCancion'];
                            foreach($_SESSION['usuario'] as $indice => $usuario){?>
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
                                        <li class="active"> <a href="playlists.php#">Playlist</a> </li>
                                        <li> <a href="perfil.php#">Perfil</a> </li>
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
            <img src="img/Guitarra-bacana.png"/>
            <div class="container">

                <div class="text-bg relative">
                <p><br><span class="Perfect2">¡Hola <?php echo $usuario['NOMBRE']?>!</span><br></p>
                    <h2>¿Este cancion te parecio inapropiada?</h2>
                    <p><span class="Perfect1">Los reportes que realices seran atendidos por un administrador</span></p>
                </div>
            </div>   
        </div>
    </section>
    
    <div class="music-box">
        <div class="container">
            <h2 class="center negritas">Reportar: <?php echo $titulo; ?></h2>
                <div class="tab-content table-dark"> <!-- Esto vamos a sacamr con un while de la base de datos-->
                        <div id="home" class="tab-pane fade in active Scroll">
                            <table class="display margin_top_30 ">
                                    <form action="php/subir-reporte.php" method="POST">
                                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $usuario['ID']?>">
                                        <input type="hidden" id="titulo" name="titulo" value="<?php echo $titulo;?>">
                                        <input type="hidden" id="cancion" name="cancion" value="<?php echo $idCancion;?>">                                      
                                        <div class="col-sm-12 margin_top_30">
                                            <select class=" display contactus" id="tipo" name="tipo" type="text" required>
                                                <option  hidden>Motivo</option>                                                   
                                                <option value="Mal audio">Mal audio</option>
                                                <option value="Demasiado explicito">Demasiado explicito</option>
                                                <option value="Derechos de autor">Derechos de autor</option>
                                                <option value="Alegoria al suicido">Alegoria al suicidio</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea class="textarea" required placeholder="Mensaje" type="text"  id="razon" name="razon"></textarea>
                                        </div>
                                        <div class="col-sm-12 center margin_top_30">
                                            <button type="submit" class="send" name="reportar" id="reportar">Reportar</button>
                                        </div>
                                    </form>
                            </table>
                        </div>    
               </div>
        </div>
    </div>
  

    
    </div>
</div>
    <!-- music-box  --> 
    <?php }?>
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
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#reportar').click(function(e){

			var valid = this.form.checkValidity(); //Valida que los campos de entrada en el form de arriba no esten vacios

			if(valid){//Si todos los campos tienen los datos se cumple la condicion
			var idUsuario = $('#idUsuario').val();// a la variable nombre le asigna el campo escrito en el <input> con id = "nombre" ejemplo en linea de codigo 27
			var titulo = $('#titulo').val();
			var tipo = $('#tipo').val();
			var razon = $('#razon').val();
            var cancion = $('#cancion').val();
				e.preventDefault();	
				$.ajax({
					type: 'POST', //metodo POST que usa php
					url: 'php/subir-reporte.php', // se manda a llamar el archivo que hace la parte funcional
					data: {idUsuario: idUsuario, titulo: titulo, tipo: tipo, razon: razon, cancion: cancion},
					success: function(data){//entra aca si el archivo login.php da una respuesta
                    if(data == "Reporte enviado"){ ///Si la respuesta del archivo es "Usuario registrado"
                        //muestra una alerta tipo Success
                            Swal.fire({
                                'title': 'Hecho!',
                                'text': data, //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                'type': 'success'
                                }).then(function(result){
                                    window.location = "inicio.php"; //Despues redirecciona a index.php
                                 })
                            }
                        else{ /// si la respuesta del archivo es otra entrara aca
                            ///Muestra una alerta de tipo error 
                            Swal.fire({ 
                                'title': 'Error',
                                'text': data, //y aca Imprime  error especifico o la respuesta de nuestro archivo php
                                'type': 'error'
                                })
                        }		
					},
					error: function(data){ ///Entra aca si el archivo no da respueta 
					Swal.fire({
							'title': 'Errors',
							'text': 'Hubo un problema mientras se hacia el registro.',
							'type': 'error'
							})
					}
				});
			}
		});		
	});
	
</script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

</body>

</html> 