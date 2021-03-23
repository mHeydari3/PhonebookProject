<?php
include_once 'dbClass.php';
class contact extends db {
    protected $tbl = 'contacts_tbl';
    public function add_contact($data){
        $this->setTbl($this->tbl);
        //var_dump($data);
        $this->insertData(["name" , "lastname" , "addr" , "tel"] , [$data["contactName"] , $data["contactLastName"], $data["contactAddress"]  , $data["contactTel"] ] );
    }
    public function list_contacts(){
        $this->setTbl($this->tbl);
        return $this->selectData("*");
    }

}