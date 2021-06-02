<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="icon" href="img/Legacy-Logo.jpg" type="image/gif" />

    <title> Legacy | Registro</title><!-- Titulo de la pagina en la pestaña-->
</head>
<body>

    <header class="site-header">
        <div class="wrapper">
            <!-- Logo -->
            <div class="imagen-logo">
                <img src="img/Legacy-Logo.jpg" width="100px"/>
            </div>
            <div class="formContent">
                <!--Este es un form donde se llama metodo "POST" el cual php lo usa-->
                <form action="php/register.php" method="POST" name="formulario" >  <!--Tambien al form se le pone un accion con el cual se llama el archivo php que hara la parte funcional "register.php"-->
                    <!-- variables name en los input es para el uso de php-->
                    <!--Entrada tipo texto: con name = "nombre", ese campo lo necesitaremos en el register.php-->
                    <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="Nombre de Usuario" required>
                    <!--Entrada tipo email: con name = "correo", ese campo lo necesitaremos en el register.php-->
                    <input type="email" id="correo" class="fadeIn second" name="correo" placeholder="Correo Electronico" required>
                   <!--Entrada tipo password: con name = "password", ese campo lo necesitaremos en el login.php-->
                    <input type="password" id="password" class="fadeIn second" name="password" placeholder="Contraseña" required>
                    <input type="password" id="password2" class="fadeIn second" name="password2" placeholder="Confirmar Contraseña" required>
                        <div class="Add">
                            <p class="font-16px">¿Ya tienes Cuenta? <a class="underlineHover" href="index.html" >Iniciar Sesion</a></p>
                        </div>
                    <!-- Este es el boton, si es presionado mandara todo los campos de entrada al archivo register.php-->
                    <input type="submit" class="fadeIn fourth" id ="register" value="Registrate">
                </form>
            </div>
        </div>
    </header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity(); //Valida que los campos de entrada en el form de arriba no esten vacios

			if(valid){//Si todos los campos tienen los datos se cumple la condicion
			var nombre = $('#nombre').val();// a la variable nombre le asigna el campo escrito en el <input> con id = "nombre" ejemplo en linea de codigo 27
			var correo = $('#correo').val();
			var password = $('#password').val();
			var password2 = $('#password2').val();
				e.preventDefault();	
				$.ajax({
					type: 'POST', //metodo POST que usa php
					url: 'php/register.php', // se manda a llamar el archivo que hace la parte funcional
					data: {nombre: nombre, correo: correo, password: password, password2: password2},
					success: function(data){//entra aca si el archivo login.php da una respuesta
                    if(data == "Usuario registrado"){ ///Si la respuesta del archivo es "Usuario registrado"
                        //muestra una alerta tipo Success
                            Swal.fire({
                                'title': 'Hecho!',
                                'text': data, //y el motivo que imprime es la respuesta del archivo "Usuario registrado"
                                'type': 'success'
                                }).then(function(result){
                                    window.location = "index.html"; //Despues redirecciona a index.html
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
 
</body>
</html>