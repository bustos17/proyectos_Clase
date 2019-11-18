<?php
class Producto{
    private $id;
    private $nombre;
    private $descripcion;
    private $foto;
    private $precio;
    private $cantidad; 
    // Traigo una fila de la base de datos para trabajar con ella, útil cuando vamos a trabajar con una gran cantidad de elementos de la Base de Datos
    public function __construct($fila){
        $this->id=$fila['id'];
        $this->nombre=$fila['nombre'];
        $this->descripcion=$fila['descripcion'];
        $this->foto=$fila['foto'];
        $this->precio=$fila['precio'];
        $this->cantidad=$fila['cantidad'];

    }
    public function getID(){
        return $this->id;
    }
  
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getCantidad(){
        return $this->cantidad;
    }












}








?>