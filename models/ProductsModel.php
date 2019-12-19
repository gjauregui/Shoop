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

    public function __construct()
    {
        $this->con = new Connect();
    }
    public function __get($atributo)
    {
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
        return null;
    }

    public function __set($atributo, $contenido)
    {
        if (property_exists($this, $atributo)) {
            $this->$atributo = $contenido;
        }
        return $this;
    }

    public function getAll()
    {
        $result = false;

        $stm = $this->con->prepare("SELECT * FROM Products ORDER BY id DESC");

        if ($stm->execute()) {
            $result = $stm->fetchAll();
        }

        return $result;
    }

    public function getProdCategories()
    {
        $result = false;
     
        $stm = $this->con->prepare("SELECT p.*,c.nombre AS 'catName' from Products p INNER JOIN Categories c ON C.id = p.categorie_id WHERE p.categorie_id ={$this->__get('categoria_id')} ORDER BY p.id DESC");
        
        if ($stm->execute()) {
            $result = $stm->fetchAll();
        }
        return $result;
    }

    public function save()
    {
        $result = false;
        $stm = $this->con->prepare("INSERT INTO Products VALUES (NULL,{$this->__get('categoria_id')},'{$this->__get('nombre')}','{$this->__get('descripcion')}',{$this->__get('precio')},{$this->__get('stock')},NULL,CURDATE(),'{$this->__get('imagen')}')");
        if ($stm->execute()) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $result = false;
        $stm = $this->con->prepare("DELETE FROM Products WHERE id = {$this->__get('id')}");
        if ($stm->execute()) {
            $result = true;
        }
        return $result;
    }


    public function getOne()
    {
        $result = false;

        $stm = $this->con->prepare("SELECT * FROM Products WHERE id={$this->__get('id')}");

        if ($stm->execute()) {
            $result = $stm->fetchObject();
        }

        return $result;
    }

    public function edit()
    {
        $result = false;

        $sql = "UPDATE Products SET categorie_id = {$this->__get('categoria_id')},nombre ='{$this->__get('nombre')}',descripcion='{$this->__get('descripcion')}',precio={$this->__get('precio')},stock={$this->__get('stock')}";

        if ($this->__get('imagen') != null) {
            $sql.= ",imagen='{$this->__get('imagen')}'";
        }

        $sql.= " WHERE id={$this->__get('id')}";

        $stm = $this->con->prepare($sql);

        if ($stm->execute()) {
            $result = true;
        }
        
        return $result ;
    }

    public function getRandom($limit)
    {
        $result  = false;

        $stm = $this->con->prepare("SELECT * FROM PRODUCTS ORDER BY RAND() LIMIT $limit ");

        if ($stm->execute()) {
            $result = $stm->fetchAll();
        }
        return $result;
    }
}
