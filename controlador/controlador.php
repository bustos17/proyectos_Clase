<?php
//Cargamos lo modelos y los Repositorios
require_once('modelo/RepositorioUsuarios.php');
require_once('modelo/usuario.php');
require_once('modelo/producto.php');
require_once('modelo/RepositorioProductos.php');

//Inicio de Sesión y sacamos variable conexión a la Base de Datos
session_start();
$db=BaseDatos::conexion();
if(isset($_POST['login'])){
    $nombre=$_POST['nombre'];
    $contrasena=$_POST['contrasena'];
    if(RepositorioUsuarios::existeUsuario($nombre)){
        if(RepositorioUsuarios::contrasenaCorrecta($nombre,$contrasena)){
            $_SESSION['usuario']=new Usuario($nombre,$contrasena);
            //mandas por header cuando no tienes que enviar a ninguan vista y debés reiniciar datos de página, usas además die( )
            header('location:index.php');
            die();
        }else{
            $error='Contraseña Incorrecta';
            require_once('vista/loginVista');
        }
    }else{
        $error='No existe Usuario';
        require_once('vista/loginVista');
    }
}else if(isset($_GET['subir'])){
    header('location:vista/subirProductoVista.php');
}else if(isset($_POST['subir'])){

    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    
    if(!$_FILES['foto']['error']){
        $nombreFotoTemporal=$_FILES['foto']['tmp_name'];
        $numeroAleatorio=mt_rand(0,10000);
        $nombreImagen='./vista/imagenes/'.$numeroAleatorio.$_FILES['foto']['name'].'.jpg';
        if(move_uploaded_file($nombreFotoTemporal,$nombreImagen)){
            $imagen=$numeroAleatorio.$_FILES['foto']['name'].'.jpg';
            $sql='INSERT INTO producto(nombre,descripcion,foto,precio,cantidad) VALUES("'.$nombre.'","'.$descripcion.'","'.$imagen.'","'.$precio.'","'.$cantidad.'")';
            $resultado=$db->query($sql);
            if($resultado){
                header('location:index.php');
            }else{
                $error='No se ha podido insertar el producto';
                require_once('vista/subirProductor.php');
            }
        }else{
            $error='Imagen no valida';
            require_once('vista/subirProductoVista.php');
        }

    }else{
        //Soluciona ésto para poder mostrar errores
        $error='Imagen no valida';
        require_once('vista/subirProductoVista.php');
    }

}else if(isset($_GET['modificar'])){
    $id=$_GET['modificar'];
    $sql='SELECT * FROM producto WHERE id='.$id; 
    $resultado=$db->query($sql);
    if($resultado){
        $fila=$resultado->fetch_assoc();
        if($fila){
            $producto=new Producto($fila);

        }else{
            $error='No existen productos con esa ID';

        }
    }else{
        $error="No se ha podido ejecutar la consulta";
    }
    
    require_once('vista/modificarProductoVista.php');
}else if(isset($_POST['modificar'])){
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $cantidad=$_POST['cantidad'];
    $id=$_POST['id'];
    $sql='UPDATE producto SET nombre="'.$nombre.'", descripcion="'.$descripcion.'", precio='.$precio.',cantidad='.$cantidad.' WHERE id='.$id;
    $resultado=$db->query($sql);
    if($resultado){
        header('location:index.php');
    }else{
        $error='No se ha podido modificar';
        require_once('vista/modificarProductoVista.php');
    }



}else if(isset($_GET['registro'])){
    require_once('vista/registroVista.php');

}else if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    echo $nombre;
    $contrasena=$_POST['contrasena'];
    echo $contrasena;
    $contrasena2=$_POST['contrasena2'];
    echo $contrasena2;
    $direccion=$_POST['direccion'];
    echo $direccion;
    $correo=$_POST['correo'];
    echo $correo; 
    $telefono=$_POST['telefono'];
    echo $telefono; 
    $rol=0;

    if($contrasena!=$contrasena2){
        $error='Las contrasenas no coinciden';
        require_once('vista/registroVista');
    }else{
        if(RepositorioUsuarios::existeUsuario($nombre)){
            $error='Ese usuario ya se encuentra en la Base de Datos';
            require_once('vista/registroVista.php');
        }else{
            $sql='INSERT INTO usuario(nombre,contrasena,dirreccion,correo_electronico,telefono,rol) VALUES ("'.$nombre.'","'.$contrasena.'","'.$direccion.'","'.$correo.'","'.$telefono.'",'.$rol.')';
            if($db->query($sql)){
                echo 'Usuario Registrado con Éxito';
                $_SESSION['usuario']=new Usuario($nombre,$contrasena);
                header('location:index.php');
                die();
            }else{
                $error='No se ha podido registrar usuario';
                require_once('vista/registroVista.php');
            }    
        }  
    }

}else if(isset($_GET['salir'])){
    unset($_SESSION['usuario']);
    //Destruir session_start() ???
    header('location:index.php');
    die();


}else{
    if(isset($_SESSION['usuario'])){
        require_once('vista/menuVista.php');
    }else{
        require_once('vista/loginVista.php');

    }

    if(isset($_POST['eliminar'])){

        $id=$_POST['id'];
        if(RepositorioProductos::eliminarProducto($id)){
            header('location:index.php');
        }else{
            $error='No se ha podido eliminar producto';
        }    
    }
    echo '<h1>Tienda de Electrónica</h1>';
    $resultadoProductos=RepositorioProductos::todosLosProductos();
    require_once('vista/productosVista.php');
  
    
}
//Cerramos la Base de Datos
$db->close();
?>