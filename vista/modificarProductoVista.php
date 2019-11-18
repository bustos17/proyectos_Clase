<?php
    require_once('./vista/vistaErrores.php');
    if(isset($producto)){
?>
<form action='index.php' method='POST' enctype='multipart/form-data'>
    <h3>Establece el producto que quieres subir</h3>
    <input type='hidden' name='id' value='<?php echo $producto->getID() ?>'>
    <p>Nombre del producto: </p>
    <input type='text' name='nombre' value='<?php echo $producto->getNombre() ?>'> 
    <p>Descripción del producto: </p>
    <textarea name='descripcion' id='' cols='30' rows='10'><?php echo $producto->getDescripcion() ?></textarea><br>
    <p>Selecciona la foto del producto</p>
    <input type='file' name='foto'>
    <p>Precio del Producto: <input type='number' name='precio' value='<?php echo $producto->getPrecio() ?>' min='0' step='0.01'></p>
    <p>Cantidad Insertada: <input type='number' name='cantidad' value='<?php echo $producto->getCantidad() ?>' min='1' step='1'></p>
    <input type='submit' name='modificar' value='Modificar Producto'>
</form>
<?php
    }
    ?>