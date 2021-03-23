<?php
include_once 'dbClass.php';
class users extends db{
    protected $tbl = 'users_tbl';
    public function login($data){
        $email = $data['email'];
        $password = $data['password'];
        $this->setTbl($this->tbl);
        $this->searchData($email , $email);
    }
}