<?php 

class RepositorioUsuarios{
    public static function existeUsuario($nombre){
        $sql='SELECT  * FROM usuario WHERE nombre="'.$nombre.'"';
        $db=BaseDatos::conexion();
        $resultado=$db->query($sql);
        if($resultado){
            $fila=$resultado->fetch_assoc();
            if($fila){
                return true;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
    public static function contrasenaCorrecta($nombre,$contrasena){
        $sql='SELECT * FROM usuario WHERE nombre="'.$nombre.'"';
        $db=BaseDatos::conexion();
        $resultado=$db->query($sql);
        if($resultado){
            $fila=$resultado->fetch_assoc();
            if($fila['contrasena']==$contrasena){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }
    
}


?>