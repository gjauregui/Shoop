<?php
class CategoriesModel{

    private $id;
    private $nombre;
    private $con;

    public function __construct(){
        $this->con = new Connect();
    }

    public function getID(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function index(){
        echo "Hola mundo desde el modelo";
    }


    public function getAll(){
        $result = false;

        $cat = $this->con->prepare("SELECT id, nombre from Categories ORDER BY id DESC");

        if($cat->execute()){
            $result = $cat->fetchAll();
        }
        return $result;
    }

    public function save(){

        $resut = false;

        $insert = $this->con->prepare("INSERT INTO Categories VALUES(NULL,'{$this->getNombre()}')");

        if($insert->execute()){
            $result = true;
        }

        return $result;

    }
}
