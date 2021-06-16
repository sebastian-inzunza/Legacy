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
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Crear Playlist</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style type="text/css">
        .playlist {
            border: #b1b0b0 solid 1px;
            padding: 12px 19px;
            margin-bottom: 20px;
            border-radius: 10px;
            color: #fff;
            width: 50%;
            margin-top: 5px;
            background-color: #46464685;
        }

        .playlist:hover{
            background-color: #be0d0d;
        }

        .playlist::placeholder{
            color: #fff;
        }

        .playlist:focus{
            background-color: #be0d0d;
        }
    </style>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style2.css">   
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body background="img/album2.jpg">
<form action="php/cplaylist.php" method="POST" name="formulario" >
    <input id="nombre" name="nombre" id="nombre" class="playlist ml-3 mt-5" type="text" placeholder="Dale un nombre: " required>
    <br>
    <input type="submit" class="send ml-3" id="crear" name="crear" value="Crear Playlist">
</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(function(){
            $('#crear').click(function(e){

                var valid = this.form.checkValidity(); //Valida que los campos de entrada en el form de arriba no esten vacios

                if(valid){//Si todos los campos tienen los datos se cumple la condicion
                var nombre = $('#nombre').val();// a la variable nombre le asigna el campo escrito en el <input> con id = "nombre"
                    e.preventDefault();	
                    $.ajax({
                        type: 'POST', //metodo POST que usa php
                        url: 'php/cPlaylist.php', // se manda a llamar el archivo que hace la parte funcional
                        data: {nombre: nombre},
                        success: function(data){//entra aca si el archivo cPlaylist.php da una respuesta
                        if(data == "Playlist creada con éxito!"){ ///Si la respuesta del archivo es igual
                            //muestra una alerta tipo Success
                                Swal.fire({
                                    'title': 'Hecho!',
                                    'text': data, //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                    'type': 'success'
                                    }).then(function(result){
                                        window.close(); //Despues redirecciona a index.php
                                        window.opener.document.location="playlists.php";
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
                                'text': 'Hubo un problema mientras se creaba.',
                                'type': 'error'
                                })
                        }
                    });
                }
            });		
        });
    </script>
</body>
</html>