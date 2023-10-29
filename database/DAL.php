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
        foreach ($data as $items)
        {
          echo $items["name"]."<hr>";
        }
    }
}
