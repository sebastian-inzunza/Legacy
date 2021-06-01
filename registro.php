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

    <title> Legacy | Registro</title>
</head>
<body>

    <header class="site-header">
        <div class="wrapper">
            <!-- Logo -->
            <div class="imagen-logo">
                <img src="img/Legacy-Logo.jpg" width="100px"/>
            </div>
            <div class="formContent">
                <form action="php/register.php" method="POST" name="formulario" >
                    <!-- cambiar lass variables name para el uso de php-->
                    <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="Nombre de Usuario" required>
                    <input type="email" id="correo" class="fadeIn second" name="correo" placeholder="Correo Electronico" required>
                    <input type="password" id="password" class="fadeIn second" name="password" placeholder="Contraseña" required>
                    <input type="password" id="password2" class="fadeIn second" name="password2" placeholder="Confirmar Contraseña" required>
                        <div class="Add">
                            <p class="font-16px">Ya tienes Cuenta? <a class="underlineHover" href="index.html" >Iniciar Sesion</a></p>
                        </div>
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

			var valid = this.form.checkValidity(); //Valida que los campos no esten vacios

			if(valid){
			var nombre = $('#nombre').val();
			var correo = $('#correo').val();
			var password = $('#password').val();
			var password2 = $('#password2').val();
			
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'php/register.php',
					data: {nombre: nombre, correo: correo, password: password, password2: password2},
					success: function(data){
                    if(data == "Usuario registrado"){ ///Muestra si el registro es correcto 
                            Swal.fire({
                                'title': 'Hecho!',
                                'text': data,
                                'type': 'success'
                                }).then(function(result){
                                    window.location = "index.html";
                                 })
                            }
                        else{
                            Swal.fire({ 
                                'title': 'Error',
                                'text': data, //Imprime  error especifico
                                'type': 'error'
                                })
                        }		
					},
					error: function(data){ ///Entra aca si el archivo no da respueta o error con la BD 
					Swal.fire({
							'title': 'Errors',
							'text': 'Hubo un problema mientras se hacia el registro.',
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