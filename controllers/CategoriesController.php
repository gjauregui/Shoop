<?php
require_once 'models/CategoriesModel.php';

class CategoriesController
{
    public function index()
    {
        Utils::verifyAdmin();

        $categorias = (new CategoriesModel)->getAll();

        require_once 'views/categories/index.php';
    }

    public function create()
    {
        Utils::verifyAdmin();

        require_once 'views/categories/crear.php';
    }

    public function save()
    {
        Utils::verifyAdmin();

        if (isset($_POST)) {
            $name = isset($_POST['name']) ? $_POST['name'] : false;

            if ($name) {
                $objcat = new CategoriesModel();

                $objcat->setNombre($name);
                
                $objcat->save();

                if($objcat){
                    $_SESSION['add'] = "complete";
                }else {
                    $_SESSION['add'] = "failed";
                }
            }else {
                $_SESSION['add'] = "failed";
            }
        }
        header("Location: ".base_url.'Categories/index');
    }
}
