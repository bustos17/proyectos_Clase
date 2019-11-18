
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir Producto</title>
</head>
<body>
<?php
    require_once('vistaErrores.php');
?>
<form action='index.php' method='POST' enctype='multipart/form-data'>
    <h3>Establece el producto que quieres subir</h3>
    <p>Nombre del producto: </p>
    <input type='text' name='nombre'>
    <p>Descripción del producto: </p>
    <textarea name='descripcion' id='' cols='30' rows='10'></textarea><br>
    <p>Selecciona la foto del producto</p>
    <input type='file' name='foto'>
    <p>Precio del Producto: <input type='number' name='precio' value='25' min='0' step='0.01'></p>
    <p>Cantidad Insertada: <input type='number' name='cantidad' value='1' min='1' step='1'></p>
    <input type='submit' name='subir' value='Subir Producto'>
</form>
<br>
<a href="../index.php">Volver a Inicio</a>
</body>
</html>

