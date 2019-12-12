<?php
require_once 'models/ProductsModel.php';


class ProductsController
{
    public function index()
    {
        require_once 'views/products/destacado.php';
    }

    public function gestion()
    {
        Utils::verifyAdmin();

        $objprod = (new ProductsModel)->getAll();

        require_once 'views/products/gestion.php';
    }


    public function create()
    {
        require_once 'views/products/create.php';
    }

    public function save()
    {
        Utils::verifyAdmin();

        if (isset($_POST)) {
            $nombre = isset($_POST['name']) ? $_POST['name'] : false;
            $categoria_id = isset($_POST['cat']) ? $_POST['cat'] : false;
            $descripcion= isset($_POST['desc']) ? $_POST['desc'] : false;
            $precio = isset($_POST['price']) ? $_POST['price'] : false;
            $stock= isset($_POST['stock']) ? $_POST['stock'] : false;
            $file = isset($_FILES['image']) ? $_FILES['image'] : false;

            if ($nombre && $categoria_id && $descripcion && $precio && $stock && $file) {
                $objprod = new ProductsModel();
                $objprod->__set('nombre', $nombre);
                $objprod->__set('categoria_id', $categoria_id);
                $objprod->__set('descripcion', $descripcion);
                $objprod->__set('precio', $precio);
                $objprod->__set('stock', $stock);

                //guardar imágen
                $filename = $file['name'];
                $mimetype = $file['type'];
           
                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){

                    if(!is_dir('uploads')){

                    mkdir('uploads/images', 0777,true);
                    
                    }
                    move_uploaded_file($file['tmp_name'],'uploads/images'.$filename);

                $objprod->__set('imagen', $filename);

                }

                if ($objprod->save()) {
                   
                    $_SESSION['add'] = "complete";
                } else {
                    $_SESSION['add'] = "failed";
                }
            }else {
                $_SESSION['add'] = "failed";
            }
        }
        header("Location: ".base_url.'Products/gestion');
    }
}
