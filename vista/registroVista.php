<?php


require_once('vistaErrores.php');

?>

<form action='index.php' method='post'>
<input type='text' name='nombre' placeholder='Usuario'><br>
<input type='password' name='contrasena' placeholder='Contraseña'><br>
<input type='password' name='contrasena2' placeholder='Repite Contraseña'><br>
<input type='text' name='direccion' placeholder='Dirección'><br>
<input type='text' name='correo' placeholder='Correo Electrónico'><br>
<input type='text' name='telefono' placeholder='Teléfono'><br>

<input type='submit' name='registro' value='Registro'><br>
<a href='index.php'> Volver al Incio </a>