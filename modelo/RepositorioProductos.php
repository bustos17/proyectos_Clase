<?php
class RepositorioProductos{
    public static function todosLosProductos(){
        $conexion=BaseDatos::conexion();
        $sql='SELECT * FROM producto';
        if($resultado=$conexion->query($sql)){
            return $resultado;
        }else{
            echo 'Fallo en la conexion';
            return null;
        }
    }
    public static function eliminarProducto($id){
        $conexion=BaseDatos::conexion();
        $sql='DELETE FROM producto WHERE id='.$id;
        $resultado=$conexion->query($sql);
        if($resultado){
            return true;
        }else{
            echo 'Fallo en la conexion';
            return false;
        }
    }




}







?>