function comprobarClave(){
    clave1 = document.formulario.password.value
    clave2 = document.formulario.password2.value

    if (password == password2)
       alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo")
    else
       alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo")
}