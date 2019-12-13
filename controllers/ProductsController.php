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
        $edit = false;

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
           
                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                    if (!is_dir('uploads')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);

                    $objprod->__set('imagen', $filename);
                }

                if ($objprod->save()) {
                    $_SESSION['add'] = "complete";
                } else {
                    $_SESSION['add'] = "failed";
                }
            } else {
                $_SESSION['add'] = "failed";
            }
        }
        header("Location: ".base_url.'Products/gestion');
    }

    public function delete()
    {
        Utils::verifyAdmin();

        if (isset($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            
            if ($id) {
                $objprod = new ProductsModel();
                $objprod->__set('id', $id);
                
                if ($objprod->delete()) {
                    $_SESSION['delete'] = "complete";
                } else {
                    $_SESSION['delete'] = "failed";
                }
            } else {
                $_SESSION['delete'] = "failed";
            }
        }
        header("Location: ".base_url."Products/gestion");
        
    }

    public function viewedit()
    {
        $edit = false;
        $datos = new StdClass;

        Utils::verifyAdmin();
        
        if($_GET) {
            
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            
            if($id){

                $objprod = new ProductsModel();
                $objprod->__set('id', $id);
                
                if( $objprod->getOne()) {

                    $edit = true;
                    $datos = $objprod->getOne();

                    require_once 'views/Products/create.php';
                } 

            }else {
                header("Location: ".base_url."Products/gestion");
            }      
        }else {
            header("Location: ".base_url."Products/gestion");
        }

    }

    public function edit(){
        if($_POST)
        {
            $id = $_GET['id'] ??  false;
            $name = $_POST['name'] ??  false;
            $cat = $_POST['cat'] ??  false;
            $desc = $_POST['desc'] ??  false;
            $price = $_POST['price'] ??  false;
            $stock = $_POST['stock'] ??  false;
            $img = isset($_POST['image']) ?  $_FILES['image'] : false;
            var_dump($img);
            exit();

            if($id && $name && $cat && $desc &&  $price && $stock && $img){

                

                $objprod = new ProductsModel();


                $objprod->__set('id',$id);
                $objprod->__set('categoria_id',$cat);
                $objprod->__set('nombre',$name);
                $objprod->__set('descripcion',$desc);
                $objprod->__set('precio',$price);
                $objprod->__set('stock',$stock);
               
                //imagen
                $filename=$img['name'];
                $mimetype=$img['type'];

                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                    
                    if (!is_dir('uploads')) {
                        mkdir('uploads/images', 0777, true);
                    }    

                        move_uploaded_file($img['tmp_name'],'uploads/images/'.$filename);

                        $objprod->__set('imagen',$filename); 

                        if($objprod->edit()){
                            $_SESSION['edit'] = 'complete';
                        }else {
                            $_SESSION['edit'] = 'failed';
                        }
                }else {
                    $_SESSION['edit'] = 'file_type';
                }
            }else {
                $_SESSION['edit'] = 'failed';
            }
        }
        header("Location: ".base_url."Products/gestion");
    }
}
