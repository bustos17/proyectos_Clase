<?php
require_once('vistaErrores.php');
echo '<p>Hola, </p>';
echo '<h4>'.$_SESSION['usuario']->getNombre().'</h4>';

?>

<ul>
<li><a href="index.php">Mi perfil</a></li>
<?php
//Variable ROL guardada como BIT donde 0 es false y 1 es true
if($_SESSION['usuario']->getRol()){
    echo '<li><a href="index.php?subir=1">Subir Producto</a></li>';
    echo '<li><a href="index.php?modificar=1">Modificar Producto</li>';
}
?>
<li><a href="index.php?salir=1">Salir</li>
</ul>