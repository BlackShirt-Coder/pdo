<?php
require_once "dbGen.php";
class DAL{
    private $db;
    public function __construct()
    {
        $this->db=dbGen::getInstance()->getConn();
    }
}
