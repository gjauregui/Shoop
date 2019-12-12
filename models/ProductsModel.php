<?php

//namespace Models;

class ProductsModel
{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $con;
/*
    public function getID(){
        return $this->id;
    }

    public function getCategoria_id(){
        return $this->categoria_id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->
    }

    public function getStock(){
        return $this->
    }
*/
    public function __construct(){
        $this->con = new Connect();
    }
    public function __get($atributo){

        if(property_exists($this,$atributo)){
            return $this->$atributo;
        }
        return null;
    }

    public function __set($atributo,$contenido){
        if(property_exists($this,$atributo)){
            $this->$atributo = $contenido;
        }
        return $this;
    }

    public function getAll(){

        $result = false;

        $prod = $this->con->prepare("SELECT * FROM Products ORDER BY id DESC");

        if($prod->execute()){
            $result = $prod;
        }

        return $result;
    }

    public function save(){
        $result = false;
        $save = $this->con->prepare("INSERT INTO Products VALUES (NULL,{$this->__get('categoria_id')},'{$this->__get('nombre')}','{$this->__get('descripcion')}',{$this->__get('precio')},{$this->__get('stock')},NULL,CURDATE(),'{$this->__get('imagen')}')");
        if($save->execute()){
            $result = true;
        }
        return $result;
    }


}