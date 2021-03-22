<?php
class db{

    protected $pdo;
    private $database;
    private $user;
    private $password;
    private $tbl;
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

    public function setTbl($tbl_name){
        $this->tbl = $tbl_name;
    }

    public function selectData($name){
        if (is_array($name)){
            $names =  implode("," , $name )  ;
        }
        $stm = $this->pdo->prepare("SELECT $names FROM {$this->tbl}");
        $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_OBJ);
        return $row;

    }

    public function insertData($fields,$data){
        if(is_array($data)){
            $names= "'" . implode("','"  ,  $data  ) . "'";
            $fields = implode (","  , $fields);
            $sql = $this->pdo->prepare("INSERT INTO {$this->tbl} ($fields) VALUES ($names)");
            $result_of_insert = $sql->execute();
            if ($result_of_insert) { return true;}
            else {return false;}
        }

    }

    public function editData($fields , $data , $id){

        foreach ($fields as $key=>$val){
            $txt[] = $val . "='" . $data[$key]  . "'" ;

        }
        $query = implode("," , $txt);
        $sql  = $this->pdo->prepare("UPDATE {$this->tbl} SET " . $query . "WHERE id ='$id'");
        $res = $sql->execute();
        return $res;
    }

    public function deleteData($id){
        $sql = $this->pdo->prepare("DELETE FROM {$this->tbl} WHERE id='$id'");
        $sql->execute();
    }
    public function searchData($name , $value){
        $sql = $this->pdo->prepare("SELECT * FROM {$this->tbl} WHERE $name='$value'");
        return $sql;
    }
    public function likeData($name,$value){
        $sql=$this->pdo->prepare("SELECT * FROM {$this->tbl} WHERE $name LIKE '$value'");
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    /*public function insertSampleData(){
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=php_phonebook", "root"   , "");
            $query = $this->pdo->prepare("INSERT INTO users_tbl (name,email,lastname,pasword) VALUES (:name,:email,:lastname,:password)");
            $name = "mohammad";
            $email="m2@gmail.2com";
            $lastname = "heydari";
            $password = "123";
            $query->bindParam("name" , $name);
            $query->bindParam("email" , $email);
            $query->bindParam("lastname" ,$lastname );
            $query->bindParam("password",$password);
            $result = $query->execute();
            var_dump($result);

        }
        catch (Exception $e){
            die("ERROR MESSAGE:" . $e->getMessage());
        }
    }*/

}

$dbObj = new db();
$dbObj->setTbl("users_tbl");
$result_of_insert = $dbObj->insertData(["name" , "lastname" , "email" , "pasword"] , ["sarah" , "latif" , "sarah".rand()."@gmail.com" , "1234"]);
if ($result_of_insert ) {
    echo "<br/>INSERTED SUCCESSFULLY<br/>";

    $selected_row = $dbObj->selectData(["email"]);
    echo "<pre>"; print_r($selected_row) ;  echo "</pre> <br/><br/><br/><hr/>";
}

$res = $dbObj->editData(['name' , 'lastname' , 'email' , 'pasword'] , ['hossein koskhol' , 'kos nanaehamid' , 'e' .rand() .'@e.com' ,'pass'  ] , 20);

echo "<pre>"; print_r($res) ;  echo "</pre>";