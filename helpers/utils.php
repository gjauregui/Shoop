<?php
class Utils{

    public static function deleteSession($name){
        if(isset($_SESSION[$name])){

            $_SESSION[$name] = null;
            unset($_SESSION[$name]);

        }  
        
        return $name;
    }

    public static function verifyAdmin(){
        if(!isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
            header("Location: ".base_url);
        }else {
            return true;
        }
    }

    public static function menuCategories(){
        require_once 'models/CategoriesModel.php';

        $categorias = (new CategoriesModel)->getAll();
        
        return $categorias;
    }

}