<?php
session_start();
require_once 'config/db.php';
require_once 'autoloadController.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



if (isset($_GET['classC'])) {


    $nameclass = $_GET['classC'].'Controller';

    if (class_exists($nameclass)) {
        $obj = new $nameclass();

        if ($_GET['action'] && method_exists($obj, $_GET['action'])) {
            $method = $_GET['action'];

            $obj->$method();
        }
    } else {
        $obj = new ErrorController();
        $obj->index();
        exit();
    }

}elseif(!isset($_GET['classC']) && !isset($_GET['action'] )){
    //vista por defecto
    $nameclassdfu = controller_default;
    $obj = new $nameclassdfu();
    $actiondfu = action_default;
    $obj->$actiondfu();   

}else {
    
    $obj = new ErrorController();
    $obj->index();
    exit();
}

require_once 'views/layout/footer.php';
