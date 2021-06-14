
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
                                <div class="logo menu-area-main">
                                    <li><a href="inicio-admin.php"><img src="img/Legacy-Logo.jpg" width="85px" alt="logo"/></a></li>
                                    <spam class = "user">Administrador</spam>
                                </div>          
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                    <li> <a href="reportes.php">Reportes <span class = "circulo"><?php 
                                                require "php/conexion.php";
                                                $count= "SELECT COUNT(*) FROM reporte ";
                                                $result= mysqli_query($conexion,$count);
                                                $num= mysqli_fetch_array($result);
                                                echo $num[0];
                                        ?> </span></a> </li>
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
            <img src="img/Banner-Legacy-perfil.png"/>
                <div class="container">
                    <div class="row relative text-bg ">
                        <div class="col display-3">

                        <?php
                             require "php/conexion.php";
                             $query=mysqli_query($conexion, "SELECT * FROM reporte");
                             while($row = mysqli_fetch_array($query))
                             { 
                             ?>
                            <a class="list-group-item list-group-item-action active" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></a>  
                        <?php
                            }
                            ?>                
                        </div>
                    </div> 

                    <?php
                             require "php/conexion.php";
        
                             $query=mysqli_query($conexion, "SELECT * FROM reporte");
                             while($row = mysqli_fetch_array($query))
                             { 
                             ?>

                <div class="form">
                    <div class="modal fade" id="exampleModalCenter<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Reportes en curso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                 <p class = "center rojo"> <?php echo $row['tipo']?></p>
                                 <br><h1 class = "center"> <?php echo $row['motivo']?></h1></br>
                                 <p class="display"><audio class="margin-reproductor" id='song' src="musica/<?php echo $row["titulo"];?>" preload="none" controls></audio></p>
                                 <input type="hidden" name="id" id ="id" value="<?php echo $row['id']?>">
                                 <input type="hidden" name="idCancion" id ="idCancion" value="<?php echo $row['idCancion']?>">

                                </div>
                                <div class="display">
                                <button type="submit" class="send" data-dismiss="modal" data-id= "<?php echo $row['id']?>" id ="boton1" >Eliminar reporte</button>
                                <button type="button" class="send" id= "boton2" data-id="<?php echo $row['id']?>">Eliminar contenido</button>
                                </div>
                                
                </div>            
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                            ?>                                          
 

    </section>>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type = "text/javascript">

    
$(document).ready(function (){
        

        $('.form #boton1').click(function(){
            var id = $(this).data('id');

            $.ajax({
                url:'php/reportes2.php',
                type: 'POST',
                data:{'id':id},
                success: function(data){
                    if(data == '1'){
                        Swal.fire(
                        'Buen trabajo!',
                        'Reporte eliminado',
                        'success'
                    ).then(function(result){
                        window.location = "reportes.php"; //Despues redirecciona a index.php
                     })

                    }else{
                        Swal.fire(
                        'Buen trabajo!',
                        'Hubo un error en los datos',
                        'error'
                    )
                    }
                }
            });
        });

        $('.form #boton2').click(function(){
            var id = $(this).data('id');
            var songElement_src = $('#song').attr("src");
            var idCancion = $('#idCancion').val();

            $.ajax({
                url:'php/reportes3.php',
                type: 'POST',
                data:{'id':id, 'song':songElement_src, 'idCancion': idCancion},
                success: function(data){
                    if(data == '1'){
                        Swal.fire(
                        'Buen trabajo!',
                        'Cancion eliminada',
                        'success'
                    ).then(function(result){
                        window.location = "reportes.php"; //Despues redirecciona a index.php
                     })

                    }else{
                        Swal.fire(
                        'Error!!',
                        'Revisa los datos',
                        'error'
                    )
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