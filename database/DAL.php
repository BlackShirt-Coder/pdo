<?php
require_once "dbGen.php";

class DAL
{
    private $db;

    public function __construct()
    {
        $this->db = dbGen::getInstance()->getConn();
    }

    public function getSingleShop($id)
    {
        $stmt = $this->db->prepare("select * from shops where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->bindColumn("name", $name);
        $stmt->bindColumn("ipadd", $ipadd);
        $rows = $stmt->fetchObject();

        echo $rows->name;
        echo "<hr>";
        echo $rows->created_at;
    }

    public function getAllShop($state)
    {
        $stmt = $this->db->prepare("select * from shops where state=:state");
        $stmt->bindParam(":state", $state);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $items) {
            echo $items["name"] . "<hr>";
        }
    }

    public function insertSingleShop($name, $ipadd, $username, $password, $state)
    {
        $date = date("Y-m-d H:m:s");
        $stmt = $this->db->prepare("insert into shops(name,ipadd,username,password,state,created_at) values(:name,:ipadd,:username,:password,:state,:created_at) ");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":ipadd", $ipadd);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":state", $state);
        $stmt->bindParam(":created_at", $date);
        $result = $stmt->execute();
        $id=$this->db->lastInsertId();
        echo $result?"Inserted Successfully Data with ${id}":"Failed To  Insert Data";
    }

    public function insertMultipleShops($multiple){
        foreach ($multiple as $item){

            $date = date("Y-m-d H:m:s");
            $stmt = $this->db->prepare("insert into shops(name,ipadd,username,password,state,created_at) values(:name,:ipadd,:username,:password,:state,:created_at) ");
            $stmt->bindParam(":name", $item[0]);
            $stmt->bindParam(":ipadd", $item[1]);
            $stmt->bindParam(":username", $item[2]);
            $stmt->bindParam(":password", $item[3]);
            $stmt->bindParam(":state", $item[4]);
            $stmt->bindParam(":created_at", $date);
            $result = $stmt->execute();
            $id=$this->db->lastInsertId();
            echo $result?"Inserted Successfully Data with ${id} <hr>":"Failed To  Insert Data ";
        }
    }
    public function updateName($name,$id){
        $stmt=$this->db->prepare("update shops set name=:name where id=:id");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":id",$id);
        $result = $stmt->execute();
        echo $result?"Data is Updated":"Failed To  Update Data";
    }
    public function deleteData($id){
        $stmt=$this->db->prepare("delete from shops where id=:id");
        $stmt->bindParam(":id",$id);
        $result= $stmt->execute();
        echo $result?"Deleted Sucessfully":"Failed to Delete Data!";
    }
    public function multiDelete(){
        $stmt=$this->db->prepare("delete from shops ");

       $result=$stmt->execute();

       echo $result?"Deleted All ":"Failed to delete Data";
    }
}
