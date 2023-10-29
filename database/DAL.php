<?php
require_once "dbGen.php";
class DAL{
    private $db;
    public function __construct()
    {
        $this->db=dbGen::getInstance()->getConn();
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
}
