<?php


require_once('./vista/vistaErrores.php');

?>

<h3>Todos mis Productos</h3>

<?php
if($resultadoProductos!=null){
    while($fila=$resultadoProductos->fetch_assoc()){
        $producto=new Producto($fila);

        echo '<h3><a href="index.php">'.$producto->getNombre().'</a></h3>';
        echo '<div> <img src="vista/imagenes/'.$producto->getFoto().'" alt="Foto Producto"><p>'.$producto->getDescripcion().'</p><h3>Precio: '.$producto->getPrecio().'</h3><br><p>En stock:'.$producto->getCantidad().'</p><br>';
        echo '<form action="index.php" method="POST"><input type="submit" name="carro" value="Añadir al Carrito de Compra"></button></form>';
        if(isset($_SESSION['usuario'])){
            if($_SESSION['usuario']->getRol()){
                echo '<form action="index.php" method="POST"><input type="hidden" name="id" value="'.$producto->getID().'"><input type="submit" name="eliminar" value="eliminar"></form>';
                echo '<a href="index.php?modificar='.$producto->getID().'">Modificar Producto</a>';
            }
        }
        echo '<p>----------------------------------------------------------------------</p>';
        echo '</div>';
    }
}


?>