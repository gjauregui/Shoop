<?php


class UsersModel
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $pass;
    private $rol;
    private $image;
    private $con;

    public function __construct()
    {
        $this->con = new Connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPass()
    {
        return password_hash($this->pass, PASSWORD_BCRYPT, ['cont'=> 4]);
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


    public function save()
    {
        $result = false;
        
        $sql = "INSERT INTO Users VALUES(NUll,'{$this->getNombre()}','{$this->getApellido()}','{$this->getEmail()}','{$this->getPass()}','USER',NULL)";
        $save = $this->con->prepare($sql);

        if ($save->execute()) {
            $result = true;
        }
        return $result;
    }

    public function login()
    {
        $result = false;

        $login = $this->con->prepare("SELECT * FROM Users WHERE email = '{$this->getEmail()}'");

        if ($login->execute()) {
            $user = $login->fetchObject();
 
            $verify = password_verify($this->pass, $user->pass);
  
            if ($verify) {
                $result = $user;
            }
        }

        return $result;
    }
}
