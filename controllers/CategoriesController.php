<?php
require_once 'models/CategoriesModel.php';

class CategoriesController{

    public function index(){

        Utils::verifyAdmin();

        $categorias = (new CategoriesModel)->getAll();

        require_once 'views/categories/index.php';
    }

    public function create(){

        Utils::verifyAdmin();

        require_once 'views/categories/crear.php';
    }

    public function save(){

        Utils::verifyAdmin();

    }

}