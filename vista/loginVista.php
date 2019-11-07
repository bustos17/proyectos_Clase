<?php

require_once('vistaErrores.php');

?>

<form action='index.php' method='POST'>
    <p><b>Incio de sesión de Usuario para poder Comprar en tienda<b></p>
    <input type='text' name='nombre' placeholder='Usuario'><br>
    <input type='password' name='contrasena' placeholder='Contraseña'><br>
    <input type='submit' name='login' value='Iniciar Sesión'>
</form>
<br>
<p> ¿No tienes una cuenta aún? <a href="index.php?registro=1">Registro</a></p>
<br>