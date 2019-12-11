<?php


class Connect extends PDO{

    private $data=[
        'host'=>'localhost',
        'dbname'=>'shoop_master',
        'user'=>'root',
        'pass'=>''
    ];

    public  function __construct(){
        parent::__construct("mysql:host=".$this->data['host'].";dbname=".$this->data['dbname']."",
        $this->data['user'],
        $this->data['pass'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
        );
    }




}