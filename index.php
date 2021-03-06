<?php
session_start();
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="icon" href="img/Legacy-Logo.jpg" type="image/gif" />
    <title>Legacy | Index</title> <!-- Titulo de la pagina en la pestaña-->
</head>
<body>  

    <header class="site-header">
        <div class="wrapper">
            <!-- Logo -->
            <div class="imagen-logo">  
                <img src="img/Legacy-Logo.jpg" width="100px"/> <!--Imagen del logo-->
            </div>
            <div class="formContent">
                <!--Este es un form donde se llama metodo "POST" el cual php lo usa-->
                <form method="POST" accion = "login.php"> <!--Tambien al form se le pone un accion con el cual sellama el archivo php que hara la parte funcional "login.php"--> <!--Tambien al form se le pone un accion con el cual sellama el archivo php que hara la parte funcional "login.php"-->
                    <!--  las variables name en los onput es para el uso de php-->
                    <!--Entrada tipo texto: con name = "nombre", ese campo lo necesitaremos en el login.php-->
                    <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="Nombre de Usuario">
                    <!--Entrada tipo password: con name = "password", ese campo lo necesitaremos en el login.php-->
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
                        <div class="Add">                               
                            <p class="font-16px">¿No tienes cuenta? <a class="underlineHover" href="registro.php">¡Registrate!</a></p> <!--Redirecciona a regisntro.php si el usario da click aqui-->
                        </div>
                    <input type="submit" id ="login" class="fadeIn fourth" value="Entrar"> <!-- este es el boton, si es presionado mandara todo los campos de entrada al archivo login.php-->
                </form>

                    <div class="formFooter">
                        <p class="font-16px">¿Olvidaste tu contraseña? <a class="underlineHover" href="#"> Entra aqui</a></p>
                    </div>
            </div>
        </div>
    </header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
//esto es codigo Ajax, nos ayudara a mandar los mensajes de error  
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity(); //Valida que los campos de entrada en el form de arriba no esten vacios

			if(valid){ //Si todos los campos tienen los datos se cumple la condicion
			
            //Variables
            var nombre = $('#nombre').val(); // a la variable nombre le asigna el campo escrito en el <input> con id = "nombre" ejemplo en linea de codigo 25
			var password = $('#password').val(); // a la variable nombre le asigna el campo escrito en el <input> con id = "password", linea de codigo 27
				e.preventDefault();	
				$.ajax({
					type: 'POST', //metodo POST que usa php
					url: 'php/login.php', // se manda a llamar el archivo que hace la parte funcional
					data: {nombre: nombre, password: password},
					success: function(data){ //entra aca si el archivo login.php da una respuesta
                        if(data == "1"){ ///si la respuesta del archivo es 1   
                            window.location = "inicio.php"; // redirecciona a inicio.php (login hecho)
                        }
                        else if(data == "2"){ //si la respuesta del archivo es 2
                            window.location = "inicio-admin.php"; //redirecciona a inicio-admin.php (login hecho)
                        }
                        else{ //si la respuaesta es diferente a 1 y 2
                            //esta es la alerta de tipo error que muestra la pagina 
                            Swal.fire({
                            'title': 'Error!',
                            'text': data,  ///aca muestra el motivo, data es la respuesta que nos retorna login.php
                            'type': 'error'
                            }).then(function(result){
                                window.location = "index.php";
                            })
                        }
                    },
					error: function(data){ ///Entra aca si el archivo no da respueta
					Swal.fire({
							'title': 'Errors',
							'text': 'Hubo un problema mientras iniciabas seccion.',
							'type': 'error'
							})
					}
				});
			}else{
              
            }
		});		
	});
	
</script>
    
</body>
</html>