<?php
require_once('vistaErrores.php');
echo '<p>Hola, </p>';
echo '<h4>'.$_SESSION['usuario']->getNombre().'</h4>';

?>

<ul>
<li><a href="index.php">Mi perfil</a></li>
<?php
if($_SESSION['usuario']->getRol()){
    echo '<li><a href="index.php">Subir Producto</a></li>';
    echo '<li><a href="index.php">Modificar Producto</li>';
}
?>
<li><a href="index.php?salir=1">Salir</li>
</ul>