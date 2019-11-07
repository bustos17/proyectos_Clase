<?php
class BaseDatos{
    public static function conexion(){
        $conexion=new mysqli('localhost','root','','tienda');
        $conexion->query('SET NAMES "utf-8"');
        if($conexion->connect_errno){
            echo 'Fallo al conectar con base de datos'.$conexion->connect_errno;
        }
        return $conexion;
    }
}





?>