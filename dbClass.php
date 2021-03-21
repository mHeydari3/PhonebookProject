<?php
class db{

    protected $pdo;
    private $database;
    private $user;
    private $password;
    public function __construct( $database = 'php_phonebook' , $user='root' , $password='')
    {
        $this->database=$database;
        $this->user = $user;
        $this->password = $password;
        $this->connection();


    }

    public function connection(){
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname={$this->database}", $this->user   , $this->password);
        }
        catch (Exception $e) {
            die($e->getMessage());
        }

    }



}

$dbObj = new db();