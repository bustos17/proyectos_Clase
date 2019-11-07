<?php
class Usuario{
    private $id;
    private $nombre;
    private $contrasena;
    private $direccion;
    private $correo_electronico;
    private $telefono; 
    private $rol;

    public function __construct($nombre,$contrasena){
        $bd=BaseDatos::conexion();
        $sql='SELECT * FROM usuario WHERE nombre="'.$nombre.'"';
        $resultado=$bd->query($sql);
        if($resultado){
            $fila=$resultado->fetch_assoc();
            $this->id=$fila['id'];
            $this->nombre=$fila['nombre'];
            $this->contrasena=$fila['contrasena'];
            $this->direccion=$fila['direccion'];
            $this->correo_electronico=$fila['correo_electronico'];
            $this->telefono=$fila['telefono'];
            $this->rol=$fila['rol'];
   
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getRol(){
        return $this->rol;
    }
    
}
?>