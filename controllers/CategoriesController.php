<?php
require_once 'models/CategoriesModel.php';
require_once 'models/ProductsModel.php';

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

                if ($objcat) {
                    $_SESSION['add'] = "complete";
                } else {
                    $_SESSION['add'] = "failed";
                }
            } else {
                $_SESSION['add'] = "failed";
            }
        }
        header("Location: ".base_url.'Categories/index');
    }

    public function viewCat()
    {
        $id = $_GET['id'] ?? false;
        $prod = [];
        $categoryName = '';

        if ($id) {

            $objcat = new CategoriesModel();
            $objcat->setId($id);
            $cat = $objcat->viewCat();

            if ($cat) {
                $objProd = new ProductsModel();
                $objProd->__set('categoria_id', $cat->id);
                $prod = $objProd->getProdCategories();

                $categoryName = $cat->nombre;
            }

            require_once 'views/categories/ver.php';
        }
    }
}
