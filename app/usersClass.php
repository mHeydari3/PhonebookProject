<?php
include_once 'dbClass.php';
class users extends db{

    protected $tbl = 'users_tbl';
    public function login($data){
        $email    = $data['email'];
        $password = $data['password'];
        $this->setTbl($this->tbl);
        $user_data = $this->searchData('email' , $email);
        //echo "<pre>". var_dump($a)."</pre>";
        if($password == $user_data->pasword){
            $_SESSION['name'] = $user_data->name;

            header('location:dashboard.php');
        }
    }

    public function logout(){
        session_destroy();
        header('location:index.php?logout=ok');
    }


}