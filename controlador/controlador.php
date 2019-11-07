<?php
//Cargamos lo modelos y los Repositorios
require_once('modelo/RepositorioUsuarios.php');
require_once('modelo/usuario.php');

//Inicio de Sesión y sacamos variable conexión a la Base de Datos
session_start();
$db=BaseDatos::conexion();
if(isset($_POST['login'])){
    $nombre=$_POST['nombre'];
    $contrasena=$_POST['contrasena'];
    if(RepositorioUsuarios::existeUsuario($nombre)){
        if(RepositorioUsuarios::contrasenaCorrecta($nombre,$contrasena)){
            $_SESSION['usuario']=new Usuario($nombre,$contrasena);
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
}else if(isset($_GET['registro'])){
    require_once('vista/registroVista.php');

}else if(isset($_POST['registro'])){
    $nombre=$_POST['nombre'];
    $contrasena=$_POST['contrasena'];
    $contrasena2=$_POST['contrasena2'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];

    if($contrasena!=$contrasena2){
        $error='Las contrasenas no coinciden';
        require_once('vista/registroVista');
    }else{
        if(RepositorioUsuarios::existeUsuario($nombre)){
            $error='Ese usuario ya se encuentra en la Base de Datos';
            require_once('vista/registroVista.php');
        }else{
            $sql='INSERT INTO usuario(nombre,contrasena,direccion,correo_electronico,telefono,rol) VALUES("'.$nombre.'","'.$contrasena.'","'.$direccion.'","'.$correo.'","'.$telefono.'")';
            $resultado=$db->query($sql);
            if($resultado){
                echo 'Usuario Registrado con Éxito';
                $_SESSION['usuario']=new Usuario($nombre,$contrasena);
                header('location:index.php');
                die();
            }else{
                $error='No se ha podido registrar usuario';
                require_once('vista/registroVista');
            }
        
        }  
    }

}else if(isset($_GET['salir'])){
    unset($_SESSION['usuario']);
    header('location:index.php');
    die();

}else if(isset($_SESSION['usuario'])){
    require_once('vista/menuVista.php');

}else{
    // Muestra de vista 'por defecto'
    require_once('vista/loginVista.php');
}
//Cerramos la Base de Datos
$db->close();
?>