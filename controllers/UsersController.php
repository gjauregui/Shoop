<?php
require_once 'models/UsersModel.php';

class UsersController{


    public function register(){
        require_once "views/user/register.php";
    }

    public function save(){
        if(isset($_POST)){

            $name     = isset($_POST['name']) ? $_POST['name'] : false;
            $apellido = isset($_POST['ape']) ? $_POST['ape'] : false;
            $email    = isset($_POST['email']) ? $_POST['email'] :false;
            $pass     = isset($_POST['password']) ? $_POST['password'] :false;
            
            if($name && $apellido && $email && $pass){

                $user = new UsersModel();

                $user->setNombre($name);
                $user->setApellido($apellido);
                $user->setEmail($email);
                $user->setPass($pass);
    
                $user->save();

                if($user){
                    $_SESSION['register'] = "complete";
                }else {
                    $_SESSION['register'] = "failed";
                }
            }else {
                $_SESSION['register'] = "failed";
            }
        }else {
            $_SESSION['register'] = "failed";
        }
        header("Location: ".base_url.'Users/register');
    }

    public function login(){
        if(isset($_POST)){

            $user = new UsersModel();

            $user->setEmail($_POST['email']);
            $user->setPass($_POST['password']);

            $identity = $user->login();

            if($identity && is_object($identity)){

                $_SESSION['identity'] = $identity;

                if($identity->rol == 'ADMIN'){
                    $_SESSION['admin'] = true;
                }
            }else {
                $_SESSION['error_login'] = "identificación fallida";
            }
        }
        header("Location: ".base_url);
    }

    public function logout(){

        if (isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header("Location: ".base_url);

    }




}
